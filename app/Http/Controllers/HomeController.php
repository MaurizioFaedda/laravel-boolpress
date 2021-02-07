<?php

namespace App\Http\Controllers;
use App\Lead;
use Illuminate\Http\Request;
use App\Mail\MessageFromWebsite;
use Illuminate\Support\Facades\Mail;

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
        $new_lead = new Lead();
        $new_lead->fill($form_data);
        $new_lead->save();
        Mail::to('info@boolpress.com')->send(new MessageFromWebsite($new_lead));
        return redirect()->route('contacts.thank-you');

    }
    public function thankYou()
    {
        return view('guest.thank_you');

    }
}
