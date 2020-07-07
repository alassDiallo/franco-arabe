<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surveillant;
use App\Models\anneeScolaire;
use App\Models\Classe;
use App\Http\Controllers\Auth\RegisterController;
use Flashy;
use Illuminate\Validation\Rule;

class ControllerSurveillant extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveillant = Surveillant::orderBy('nom','asc')->get();
        return view('surveillants.liste',compact('surveillant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surveillants.ajouterSurveillant');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'nom'=>'required|string|min:2',
            'prenom'=>'required|string|min:3',
            'telephone'=>'required|numeric|digits:9|starts_with:77,78,76,70,33,30',
            'adresse'=>'required|string|min:3',
            'sexe'=>'required',
        ]);
        $nomUtilisateur= nomUser();
        $data = ['nomUtilisateur'=>$nomUtilisateur,
        'profil'=>'surveillant',
        'password'=>'12345678'];
        (new RegisterController())->create($data);
        Surveillant::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'telephone'=>$request->telephone,
            'sexe'=>$request->sexe,
            'adresse'=>$request->adresse,
            'nomUtilisateur'=> $nomUtilisateur,
        ]);
        flash('surveillant ajouté avec succé');
        return redirect()->route('surveillant.create');
    }

    public function surveille(Request $request)
    {
        $this->validate($request,[
            'nomUtilisateur'=>'required|digits:8',
            'classe'=>'required',
           ]);
            if(! $surv = Surveillant::where('nomUtilisateur',$request->nomUtilisateur)->first())
            {
                flash('Il n\'y a pas de surveillant avec cette identifiant '.$request->nomUtilisateur,'danger');
                return back();
            }
            for($i=0;$i<count($request->classe);$i++){
                    $classe = Classe::where('nomClasse',$request->classe[$i])->first();
                    if($surv->classes()->where('classe_id',$classe->id)->first())
                        continue;
                        $surv->classes()->attach($classe->id,[
                        'anneeScolaire'=>anneescolaire(),
                    ]);
                }
                flash('Classe affecter au surveillant avec succé');
            Flashy('Classe affecter au surveillant avec succé');
            return redirect()->route('surveillant.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Surveillant $surveillant)
    {
        return view('surveillants.afficherSurveillant',compact('surveillant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Surveillant $surveillant)
    {
        return view('surveillants.modifierSurveillant',compact('surveillant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Surveillant $surveillant)
    {
        $this->validate($request,[
            'nom'=>'required|string|min:2',
            'prenom'=>'required|string|min:3',
            'telephone'=>[
                'required',
                'digits:9',
                'starts_with:77,78,76,70,33,30',
            Rule::unique('surveillants')->ignore($surveillant)],
            'adresse'=>'required|string|min:3',
            ]);

            Surveillant::where('nomUtilisateur',$surveillant->nomUtilisateur)
                        ->update([
                            'nom'=>$request->nom,
                            'prenom'=>$request->prenom,
                            'adresse'=>$request->adresse,
                            'telephone'=>$request->telephone,
                        ]);

                    Flash('modification effectué avec succé pour le surveillant '.$surveillant->nomUtilisateur);
                    Flashy::success('modification effectué avec succé pour le surveillant '.$surveillant->nomUtilisateur);
                    return redirect()->route('surveillant.index');
    }

    public function affecterSurv(){
        return view('surveillants.affecterClasseSurveillant');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
