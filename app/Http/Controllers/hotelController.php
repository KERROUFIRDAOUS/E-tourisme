<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Ville;
use Illuminate\Http\Request;

class hotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villes = Ville::all();
        $hotels = Hotel::orderby('id', 'desc')->get();
        return view('hotels.index',compact('hotels','villes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.create');
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
            'title' => 'required',
            'content' => 'required',
            'image'   =>  'required|image|mimes:jpeg,jpg,png|max:1000'
        ]);

        $destinationPath = public_path('upload');
        $image = $request->file('image');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $input['imagename']);
        $dbPath = $destinationPath . "/" . $input['imagename'];
        $hotel = new Hotel();
        $hotel->title = $request->input('title');
        $hotel->created_by=$request->input('created_by');
        $hotel->content = $request->input('content');
        $hotel->image = $input['imagename'];
        $hotel->save();
        return redirect()->route('hotels.index')->with('success', 'hotel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return view('hotels.show',compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $image = $request->hidden_image;
        $image = $request->file('image');
        $destinationPath = public_path('uploads');
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:1000'
        ]);
        $hotel->update($request->except(['image']));
        $hotel->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotels.index')
            ->with('success','hotel supprimé avec succès');
    }
}
