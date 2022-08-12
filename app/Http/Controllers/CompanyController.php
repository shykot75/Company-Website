<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\HomeAbout;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index(){

        $about = HomeAbout::latest()->first();
        $portfolios = Portfolio::all();
        $apps = Portfolio::where('category','app')->get();
        $cards = Portfolio::where('category','card')->get();
        $webs = Portfolio::where('category','web')->get();
         return view('website.home.index', compact('about', 'portfolios', 'apps', 'cards', 'webs'));

    }

    public function contact(){

        $contact = Contact::first();

        return view('website.contact.contact', compact('contact'));
    }

    public function message(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email'    => 'required',
            'subject'     => 'required',
            'message'     => 'required',
        ],
            [
                'name.required'  => 'Name is Required',
                'email.required'     => 'Email is Required',
                'subject.required'      => 'Subject Info  is Required',
                'message.required'      => 'Message Info  is Required',
            ]);


        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        return redirect()->back()->with('message', 'Message Send Successfully!!');

    }










}
