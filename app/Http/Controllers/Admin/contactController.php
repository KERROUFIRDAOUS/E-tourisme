<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact',compact('contacts'));
    }
}
