@extends('layouts.masterwelcome')

@if( !Auth::check() )
@section('buttonlogin')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdroplogin">log in</button>
@endsection
@endif

@section('buttonsignup')
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdropsignup">sign up</button>
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        

        <div class="content">
            <div class="title text-light m-b-md">
                Tugas 4 Software House
            </div>
            <a class="btn btn-primary btn-lg" href="{{ route('forum') }}">FORUM diskusi</a>
        </div>
    </div>
@endsection