<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Spatie\Newsletter\Newsletter;
use app\Models\Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('newsletter.newsletter');
    }

    public function store(Request $request)
    {
        if ( ! Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribePending($request->email);
            return redirect('newsletter.newsletter')->with('success', 'Thanks For Subscribe');
        }
        return redirect('newsletter.newsletter')->with('failure', 'Sorry! You have already subscribed ');
            
    }
}
