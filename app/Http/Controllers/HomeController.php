<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('guest.home');
    }
    public function contacts()
    {
        return view('guest.contacts');
    }
    public function contactsSent(Request $request)
    {
        $form_data = $request->all();
        dd($form_data);
    }
}
