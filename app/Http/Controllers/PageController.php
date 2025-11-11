<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function ourStory()
    {
        return view('pages.our-story');
    }

    public function careers()
    {
        return view('pages.careers');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Handle contact form submission
        // Send email, save to database, etc.

        return back()->with('success', 'Thank you for contacting us!');
    }

    public function submitCareer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'department' => 'required|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'message' => 'required|string',
        ]);

        // Handle career application
        // Save CV, send notification, etc.

        return back()->with('success', 'Your application has been submitted!');
    }
}
