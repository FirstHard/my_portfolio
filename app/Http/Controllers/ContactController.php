<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'custom_subject' => 'nullable|string|max:255',
        ]);

        if ($validatedData['subject'] === 'custom') {
            $validatedData['subject'] = $validatedData['custom_subject'];
        }

        ContactForm::create($validatedData);

        Mail::to(config('mail.to.address'))->queue(new ContactFormMail($validatedData));

        return redirect('/')->with('success', 'Form submitted successfully!');
    }
}
