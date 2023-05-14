<?php

namespace App\Http\Controllers\moderateur;

use App\hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hotelController extends Controller
{
    public function index()
    {

        $hotels = hotel::where('created_by',Auth::user()->id)->get();
        return view('moderateur.hotels',compact('hotels'));

    }
    public function store(Request $request)
    {
        $destinationPath = public_path('upload');
        $image = $request->file('image');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $input['imagename']);
        $dbPath = $destinationPath . "/" . $input['imagename'];

        $hotel = new Hotel();
        $hotel->name = $request->input('name');
        $hotel->ville_id = $request->input('ville_id');
        $hotel->price = $request->input('base_price');
        $hotel->content = $request->input('content');
        $hotel->created_by=$request->input('created_by');
        $hotel->room = $request->input('room');
        $hotel->stars = $request->input('stars');
        $hotel->image = $input['imagename'];
        $hotel->save();
        toast('hotel ajouté !','success');

        return redirect('moderateur/hotels');
    }

    public function editer($id)
    {
        $hotel = Hotel::findOrfail($id);
        return view('moderateur.hotel_edit')->with('hotel' , $hotel);
    }

    public function modifier(Request $request)
    {
        $hotel = Hotel::findOrfail($request->id);
        $image = $request->hidden_image;
        $image = $request->file('image');
        $destinationPath = public_path('uploads');
        $hotel->name = $request->input('name');
        $hotel->content = $request->input('content');
        $hotel->ville_id = $request->input('ville_id');
        $hotel->price = $request->input('price');
        $hotel->room = $request->input('room');
        $hotel->stars = $request->input('stars');
        $hotel->image = $request->input('image');
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:1000'
        ]);
        $hotel->update($request->except(['image']));
        //$ville->save();
        toast('hotel ajouté !','success');

        return view('moderateur.hotels')->with('status','Data updated for hotels');
    }
    public function supprimer(Request $r)
    {
        $hotel = Hotel::findOrfail($r->id);

        $hotel->delete();
        toast('hotel supprimée !','success');

        return redirect('moderateur/hotels')->with('status','Data deleted for hotels');
    }

}
