<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id){
        return view('photos.create')->with('album_id',$album_id);
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'photo' => 'image|max:1999'
        ]);
        //Get file name with extension
        $filenameWithExt =  $request->file('photo')->getClientOriginalName();
        
        //get file name without extention
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        //Get File extention
        $extension = $request->file('photo')->getClientOriginalExtension();

        //File Name to Store
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        //Upload File
        $path[] = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'),$filenameToStore);

        //Upload Photo
        $photo = new Photo;
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;
        $photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success','Photo Uploaded Successfully');

        
   }


   
}
