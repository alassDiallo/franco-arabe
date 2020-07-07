<?php

namespace App\Http\Controllers;

use App\Models\anneeScolaire;
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\MatiereArabe;
use App\Models\Professeur;
use Illuminate\Http\Request;
use Flashy;
use MercurySeries\Flashy\Flashy as FlashyFlashy;

class ControllerClasseProf extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construc(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('professeurs.affecterClasseProfesseur');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matiere = Matiere::orderBy('nomMatiere')->get();
        //$matiereAr = Matiere::orderBy('nomMatiere')->get();
        return view('professeurs.affecterClasseProfesseur',compact('matiere'));
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
        'nomUtilisateur'=>'required|digits:8',
        'classe'=>'required',
        'matiere'=>'required',
        //'matiereAr'=>'required',
       ]);
        if(! $prof = Professeur::where('nomUtilisateur',$request->nomUtilisateur)->first())
        {
            flash('Il n\'y a pas de professeur avec cette identifiant '.$request->nomUtilisateur,'danger');
            return back();
        }
        $classe = Classe::whereIn('nomClasse',$request->classe)->get();
        if($mat = Matiere::where('reference',$request->matiere)->first()){
            if($prof->matieres()->where('reference',$request->matiere)->first()){
        $prof->classes()->attach($classe,[
            'matiere'=>$request->matiere,
            'anneeScolaire'=>anneeScolaire(),
        ]);
            }
            else{
                $d;
                foreach($prof->matieres as $mat){
                    $d[] = $mat->nomMatiere.'-'.$mat->nomArabe;
                }

                flash(
                    "Impossible d 'affecter ccette matiere "
                    .$mat->nomMatiere.'-'.$mat->nomArabe.
                    " au  professeur ".$prof->prenom.' '.$prof->nom." avec l'identifiant "
                    .$prof->nomUtilisateur
                    ,'danger');
                    session()->flash('d',$d);

                return back();
            }
    }
    else{
        flash("cette matiere n'existe pas",'danger');
        return back();
    }
        /*for($i=0;$i<count($request->classe);$i++){
                $classe = Classe::where('nomClasse',$request->classe[$i])->first();
                if($prof->classes()->where('classe_id',$classe->id)->first())
                    continue;
                    $prof->classes()->attach($classe->id,[
                    'anneeScolaire'=>$annee->anneeDebut.'-'.$annee->anneeFin,
                ]);
            }*/
            flash('Classe affecter au professeur avec succé');
        Flashy('Classe affecter au professeur avec succé');
        return redirect()->route('professeur.index');
    }
public function enregistrer(Request $request){

    $this->validate($request,[
        'nomUtilisateurProf'=>'required|digits:8',
        'classeAr'=>'required',
        'matiereAr'=>'required',
        //'matiereAr'=>'required',
       ]);
        if(! $prof = Professeur::where('nomUtilisateur',$request->nomUtilisateurProf)->first())
        {
            flash('Il n\'y a pas de professeur avec cette identifiant '.$request->nomUtilisateurProf,'danger');
            return back();
        }
        $annee = anneeScolaire::all()->last();
        $classe = Classe::whereIn('nomClasse',$request->classeAr)->get();
        $prof->classes()->attach($classe,[
            'matiere'=>$request->matiereAr,
            'anneeScolaire'=>anneeScolaire(),
        ]);
        /*for($i=0;$i<count($request->classe);$i++){
                $classe = Classe::where('nomClasse',$request->classe[$i])->first();
                if($prof->classes()->where('classe_id',$classe->id)->first())
                    continue;
                    $prof->classes()->attach($classe->id,[
                    'anneeScolaire'=>$annee->anneeDebut.'-'.$annee->anneeFin,
                ]);
            }*/
            flash('Classe affecter au professeur avec succé');
        Flashy('Classe affecter au professeur avec succé');
        return redirect()->route('professeur.index');
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
