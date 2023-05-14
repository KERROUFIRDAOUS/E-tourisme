<?php

namespace App\Http\Controllers;

use App\Maison;
use App\Ville;
use Illuminate\Http\Request;


class maisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villes = Ville::all();
        $maisons = Maison::orderby('id', 'desc')->get();
        return view('maisons.index',compact('maisons','villes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::skip(1)->take(3)->get();
        return view('maisons.create',compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
              //  'user_id' => 'required',
                'ville_id' => 'required',
                'nombre_de_chambre' => 'required',
                'prix' => 'required',
                'surface' => 'required',
                'chauffage' => 'required',
                'climatisation' => 'required',
                'content' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png|max:1000'
        ]);
        $destinationPath = public_path('upload');
        $image = $request->file('image');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $input['imagename']);
        $dbPath = $destinationPath . "/" . $input['imagename'];
        $maison = new Maison();
        $maison->user_id = auth()->user()->id;
        $maison->nombre_de_chambre = $request->input('nombre_de_chambre');
        $maison->prix = $request->input('prix');
        $maison->surface = $request->input('surface');
        $maison->chauffage = $request->input('chauffage');
        $maison->climatisation = $request->input('climatisation');
        $maison->content = $request->input('content');
        $maison->ville_id = $request->input('ville_id');
        $maison->prix = $request->input('prix');
        $maison->image = $input['imagename'];
        $maison->save();
        return redirect()->route('maisons.index')->with('success', 'maison created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Maison $maison)
    {
        $villes = Ville::all();
        return view('maisons.show',compact('maison','villes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Maison $maison)
    {
        $villes = Ville::skip(1)->take(3)->get();

        return view('maisons.edit',compact('maison','villes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maison $maison)
    {
        $request->validate([

        ]);
        $maison->update($request->all());
        return redirect()->route('maisons.index')
            ->with('success','maison modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maison $maison)
    {
        $maison->delete();
        return redirect()->route('maisons.index')
            ->with('success','maison supprimée avec succès');
    }
}
