@extends('layouts.app')

@section('content')
  @if(count($albums) > 0)
    <?php
      $colcount = count($albums);
  	  $i = 1;
    ?>
    <div id="albums">
      <div class="row text-center">
        @foreach($albums as $album)
           <div class='medium-4 columns'>
               <a href="/albums/{{$album->id}}">
                  <img height="400px" width="400px" class="thumbnail" src="storage/Album_covers/{{$album->cover_img}}" alt="{{$album->name}}">
                </a>
               <br>
               <h4>{{$album->name}}</h4>
           </div>
        @endforeach
      </div>
    </div>
  @else
    <p>No Albums To Display</p>
  @endif

@endsection
