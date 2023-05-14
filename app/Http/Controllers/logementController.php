<?php

namespace App\Http\Controllers;

use App\Logement;
use App\Maison;
use Illuminate\Http\Request;

class logementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Maison $maison , Request $request, Logement $logement)
    {
//            $request->validate([
//           'user_id' => 'required',
//            'maison_id' => 'required',
//            'body'   =>  'required',
//            'checkin'   =>  'required',
//            'checkout'   =>  'required'
//        ]);

        $logement=new Logement() ;
        Logement::create([
            'body' => $request->input('body'),
            'checkin' => $request->input('checkin'),
            'checkout' => $request->input('checkout'),
            'maison_id' => $request->id,
            'user_id' => auth()->user()->id
        ]);
//
        return redirect()->back();




//            $request->validate([
//           'user_id' => 'required',
//            'maison_id' => 'required',
//            'body'   =>  'required',
//            'checkin'   =>  'required',
//            'checkout'   =>  'required'
//        ]);
//
//        $logement = new Logement();
//
//        $logement->user_id = $request->input('user_id');
//        $logement->maison_id = $request->input('maison_id');
//        $logement->body =  $request->input('body');
//        $logement->checkout = $request->input('checkout');
//        $logement->checkin = $request->input('checkin');
//
//
//
//        $logement->save();
//        return redirect()->back();
//

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
        $logement=Logement::findOrfail($id);
        $logement->delete();
        return redirect()->back()->with('success',' deleted successfully');
    }
}
