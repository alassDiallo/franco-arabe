<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Matiere;
use App\Models\MatiereArabe;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Flashy;
use phpDocumentor\Reflection\Types\Null_;
use SebastianBergmann\Type\NullType;

class ControllerMatiere extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matiere = Matiere::whereNull('nomArabe')->orderBy('nomMatiere')->get();

        $matiereAr = Matiere::whereNotNull('nomArabe')->orderBy('nomMatiere')->get();
        return view('utilisateur.listeMatiere',compact('matiere','matiereAr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('utilisateur.ajouterMatiere');
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
            'nomMatiere'=>'required |string| min:2 | max:30 ',
       ]);
       $matiere = ucfirst(strtolower($request->nomMatiere));
     if(Matiere::where(['nomMatiere'=>$matiere,'nomArabe'=>Null])->first())
        {
            session()->flash('message','cette matiére existe dejà');
            return back();
        }
       Matiere::create([
            'nomMatiere'=>$matiere,
            'reference'=>reference()
       ]);
        flash('Matiére créer avec succés');
       return redirect()->route('matiere.index',);
    }

    public function storeArabe(Request $request)
    {
       $this->Validate($request,[
            'nomFr'=>'required |min:2 |alpha|max:15',
            'nomAr'=>'required|min:2|max:15|unique:matieres',
       ]);
      /* $matiere = ucfirst(strtolower($request->nomMatiere));
     if(Matiere::where('nomMatiere',$matiere)->count() >=1)
        {
            session()->flash('message','cette matiére existe dejà');
            return back();
        }*/
       /*Matiere::create([
            'nomMatiere'=>$request->,
       ]);*/
        flash('Matiére créer avec succés');
       return redirect()->route('matiere.index',);
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

    public function supprimer(Request $request){

        dd($request->matiere);
            foreach($request->matiere as $matiere){
                Matiere::where('nomMatiere',$matiere)->delete();
            }
            flash('matiere supprimé avec succé');
            return redirect()->route('matiere.index');
    }
}
