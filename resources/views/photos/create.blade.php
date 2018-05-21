@extends('layouts.app')

@section('content')
   <h2>Upload Photos</h2>
        {!!Form::open(['action' =>'PhotosController@store', 'method'=>'POST','enctype'=>'multipart/form-data'])!!}
            {{Form::text('title','', ['placeholder' => 'Enter title'])}}
            {{Form::textarea('description','', ['placeholder' => 'Write photo Description'])}}
            {{Form::hidden('album_id',$album_id)}}
            {{Form::file('photo')}}
            {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}    
@endsection