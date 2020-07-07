<?php

namespace App\Http\Controllers;

use App\Models\anneeScolaire;
use App\Models\Classe;
use Illuminate\Http\Request;
use App\Models\Eleve;
use App\Models\Matiere;
use App\Models\Note;
use App\Models\Evaluation;
use App\Models\MatiereArabe;
use Flashy;
use MercurySeries\Flashy\Flashy as FlashyFlashy;

class ControllerEvaluation extends Controller
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
        $evaluation = Evaluation::all();
            return view('surveillants.eleves.ajoutEvaluation',compact('evaluation'));
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
            $eleves = $classe->eleves()->where(['anneeScolaire'=>anneeScolaire()])->paginate(10);

            return view('surveillants.eleves.enregistrerNote',compact('eleves','classe'));
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

    $this->validate($request,[
    'matiere'=>'required',
    'semestre'=>'required',
    'composition.*'=>'required|numeric|min:0|max:10',
    ]);
    $classe = Classe::where('nomClasse',request()->classe)->first();
      $matiere = Matiere::where('reference',$request->matiere)->first();
        for($i=0;$i<count($request->id);$i++){
            $eleve = Eleve::where('nomUtilisateur',$request->id[$i])->first();
            if($eleve->matieres()->where([
                'matiere_id'=>$matiere->id,
                'anneeScolaire'=>anneeScolaire(),
                'semestre'=>$request->semestre])->get()->count() > 0){
                    flash('vous avez deja ajouté les notes de la matiere "'.$matiere->nomMatiere.'" du semestre "'.$request->semestre.'" à la classe "'.request()->classe.'" pour cette année','danger');
                    Flashy::error('vous avez deja ajouté les notes de la matiere "'.$matiere->nomMatiere.'" du semestre "'.$request->semestre.'" à la classe "'.request()->classe.'" pour cette année');
                  return back();
                }
            $eleve->matieres()->attach($matiere->id,[
                'note'=>$request->composition[$i],
                'semestre'=>$request->semestre,
                'anneeScolaire'=>anneescolaire()
            ]);
        }
        flash('Evaluation enregister avec succés');
        Flashy::success('Evaluation enregistrté avec succé');
        return redirect()->route('evaluation.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $classe = Classe::where('nomClasse',$id)->first();
            //$semestre = request()->semestre;
            return view('surveillants.eleves.listerNoteEvaluation',compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($evaluation)
    {
        $eleve = Eleve::where('nomUtilisateur',$evaluation)->first();
        $matiere = Matiere::where('reference',request()->matiere)->first();
        return view('surveillants.eleves.modifierNoteEleve',compact('eleve','matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eleve $eleve)
    {
        $this->validate($request,[
            //'nomUtilisateur'=>'required|digits:8',
            //'matiere'=>'required|string',
            'note'=>'required|numeric|min:0|max:10',
        ]);
        $eleve= Eleve::where('nomUtilisateur',$request->nomUtilisateur)->first();

        $matiere= Matiere::where('reference',request()->matiere)->first()->id;
        if($elev = Evaluation::where(['eleve_id'=>$eleve->id,'matiere_id'=>$matiere,'semestre'=>request()->semestre,'anneeScolaire'=>anneeScolaire()])->first()){
            $elev->update([
                'note'=>$request->note,
            ]);
            flash('note de l\éléve a bien ete modifier');
            Flashy::success('note de l\éléve a bien ete modifier');
            return redirect()->route('evaluation.index');
            /*$elev->semestre=request()->semestre;
            $elev->anneeScolaire=$annee->anneeDebut.'-'.$annee->anneeFin;
            $elev->matiere_id=$matiere;
            $elev->save();*/
        }
            $eleve->matieres()->attach($matiere,[
                'note'=>$request->note,
                'semestre'=>request()->semestre,
                'anneeScolaire'=>anneeScolaire(),
            ]);

            //$classe = Classe::where('nomClasse',request()->classe)->first();
            flash('note de l\éléve a bien ete modifier');
            Flashy::success('note de l\éléve a bien ete modifier');
        return redirect()->route('evaluation.index');
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
