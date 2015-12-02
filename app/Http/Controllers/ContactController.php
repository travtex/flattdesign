<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMeRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
    * Show the form
    *
    * @return View
    */
    public function showForm()
    {
    	return view('blog.contact');
    }

    /** 
    * Email the contact request
    *
    * @param ContactMeRequest $request
    * @return Redirect
    */
    public function sendContactInfo(ContactMeRequest $request)
    {
    	$data = $request->only('name', 'email', 'phone');
    	$data['messageLines'] = explode("\n", $request->get('message'));

    	Mail::send('emails.contact', $data, function($message) use ($data) {
    		$message->subject('Flatt Design Blog Contact: '.$data['name'])
    			->to(config('blog.contact_email'))
    			->replyTo($data['email']);
    	});

    	return back()
    		->withSuccess("Thank you for your message.  It has been sent, and we will get back to you as soon as possible.");
    }
}
