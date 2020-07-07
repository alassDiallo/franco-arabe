<?php

namespace App\Http\Controllers;

use App\Models\Evaluationarabes;
use App\Models\anneeScolaire;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\MatiereArabe;
use Flashy;
use Illuminate\Http\Request;

class ControllerEvaluationArabe extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluation = Evaluationarabes::all();
            return view('surveillants.eleves.ajoutEvaluationArabe',compact('evaluation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $annee = anneeScolaire::get()->last();
        if (request()->classe) {
            $eleves = Eleve::with('classes')->whereHas('classes', function ($query) {
                $query->where('nomClasse', request()->classe);
            })->paginate(10);
            $classe=Classe::where('nomClasse',request()->classe)->first();
            return view('surveillants.eleves.enregistrerNoteArabe',compact('eleves','classe','annee'));
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
            'matierear'=>'required',
            'anneeScol'=>'required',
            'semes'=>'required',
            'compos.*'=>'required|numeric|min:0|max:10',
            ]);
       $matiere = MatiereArabe::where('nomAr',$request->matierear)->first();
        for($i=0;$i<count($request->num);$i++){
            $eleve = Eleve::where('nomUtilisateur',$request->num[$i])->first();
            if($eleve->matiere_arabes()->where([
                'matiere_arabe_id'=>$matiere->id,
                'anneeScolaire'=>$request->anneeScol,
                'semestre'=>$request->semes])->get()->count() > 0){
                    flash('vous avez deja ajouté les notes de la matiere "'.$matiere->nomFr.' '.$matiere->nomAr.'" du semestre "'.$request->semestre.'" à la classe "'.request()->classe.'" pour cette année','danger');
                    Flashy::error('vous avez deja ajouté les notes de la matiere "'.$matiere->nomFr.' '.$matiere->nomAr.'" du semestre "'.$request->semestre.'" à la classe "'.request()->classe.'" pour cette année');
                  return back();
                }
            $eleve->matiere_arabes()->attach($matiere->id,[
                'note'=>$request->compos[$i],
                'semestre'=>$request->semes,
                'anneeScolaire'=>$request->anneeScol
            ]);
        }
        flash('Evaluation enregister avec succés');
        Flashy::success('Evaluation enregistrté avec succé');
        return redirect()->route('evaluationArabe.index');
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
    public function edit($evaluation)
    {
        $eleve = Eleve::where('nomUtilisateur',$evaluation)->first();
        return view('surveillants.eleves.modifierNoteArabeEleve',compact('eleve'));
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
            'nomUtilisateur'=>'required|digits:8',
            'matiere'=>'required|string',
            'note'=>'required|numeric|min:0|max:10',
        ]);
        $annee = anneeScolaire::all()->last();
        $elev= Eleve::where('nomUtilisateur',$request->nomUtilisateur)->first();
        $matiere= MatiereArabe::where('nomFr',$request->matiere)->first()->id;
        if($eleve = Evaluationarabes::where(['eleve_id'=>$elev->id,'matiere_arabe_id'=>$matiere,'semestre'=>request()->semestre,'anneeScolaire'=>$annee->anneeDebut.'-'.$annee->anneeFin])->first()){
            $eleve->update([
                'note'=>$request->note,
            ]);
            flash('note de l\éléve a bien ete modifier');
            Flashy::success('note de l\éléve a bien ete modifier');
            return redirect()->route('evaluation.index');
        }
            /*$eleve->note = $request->note;
            $eleve->semestre=request()->semestre;
            $eleve->anneeScolaire=$annee->anneeDebut.'-'.$annee->anneeFin;
            $eleve->matiere_arabe_id=$matiere;
            $eleve->save();*/
            $elev->matiere_arabes()->attach($matiere,[
                'note'=>$request->note,
                'semestre'=>request()->semestre,
                'anneeScolaire'=>$annee->anneeDebut.'-'.$annee->anneeFin,
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
