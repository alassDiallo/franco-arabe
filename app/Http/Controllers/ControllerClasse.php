<?php

namespace App\Http\Controllers;
use  App\Http\Requests\validationClasseRequest;
use App\Models\Classe;
use App\Models\Tuteur;
use Illuminate\Http\Request;
use Flashy;
use Illuminate\Validation\Rule;
use MercurySeries\Flashy\Flashy as FlashyFlashy;

class ControllerClasse extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        //$this->middleware('auth');
    }
    public function index()
    {
        $classe = Classe::all();
        return view('utilisateur.classes',compact('classe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('utilisateur.classe');
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
            'nomClasse'=> 'required|string|min:2|unique:classes',
            'montantInscription'=>'required|integer|min:1',
            'mensualite'=>'required|integer|min:1|max:'.($request->montantInscription-1)
            ]);

            /*$classe = ucfirst(strtolower($request->nomClasse));
            if(Classe::where('nomClasse',$classe)->count() >=1)
               {
                   session()->flash('message','cette classe existe dejà');
                   session()->flash('classe',$classe);
                   return back();
               }*/
        Classe::create([
            'nomClasse'=> $request->nomClasse,
            'montantInscription'=>$request->input('montantInscription'),
            'mensualite'=>$request->input('mensualite')
        ]);
        Flashy::success('classe créer avec succé');
            return redirect()->route('classe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        return view('utilisateur.detailClasse',compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
       return view('utilisateur.modifierClasse',compact('classe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classe $classe)
    {
        $this->validate($request,[
            'nomClasse'=> [
                'required',
                'string',
                'min:2',
                Rule::unique('classes')->ignore($classe),
                ],
            'montantInscription'=>'required|integer|min:1',
            'mensualite'=>'required|integer|min:1|max:'.($request->montantInscription-1)
            ]);
            Classe::where('nomClasse',$classe->nomClasse)
                    ->update([
                        'nomClasse'=> $request->nomClasse,
                        'montantInscription'=>$request->input('montantInscription'),
                        'mensualite'=>$request->input('mensualite')
            ]);
            flashy('classe modifier avec succé '.$classe->nomClasse);
            Flashy::success('classe modifier avec succé '.$classe->nomClasse);
                return redirect()->route('classe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('supprimer classe');
    }
}
