<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{

    public function getImageUrl($request){
        $image = $request->file('image');

        $codeGen = hexdec(uniqid());
        $imageName = $image->getclientOriginalName();
        $imageFullName = $codeGen.'_'.$imageName;
        $directory = 'images/portfolio/';
//        Image::make($image)->resize(1920,1088)->save($directory.$imageFullName);
        $image->move($directory, $imageFullName);
        return $directory.$imageFullName;

    }



    public function index(){
        return view('admin.portfolio.add');
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'category'      => 'required|max:20',
            'title'         => 'required|max:60',
            'image'         => 'required',
        ],
            [
                'category.required'  => 'Portfolio Category is Required',
                'category.max'       => 'Portfolio Category should not more than 20 characters',
                'title.required'     => 'Portfolio Title is Required',
                'title.max'          => 'Portfolio Title should not more than 60 characters',
                'image.required'     => 'Portfolio Image is Required',
            ]);



        $portfolio = new Portfolio();
        $portfolio->category          = $request->category;
        $portfolio->title          = $request->title;
        $portfolio->image          = $this->getImageUrl($request);
        $portfolio->save();
        return redirect()->back()->with('message', 'Portfolio Created Successfully!!');
    }

    public function manage(){
        $portfolios = Portfolio::latest()->paginate(3);

        return view('admin.portfolio.manage', compact('portfolios'));
    }

    public function edit($id){
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'category'      => 'required|max:20',
            'title'         => 'required|max:60',
        ],
            [
                'category.required'  => 'Portfolio Category is Required',
                'category.max'       => 'Portfolio Category should not more than 20 characters',
                'title.required'     => 'Portfolio Title is Required',
                'title.max'          => 'Portfolio Title should not more than 60 characters',
            ]);

        $portfolio = Portfolio::find($id);

        if($request->file('image')){
            if(file_exists($portfolio->image)){
                unlink($portfolio->image);
            }
            $imageUrl = $this->getImageUrl($request);
        }
        else{
            $imageUrl = $portfolio->image;
        }
        $portfolio->category          = $request->category;
        $portfolio->title          = $request->title;
        $portfolio->image          = $imageUrl;
        $portfolio->save();
        return redirect()->back()->with('message', 'Portfolio Updated Successfully!!');


    }

    public function delete($id){
        $portfolio = Portfolio::find($id);
        if(file_exists($portfolio->image)){
            unlink($portfolio->image);
        }
        $portfolio->delete();
        return redirect()->back()->with('message', 'Slider Deleted Successfully!!');
    }















}
