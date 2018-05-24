@extends('layouts.app')

@section('content')
<h2>{{$album->name}}</h2>
<a href="/" class="button secondary">Go Back</a>
<a href="/photos/create/{{$album->id}}" class="button">Upload Photo To {{$album->name}} Album</a>
<hr>
@if(count($album->photos) > 0)
<div id="albums">
  <div class="row text-center">
    @foreach($album->photos as $photo)
       <div class='medium-4 columns'>
           <a href="/photos/{{$photo->id}}">
              <img height="400px" width="400px" class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
            </a>
           <br>
           <h4>{{$photo->title}}</h4>
       </div>
    @endforeach
  </div>
</div>
@else
<p>No Albums To Display</p>
@endif


@endsection