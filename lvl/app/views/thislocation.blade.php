@extends('master')

@section('css')
	
@stop

@section('navbar')
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/location">Fishing Neighbor</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   	  <ul class="nav navbar-nav navbar-left">
        <li><a href="/newLocation">Add New Location</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/logout">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
@stop

@section('content')
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

	<h1>{{ $thislocation->name }}</h1>
    <p>{{ $thislocation->directions }}</p>
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'thislocation')) }}
    
   	    <div class="form-group">
            {{ Form::textarea('content', Input::old('content'), array('class' => 'form-control', 'placeholder' => 'Comment')) }}
            {{ Form::hidden('name', $thislocation->name) }}
            {{ Form::hidden('user_id', $data['id']) }}
            {{ Form::hidden('location_id', $thislocation->id) }}
    	</div>
        
    {{ Form::submit('Submit Comment', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}

@foreach($thislocation->comments as $comment)
    <img src="{{ $data['photo']}}"><h2>{{ $data['name']}}</h2>
    <p>{{$comment->content}}</p>
@endforeach
@stop