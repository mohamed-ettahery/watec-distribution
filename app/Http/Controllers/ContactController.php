<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'phone' => 'required',
            'message' => 'required|string',
        ]);

        Mail::to('contacts@watecdistribution.ma')->send(new ContactMail(
            $validatedData['name'],
            $validatedData['email'],
            $validatedData['subject'],
            $validatedData['phone'],
            $validatedData['message']
        ));

        $locale = app()->getLocale();
        $message = $locale === "fr" ? "Votre message à été envoyé avec succés!" : "Your message has been send successfully!";
        return back()->with('success_newsletter', $message);
    }
}
