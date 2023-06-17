<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        //validate 
        request()->validate(['email' => 'required|email:filter']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $th) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }
        
        return redirect('/')
            ->with('success', 'You are now signed up for our newsletter!');   
        }
}
