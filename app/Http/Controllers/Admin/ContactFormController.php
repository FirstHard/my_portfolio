<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Notifications\ResponseContactFormNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class ContactFormController extends Controller
{
    public function index()
    {
        $submissions = ContactForm::latest()->paginate(10);
        return view('admin.pages.contact.submissions', compact('submissions'));
    }

    public function show($id)
    {
        $contactForm = ContactForm::findOrFail($id);

        return view('admin.pages.contact.show', compact('contactForm'));
    }

    public function destroy($id)
    {
        $contactForm = ContactForm::findOrFail($id);
        $contactForm->delete();

        return redirect('admin/messages')
            ->with('success', 'Message deleted successfully');
    }
}
