<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{

    public function getImageUrl($request){
        $image = $request->file('image');
        $codeGen = hexdec(uniqid());
        $imageName = $image->getclientOriginalName();
        $imageFullName = $codeGen.'_'.$imageName;
        $directory = 'images/slider/';
        Image::make($image)->resize(1920,1088)->save($directory.$imageFullName);
//        $image->move($directory, $imageFullName);
        return $directory.$imageFullName;
    }

    public function add(){
        return view('admin.slider.add');
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'title'         => 'required|max:255',
            'description'   => 'required',
            'image'         => 'required',
        ],
            [
                'title.required'        => 'Slider Title is Required',
                'title.max'             => 'Slider Title should not more than 255 characters',
                'description.required'  => 'Slider Description is Required',
                'image.required'        => 'Slider Image is Required',
            ]);

        $slider = new Slider();
        $slider->title          = $request->title;
        $slider->description    = $request->description;
        $slider->button         = $request->button;
        $slider->image          = $this->getImageUrl($request);
        $slider->save();
        return redirect()->back()->with('message', 'Slider Added Successfully!!');
    }

    public function manage(){
        $sliders = Slider::all();
        return view('admin.slider.manage', compact('sliders'));
    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'title'         => 'required|max:255',
            'description'   => 'required',
        ],
            [
                'title.required'        => 'Slider Title is Required',
                'title.max'             => 'Slider Title should not more than 255 characters',
                'description.required'  => 'Slider Description is Required',
            ]);

        $slider = Slider::find($id);

        if($request->file('image')){
            if(file_exists($slider->image)){
                unlink($slider->image);
            }
            $imageUrl = $this->getImageUrl($request);
        }
        else{
            $imageUrl = $slider->image;
        }

        $slider->title          = $request->title;
        $slider->description    = $request->description;
        $slider->button         = $request->button;
        $slider->image          = $imageUrl;
        $slider->save();
        return redirect()->back()->with('message', 'Slider Updated Successfully!!');
    }

    public function delete($id){
        $slider = Slider::find($id);
        if(file_exists($slider->image)){
            unlink($slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('message', 'Slider Deleted Successfully!!');
    }






}
