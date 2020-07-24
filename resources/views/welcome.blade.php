@extends('layouts.masterwelcome')

@section('buttonlogin')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdroplogin">log in</button>
@endsection
@section('buttonsignup')
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdropsignup">sign up</button>
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        

        <div class="content">
            <div class="title m-b-md">
                Tugas 4 Software House
            </div>

        </div>
    </div>
@endsection