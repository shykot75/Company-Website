<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{


    public function manage(){

        $messages = Message::orderBy('id','desc')->get();
        return view('admin.message.message', compact('messages'));
    }

    public function delete($id){
        $message = Message::find($id);
        $message->delete();
        return redirect()->back()->with('message', 'Message Deleted Successfully!!');
    }



}
