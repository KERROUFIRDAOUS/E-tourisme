<?php

namespace App\Http\Controllers;

use App\Ville;
use Illuminate\Http\Request;

class villeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villes = Ville::orderby('id', 'desc')->get();
        return view('villes.index',compact('villes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('villes.create');
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
            'name' => 'required',
            'content' => 'required',
            'image'   =>  'required|image|mimes:jpeg,jpg,png|max:1000'
        ]);

        $destinationPath = public_path('upload');
        $image = $request->file('image');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $input['imagename']);
        $dbPath = $destinationPath . "/" . $input['imagename'];
        $ville = new Ville();
        $ville->name = $request->input('name');
        $ville->content = $request->input('content');
        $ville->image = $input['imagename'];
        $ville->save();
        return redirect()->route('villes.index')->with('success', 'city created successfully.');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ville $ville)
    {
        $villes = Ville::all();
        return view('villes.show',compact('ville','villes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ville $ville)
    {
        return view('villes.edit',compact('ville'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ville $ville)
    {
        $image = $request->hidden_image;
        $image = $request->file('image');
        $destinationPath = public_path('uploads');
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:1000'
        ]);
        $ville->update($request->except(['image']));
        $ville->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ville $ville)
    {
        $ville->delete();
        return redirect()->route('villes.index')
            ->with('success','ville supprimée avec succès');
    }
}
