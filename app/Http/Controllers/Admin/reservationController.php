<?php

namespace App\Http\Controllers\admin;

use App\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.areservation',compact('reservations'));
    }

    public function changerstatus(Request $request)
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
