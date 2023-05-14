<?php

namespace App\Http\Controllers\moderateur;

use App\hotel;
use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reservationController extends Controller
{
    public function index()
    {

        $myhotels = hotel::where('created_by',Auth::user()->id)->first();

        $reservations = Reservation::where('hotel_id',$myhotels->id)->get();

        return view('moderateur/reservation',compact('reservations'));
    }
    public function changerstatus2(Request $request)
    {
        if ($request->isMethod('post')  ){

            $data = $request->all();

            Reservation::where('id',$data['reservation_id'])->update(['status'=>$data['reservation_status']]);


        }if (Reservation::where('status','Accepté'))
        toast('ReservAtion Aproved !','success');
    else
        toast('ReservAtion Aproved !','success');
        return back();

    }
}
