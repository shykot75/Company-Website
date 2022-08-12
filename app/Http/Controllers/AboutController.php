<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{

    public function index(){
        return view('admin.about.add');
    }

    public function create(Request $request){

        $validatedData = $request->validate([
            'title'              => 'required|max:255',
            'short_description'  => 'required',
            'long_description'   => 'required',
        ],
            [
                'title.required'            => 'About Title is Required',
                'title.max'                 => 'About Title should not more than 255 characters',
                'short_description.required'=> 'Short Description is Required',
                'long_description.required' => 'Long Description is Required',
            ]);
        $about = new HomeAbout();
        $about->title               = $request->title;
        $about->short_description   = $request->short_description;
        $about->long_description    = $request->long_description;
        $about->created_at          = Carbon::now();
        $about->save();
        return redirect()->back()->with('message', 'About Info Created Successfully!!');
    }

    public function manage(){
        $homeAbout = HomeAbout::latest()->get();
        return view('admin.about.manage', compact('homeAbout'));
    }

    public function edit($id){
        $about = HomeAbout::find($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'title'              => 'required|max:255',
            'short_description'  => 'required',
            'long_description'   => 'required',
        ],
            [
                'title.required'            => 'About Title is Required',
                'title.max'                 => 'About Title should not more than 255 characters',
                'short_description.required'=> 'Short Description is Required',
                'long_description.required' => 'Long Description is Required',
            ]);
        $about = HomeAbout::find($id);
        $about->title               = $request->title;
        $about->short_description   = $request->short_description;
        $about->long_description    = $request->long_description;
        $about->created_at          = Carbon::now();
        $about->save();
        return redirect()->back()->with('message', 'About Info Updated Successfully!!');
    }

    public function delete($id){
        $about = HomeAbout::find($id);
        $about->delete();
        return redirect()->back()->with('message', 'About Info Deleted Successfully!!');
    }











}
