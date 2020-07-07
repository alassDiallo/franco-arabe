<?php

namespace App\Http\Controllers;

use App\Models\anneeScolaire;
use App\Models\Bultin;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\Matiere;
use Flashy;

class ControllerBultin extends Controller
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
        $bultin = Bultin::where('anneeScolaire',request()->anneeScolaire);
        return view('bultins.accueil',compact('bultin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->classe) {
            $classe=Classe::where('nomClasse',request()->classe)->first();
            return view('bultins.creerBultin',compact('classe'))->with('anneeScolaire',anneeScolaire());
        }
        if (request()->class) {
            $classe=Classe::where('nomClasse',request()->class)->first();
            return view('bultins.listeBultinCreer',compact('classe'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('store');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annee = explode('-',request()->anneeScolaire);
        $anneeDebut = $annee[0];
        $anneeFin = $annee[1];
      $anneeS = anneeScolaire::all()->last();
      if($anneeDebut == $anneeS->anneeDebut && $anneeFin == $anneeS->anneeFin){
        $eleve = Eleve::where('nomUtilisateur',$id)->with('classes')->first();
        if($eleve->matieres()->where([
            'anneeScolaire' => request()->anneeScolaire,
            'semestre'=>request()->semestre])->count() > 0)
            {
            if(Bultin::where(['eleve_id'=>$eleve->id,'semestre'=>request()->semestre,'anneeScolaire'=>request()->anneeScolaire])->first()){
            flash('cette éléve a deja son bultin','danger');
            Flashy::error('cette éléve a deja son bultin','danger');
                return redirect()->back();
        }
        $noteMax=10;

        //$somC=0;

        $som=0;
        //$eleve = Eleve::where('nomUtilisateur',$id)->with('matieres')->with('classes')->first();
        $somC = $eleve->classes()->where('anneeScolaire',request()->anneeScolaire)->first()->matieres()->whereNull('nomArabe')->sum('coefficient');
        $m=$eleve->classes()->where('anneeScolaire',request()->anneeScolaire)->first()->matieres()->whereNull('nomArabe')->count()*$noteMax;
        //$somC = $classes->matieres()->where('classe_id',$classes->id)->sum('coefficient');

        foreach( $eleve->matieres()->whereNull('nomArabe')->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre])->get() as $matiere){
        $som += $matiere->classes()->where('matiere_id',$matiere->id)->first()->pivot->coefficient * $matiere->pivot->note;
        }

        $somCa=$eleve->classes()->where('anneeScolaire',request()->anneeScolaire)->first()->matieres()->whereNotNull('nomArabe')->sum('coefficient');;
        $ma = $eleve->classes()->where('anneeScolaire',request()->anneeScolaire)->first()->matieres()->whereNotNull('nomArabe')->count()*$noteMax;
        $soma=0;
        /*foreach ($eleve->classes()->where('anneeScolaire',request()->anneeScolaire)->get() as $classes){
            $somCa = $classes->matiere_arabes()->where('classe_id',$classes->id)->sum('coefficient');
        }*/
        foreach( $eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>request()->anneeScolaire,'semestre'=>request()->semestre])->get() as $matiere){
        $soma += $matiere->classes()->where('matiere_id',$matiere->id)->first()->pivot->coefficient * $matiere->pivot->note;
        //$somC = $matiere->classes()->where('matiere_id',$matiere->id)->get()->sum('coefficient');
        }

        Bultin::create([
            'semestre'=>request()->semestre,
            'anneeScolaire'=>request()->anneeScolaire,
            'moyenne'=>($som/($somC)),
            'moyenneArabe'=>($soma/($somCa)),
            'eleve_id'=>$eleve->id,
        ]);
            flash('Bultin creer Avec Succes');
            Flashy::success('Bultin créer avec succé');
            $classe = Classe::where('nomClasse',request()->classe)->first();
           return view('bultins.afficherBultinCreer',compact('eleve','som','soma','m','ma','classe'));
        }
        flash("désolé mais cette éléve n 'a pas de note d'evaluation pour le semestre '<strong>".request()->semestre."</strong>' de cette année Scolaire",'danger');
        Flashy::error("désolé mais cette éléve n 'a pas de note d'evaluation pour le semestre '<strong>".request()->semestre."</strong>' de cette année Scolaire",'danger');

        return back();
    }
    return back();
    }

    public function afficher(){
        $eleve = Eleve::where('nomUtilisateur',request()->bultin)->with('matieres')->with('classes')->first();
        //$m=$eleve->classes()->where('anneeScolaire',request()->anneeScolaire)->count() ;
        $som=0;
        $noteMax=10;
        //$eleve = Eleve::where('nomUtilisateur',$id)->with('matieres')->with('classes')->first();
        $somC = $eleve->classes()->where('anneeScolaire',annee())->first()->matieres()->whereNull('nomArabe')->sum('coefficient');
        $m=$eleve->classes()->where('anneeScolaire',annee())->first()->matieres()->whereNull('nomArabe')->count()*$noteMax;
        //$somC = $classes->matieres()->where('classe_id',$classes->id)->sum('coefficient');

        foreach( $eleve->matieres()->whereNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre])->get() as $matiere){
        $som += $matiere->classes()->where('matiere_id',$matiere->id)->first()->pivot->coefficient * $matiere->pivot->note;
        }

        $somCa=$eleve->classes()->where('anneeScolaire',annee())->first()->matieres()->whereNotNull('nomArabe')->sum('coefficient');;
        $ma = $eleve->classes()->where('anneeScolaire',annee())->first()->matieres()->whereNotNull('nomArabe')->count()*$noteMax;
        $soma=0;
        /*foreach ($eleve->classes()->where('anneeScolaire',request()->anneeScolaire)->get() as $classes){
            $somCa = $classes->matiere_arabes()->where('classe_id',$classes->id)->sum('coefficient');
        }*/
        foreach( $eleve->matieres()->whereNotNull('nomArabe')->where(['anneeScolaire'=>annee(),'semestre'=>request()->semestre])->get() as $matiere){
        $soma += $matiere->classes()->where('matiere_id',$matiere->id)->first()->pivot->coefficient * $matiere->pivot->note;
        //$somC = $matiere->classes()->where('matiere_id',$matiere->id)->get()->sum('coefficient');
        }
        $classe = Classe::where('nomClasse',request()->classe)->first();
        return view('bultins.afficherBultinCreer',compact('eleve','som','soma','m','ma','classe'));

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
