@extends('layouts.masterhome')

@section('buttonprofil')
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdropprofil" style="margin-right: 10px">Profil</button>
@endsection

@section('content')
        <!--notifikasi-->
        @if(session('sukses'))
        <div class="toast fixed-top" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" style="margin: 0 auto 0 auto;">
          <div class="toast-header">
            <strong class="mr-auto">Data Notifikasi</strong>
            <small class="text-muted">Baru saja</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
            {{session('sukses')}}
          </div>
        </div>
        @endif

        <!--todo app-->
        <div class="flex-center position-ref">
            <div class="content">
                <div class="title m-b-md text-white">
                    FORUM App
                </div>
                <!---->
            
                <div class="row">
                    <div class="card mb-3 flex-center" style="max-width: 350px; margin: auto 5px auto auto">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="wallpaper/undraw_pair_programming_njlp.svg" class="card-img" >
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="card-title"><h4><strong><a href="{{ route('listQ') }}">Pertanyaan Saya</a></strong></h4></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 flex-center" style="max-width: 350px; margin: auto auto auto 5px">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="wallpaper/undraw_pair_programming_njlp.svg" class="card-img" >
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="card-title"><h4><strong><a href="{{ route('listA') }}">Jawaban Saya</a></strong></h4></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection