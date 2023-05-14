<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Maison;
use Illuminate\Http\Request;

class maisonController extends Controller
{
    public function index()
    {
        $maisons = Maison::all();
        return view('admin.amaison',compact('maisons'));

    }
    public function destroym(Request $r)
    {
        $maison = Maison::findOrfail($r->id);

        $maison->delete();

        toast('Maison ajouté !','success');

        return redirect('/amaisons');
    }
}
