<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Models\Eleve;
use App\Models\Matiere;
use App\Models\Note;
use Flashy;

class ControllerNote extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('surveillants.eleves.ajout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->classe) {
            $eleves = Eleve::with('classes')->whereHas('classes', function ($query) {
                $query->where('nomClasse', request()->classe);
            })->paginate(10);
            $classe=Classe::where('nomClasse',request()->classe)->first();
            return view('surveillants.eleves.ajouterNote',compact('eleves','classe'));
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
   /* $classe= Classe::where('id',$request->classe)->with('matieres')->get();
      foreach($classe->matieres as $class)
      {
          dd('classe');
      }

      /*if(Note::where(['matiere_id'=>$request->matiere,'semestre'=>$request->semestre,'anneeScomaire'=>$request->anneeScolaire])->count() > 0){
          flash('vous avez deja enregister les note de '.$request->matiere.'a cette classe');
          return back();
      }*/
        for($i=0;$i<count($request->id);$i++){
            $eleve = Eleve::where('id',$request->id[$i])->first();
            $eleve->matieres()->attach($request->matiere,[
                'note'=>$request->note[$i],
                'nomEvaluation'=>$request->evaluation,
                //'devoir2'=>$request->devoir2[$i],
                //'composition'=>$request->composition[$i],
                'semestre'=>$request->semestre,
                'anneeScolaire'=>$request->anneeScolaire
            ]);
        }
        flash('note enregister avec succés');
        return redirect()->route('note.index');
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
            return view('surveillants.eleves.listerNote',compact('classe'));
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
