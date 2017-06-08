<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use Validator;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }
        $title = $request->title;
        $ext = $request->file('image')->extension();
        $path = "images/" . $request->title . "." . $ext;
        Storage::putFileAs('public',$request->file('image'), $path);
        
        return view('resizeImage',compact('title','path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImage(Request $request)
    {
	    //Asumsi berhasil
        $width = (int) $request->width;
        $height = (int) $request->height;

        if (($width <= 0) or ($height <= 0)) {
            Storage::delete($request->path);
            return "Wrong Input for Width and Height";
        } return "YEAY";

    }
}
