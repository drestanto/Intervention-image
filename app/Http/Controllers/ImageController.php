<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use Validator;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
            return "Wrong Input for Width and Height!!!<br>Width and Height must be positive numbers";
        }

        $path = $request->path;
        $img = Image::make(Storage::disk('public')->get($path));
        $img->resize($width,$height);
        $newPath = "public/thumbnail/" . substr($path,7);
        Storage::put($newPath, (string) $img->encode());
        return "Resize success";

    }

    public function resizeImage2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required',
            'width' => 'numeric|min:1',
            'height' => 'numeric|min:1',
        ]);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $file = $request->file('image');
        $width = (int) $request->width;
        $height = (int) $request->height;

        $filename  = $request->title . '.' . $file->getClientOriginalExtension();
        $path = 'public/new/' . $filename;
        $img = Image::make($file->getRealPath())->fit($width, $height);
        Storage::put($path, (string) $img->encode());


        return "Resize success!!<br>Check it out on your folder";
    }

}
