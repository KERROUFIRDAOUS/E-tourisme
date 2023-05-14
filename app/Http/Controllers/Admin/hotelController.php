<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.ahotels',compact('hotels'));

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
        $hotel->created_by=$request->input('created_by');
        $hotel->content = $request->input('content');
        $hotel->room = $request->input('room');
        $hotel->stars = $request->input('stars');
        $hotel->image = $input['imagename'];
        $hotel->save();
        toast('hotel ajouté !','success');

        return redirect('/ahotels');
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrfail($id);
        return view('admin.hotel_edit')->with('hotel' , $hotel);
    }

    public function updateh(Request $request , Hotel $hotel)
    {
//        $hotel = Hotel::findOrfail($request->id);
//        $image = $request->hidden_image;
//        $image = $request->file('image');
//        $destinationPath = public_path('uploads');
//        $hotel->name = $request->input('name');
//        $hotel->content = $request->input('content');
//        $hotel->ville_id = $request->input('ville_id');
//        $hotel->price = $request->input('price');
//        $hotel->room = $request->input('room');
//        $hotel->stars = $request->input('stars');
//        $hotel->image = $request->input('image');
//        $request->validate([
//            'name' => 'required',
//            'content' => 'required',
//            'image' => 'image|mimes:jpeg,jpg,png|max:1000'
//        ]);
//        $hotel->update($request->except(['image']));
//        //$ville->save();
//        toast('hotel ajouté !','success');
//
//        return redirect('/ahotels')->with('status','Data updated for hotels');

        $request->validate([

        ]);
        $hotel->update($request->all());
        return redirect()->route('ahotels')
            ->with('success','hotel modifié avec succès');

    }
    public function destroyh(Request $r)
    {
        $hotel = Hotel::findOrfail($r->id);

        $hotel->delete();
        toast('hotel supprimée !','success');

        return redirect('/ahotels')->with('status','Data deleted for hotels');
    }

}
