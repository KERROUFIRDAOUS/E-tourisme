<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ville;
use Illuminate\Http\Request;
Use Alert;


class villeController extends Controller
{
    public function index()
    {
        $villes = Ville::all();
        return view('admin.avilles',compact('villes'));

    }
    public function store(Request $request)
    {
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
        toast('ville ajouté !','success');


        return redirect('/avilles')->with('status', 'city created successfully.');
    }

    public function edit($id)
    {
        $ville = Ville::findOrfail($id);
        return view('admin.ville_edit')->with('ville', $ville);
    }

    public function updatev(Request $request , Ville $ville)
    {
//        $ville = Ville::findOrfail($request->id);
//        $image = $request->hidden_image;
//        $image = $request->file('image');
//        $destinationPath = public_path('uploads');
//        $ville->name = $request->input('name');
//        $ville->content = $request->input('content');
//        $ville->image = $request->input('image');
//        $request->validate([
//            'name' => 'required',
//            'content' => 'required',
//            'image' => 'image|mimes:jpeg,jpg,png|max:1000'
//        ]);
//        $ville->update($request->except(['image']));
//        //$ville->save();
//        toast('ville édité !','success');
//        return redirect('/avilles')->with('status','Data updated for villes');

        $request->validate([

        ]);
        $ville->update($request->all());
        return redirect()->route('avilles')
            ->with('success','ville modifié avec succès');
    }

    public function destroyv(Request $r)
    {
        $ville = Ville::findOrfail($r->id);

        $ville->delete();
        toast('ville supprimée !','success');

        return redirect('/avilles')->with('status','Data deleted for villes');
    }

}
