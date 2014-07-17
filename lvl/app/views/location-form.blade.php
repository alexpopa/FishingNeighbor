@extends('master')

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
	<h1>New Location Form</h1>
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}
    
    {{ Form::open(array('url' => 'location')) }}
    
        <div class="form-group">
            {{ Form::select('country', array('' => 'Select a Country', 'United States' => 'United States')) }}
        </div>
    
        <div class="form-group">
            {{ Form::text('state', Input::old('state'), array('class' => 'form-control', 'placeholder' => 'State')) }}
        </div>
        
        <div class="form-group">
            {{ Form::text('city', Input::old('city'), array('class' => 'form-control', 'placeholder' => 'City')) }}
        </div>
        
        <div class="form-group">
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Name')) }}
        </div>
        
        <div class="form-group">
            {{ Form::textarea('directions', Input::old('directions'), array('class' => 'form-control', 'placeholder' => 'Directions')) }}
        </div>
    
        {{ Form::submit('Add new location!', array('class' => 'btn btn-primary')) }}
    
    {{ Form::close() }}
@stop