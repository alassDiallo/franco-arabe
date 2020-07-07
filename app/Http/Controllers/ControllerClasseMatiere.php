<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;
use App\Models\Classe;
use App\Models\Classe_matiere;
use App\Models\MatiereArabe;
use Flashy;

class ControllerClasseMatiere extends Controller
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
        $matieres = Matiere::orderBy('nomMatiere')->get();
        return view('utilisateur.ajouterClasseMatiere',compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matieres = Matiere::all();
        return view('utilisateur.ajouterClasseMatiere',compact('matieres'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'classe'=>'required',
       ]);

            //dd($request->matiere,$request->matierear);
       $classe = Classe::where('nomClasse',$request->classe)->firstOrFail();
       if($request->matiere !=null){
       /*if(count($request->matiere)>10)
       {
            flash('désolé une classe ne peux pas contenir plus de 10 matiéres','danger');
            Flashy::error('désolé une classe ne peux pas contenir plus de 10 matiéres pour une langue');
            return redirect()->back();
       }*/
       foreach($request->matiere as $mat=> $value){
        $matiere = Matiere::where('reference',$value)->firstOrFail();
        $nbr=0;
        foreach($classe->matieres as $classes){
             if($classes->pivot->matiere_id == $matiere->id && $classes->pivot->classe_id==$classe->id)
             $nbr++;
        }
             if($nbr>=1){
                session()->flash('message','la classe "'.$request->classe.'" a deja la matiere "'.$matiere->nomMatiere.'"','danger');
                continue;
            }
            //dd('existe pas');
                $classe->matieres()->attach($matiere->id,['coefficient'=>1]);

            }
        }
           /* if($request->matierear !=null){
            foreach($request->matierear as $mat=> $value){
                $matiere = MatiereArabe::where('nomFr',$value)->firstOrFail();
                $nbr=0;
                foreach($classe->matiere_arabes as $classes){
                     if($classes->pivot->matiere_arabe_id == $matiere->id && $classes->pivot->classe_id==$classe->id)
                     $nbr++;
                }
                     if($nbr>=1){
                        session()->flash('message','la classe "'.$request->classe.'" a deja la matiere "'.$matiere->nomFr.'-'.$matiere->nomAr.'"','danger');
                        continue;
                    }
                    //dd('existe pas');
                        $classe->matiere_arabes()->attach($matiere->id,['coefficient'=>1]);

                    }
                }*/
            flash('Matiére ajouté à la classe  avec succés','success');
            Flashy::success('Matiére(s) ajouté à la classe avec succés');
               return redirect()->route('classematiere.index');
         }




       //dd($classe->id,$matiere->id);


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
        Classe_matiere::where(['matiere_id'=>$id,'classe_id'=>request()->classe])->delete();
        flash('matiere supprimer avec succée ');
        return back();
    }
}
