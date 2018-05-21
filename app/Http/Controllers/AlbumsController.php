<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('photos')->get();
        return view('albums.index')->with('albums',$albums);
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $request){
         $this->validate($request,[
             'name' => 'required',
             'cover_img' => 'image|max:1999'
         ]);
         //Get file name with extension
         $filenameWithExt =  $request->file('cover_img')->getClientOriginalName();
         
         //get file name without extention
         $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

         //Get File extention
         $extension = $request->file('cover_img')->getClientOriginalExtension();

         //File Name to Store
         $filenameToStore = $filename.'_'.time().'.'.$extension;

         //Upload File
         $path = $request->file('cover_img')->storeAs('public/Album_covers',$filenameToStore);

         //create album
         $album = new Album;
         $album->name = $request->input('name');
         $album->description = $request->input('description');
         $album->cover_img = $filenameToStore;
         $album->save();

         return redirect('/albums')->with('success','Album Created Successfully');

         
    }
}
