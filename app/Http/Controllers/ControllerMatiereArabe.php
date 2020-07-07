<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatiereArabe;
use App\Models\Matiere;

class ControllerMatiereArabe extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matiere = MatiereArabe::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'nomFr'=>'required |string| min:2 | max:30 ',
            'nomArabe'=>'required |string| min:2 | max:50 | unique:matieres',
       ]);
      /* $matiere = ucfirst(strtolower($request->nomFr));
     if(MatiereArabe::where('nomFr',$matiere)->first())
        {
            session()->flash('message','cette matiére existe dejà');
            return back();
        }*/
       Matiere::create([
            'nomMatiere'=>$request->nomFr,
            'nomArabe'=>$request->nomArabe,
            'reference'=>reference(),
       ]);
        flash('Matiére créer avec succés');
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
