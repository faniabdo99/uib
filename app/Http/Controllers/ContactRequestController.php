<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactRequest;
use Illuminate\Validation\Rule;

class ContactRequestController extends Controller
{
    public function store(Request $r)
    {
        // Validate the incoming request
        $errors = $r->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'service_id' => 'required|integer',
            'message' => 'required',
            'source' => Rule::in(['HOMEPAGE', 'CONTACT_US']),
        ]);
        // Store the information
        ContactRequest::create($r->all());
        // Return a success message
        return back()->withSuccess('Your contact request has been recived!');
    }
}
