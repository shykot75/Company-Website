<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(){
        return view('admin.contact.add');
    }

    public function create(Request $request){

        $validatedData = $request->validate([
            'location' => 'required',
            'email'    => 'required',
            'call'     => 'required',
        ],
            [
                'location.required'  => 'Location is Required',
                'email.required'     => 'Email is Required',
                'call.required'      => 'Call Info  is Required',
            ]);
        $contact = new Contact();
        $contact->location               = $request->location;
        $contact->email   = $request->email;
        $contact->call    = $request->call;
        $contact->save();
        return redirect()->back()->with('message', 'Contact Info Created Successfully!!');
    }

    public function manage(){
        $contacts = Contact::all();
        return view('admin.contact.manage', compact('contacts'));
    }

    public function edit($id){
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('about'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'location' => 'required',
            'email'    => 'required',
            'call'     => 'required',
        ],
            [
                'location.required'  => 'Location is Required',
                'email.required'     => 'Email is Required',
                'call.required'      => 'Call Info  is Required',
            ]);
        $contact = Contact::find($id);
        $contact->location               = $request->location;
        $contact->email   = $request->email;
        $contact->call    = $request->call;
        $contact->save();
        $contact->save();
        return redirect()->back()->with('message', 'Contact Info Updated Successfully!!');
    }

    public function delete($id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('message', 'Contact Info Deleted Successfully!!');
    }




















}
