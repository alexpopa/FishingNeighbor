@extends('master')

@section('content')
    
    @if(Session::has('message'))
        {{ Session::get('message')}}
    @endif
    @if (!empty($data))
        Hello, {{{ $data['name'] }}} 
        <img src="{{ $data['photo']}}">
        <br>
        Your email is {{ $data['email']}}
        <br>
        <a href="logout">Logout</a>
    @else
        Hi! Would you like to <a href="login/fb">Login with Facebook</a>?
    @endif

@stop