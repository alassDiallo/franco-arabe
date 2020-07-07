<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anneeScolaire;
use App\Models\Mois;
use App\Models\Classe;
use App\Models\Eleve;
use Flashy;
use LengthException;
use MercurySeries\Flashy\Flashy as FlashyFlashy;

class ControllerMensualite extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        /*$data = ['nomUtilisateur'=>'13345678',
            'profil'=>'prof',
            'password'=>'12345678'];
        (new RegisterController())->create($data);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $annee = anneeScolaire::all();
        $classe = Classe::all();
        $mois = Mois::all();
        return view('payements.mensualite',compact('annee','classe','mois'));
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
            'anneeScolaire'=>'required',
            'classe'=>'required',
            'nomUtilisateur'=>'required|digits:8',
            'mois'=>'required',
            'sommeVerse'=>'required|numeric|min:0|max:100',
        ]);
        $classe = Classe::where('nomClasse',$request->classe)->first()->mensualite;
        if(!$eleve=Eleve::where('nomUtilisateur',$request->nomUtilisateur)->first())
            {
                flash('il n\'y a aucun eleve avec ce nomUtilisateur','danger');
                Flashy::error('il n\'y a aucun eleve avec ce nomUtilisateur');
                return back();
            }
           if($request->mois != null){
            /*for($i=0;$i<count($request->mois);$i++){
                $mois = Mois::where('nomMois',$request->mois[$i])->first();
                if($eleve->mois()->where(['mois_id'=>$mois->id,'anneeScolaire'=>$request->anneeScolaire])->count() > 0){
                    Flashy('cet eleve a deja payer la mensualite du mois de '.$mois->nomMois);
                    continue;
                }*/$mois= Mois::whereIn('nomMois',$request->mois)->get();
                     $eleve->mois()->attach($mois,[
                    'montant_verser'=>$request->sommeVerse,
                    'reste'=>($classe-$request->sommeVerse),
                    'anneeScolaire'=>$request->anneeScolaire,
                ]);
            }
            flash('Mensualité effectué avec succés');
            return back();


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
