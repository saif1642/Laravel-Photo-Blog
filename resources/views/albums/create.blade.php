@extends('layouts.app')

@section('content')
   <h2>Create Albums</h2>
        {!!Form::open(['action' =>'AlbumsController@store', 'method'=>'POST','enctype'=>'multipart/form-data'])!!}
            {{Form::text('name','', ['placeholder' => 'Enter Album Name'])}}
            {{Form::textarea('description','', ['placeholder' => 'Write Album Description'])}}
            {{Form::file('cover_img')}}
            {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}    
@endsection