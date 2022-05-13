<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function store(Request $request)
    {
        //dd($request->all());

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->options = $request->options;
        // $contact->address = $request->address;
        // $contact->city = $request->city;
        $contact->seen = 0;
        // $contact->zipcode = $request->zipcode;
        $contact->message = $request->message;
        $contact->save();
        $details = [
                    'Name' => $request->name,
                    'Phone' => $request->phone,
                    'Email' => $request->email,
                    'Message' => $request->message
                ];
                // \Mail::to('tommy@laundry2run.com')->send(new \App\Mail\ContactMail($details));
        return redirect('contact-us')->with('success', 'Your Message Successfully Sent!');
    }
}
