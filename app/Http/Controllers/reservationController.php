<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\reservation;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $hotel = Hotel::findOrfail($id);
        return view('hotels.Reservation')->with('hotel' , $hotel);
    }

    public function reservation(Request $request , Reservation $reservation , Hotel $hotel)
    {
//        $request->validate([
//            'user_id' => 'required',
//            'phone_id' => 'required',
//            'hotel_id' => 'required',
//            'price' => 'required',
//            'message' => 'required',
//            'checkin' => 'required',
//            'checkout' => 'required'
//        ]);
//
//        $reservation = new Reservation();
//        $reservation ->user_id = $request->input('user_id');
//        $reservation-> phone_id = $request->input('phone_id');
//        $reservation-> hotel_id = $request->input('hotel_id');
//        $reservation-> price = $request->input('price');
//        $reservation-> message = $request->input('message');
//        $reservation-> checkin = $request->input('checkin');
//        $reservation-> checkout = $request->input('checkout');
//
//        $reservation->save();
//        return redirect()->back()->with('success',' reservation successfully');


        if (!Reservation::where('user_id', auth()->user()->id)->where('hotel_id', $request->input('hotel_id'))->exists()) {

            Reservation::create([
                'user_id' => auth()->user()->id,
                'phone_id' => auth()->user()->phone,
                'hotel_id' =>$request->input('hotel_id'),
                'price' => $request->input('price'),
                'rooms' => $request->input('rooms'),
                'adults' => $request->input('adults'),
                'children' => $request->input('children'),
                'checkin' => $request->input('checkin'),
                'checkout' => $request->input('checkout'),

            ]);

            \Mail::send('hotels.MailReservation',
                array(
                    'user_id' => $request->get('user_id'),
                    'phone_id' => $request->get('phone_id'),
                    'hotel_id' => $request->get('hotel_id'),
                    'price' => $request->get('price'),
                    'message' => $request->get('message'),
                    'checkin' => $request->get('checkin'),
                    'checkout' => $request->get('checkout'),
                ), function($message) use ($request) {
                    $message->from('bupu43975@gmail.com');
                    $message->to('firdaouskb@gmail.com');
                });

            return redirect()->back()->with('success',' reservation successfully');
        } else {

            return redirect()->back()->with('error', 'You already Reserved!');
        }


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Ville $ville)
    {
        return view('hotels.Reservation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Ville $ville)
    {
        return view('hotels.Reservation');
    }
   // public function Reserver($hotel_id)
    ////{
      //  return view('hotels.Reservation');
    //}

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
