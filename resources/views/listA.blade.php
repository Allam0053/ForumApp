@extends('layouts.masterhome')

@section('buttonprofil')
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdropprofil" style="margin-right: 10px">profil</button>
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
                
                <div style="min-width: 80%; max-width: 100% ;margin: 2em auto 2em auto" class="text-white"><h2><strong>Jawaban Saya</strong></h2></div>
                <div class="row">
                    @foreach( $answers as $ans)
                    <div class="card mb-3" style="max-width: 350px; margin-right: 10px">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="wallpaper/undraw_code_review_l1q9.svg" class="card-img" >
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="card-title"><h4><strong><a href="{{ route('view', $ans->question->id) }}" class="text-body">{{ substr($ans->answer,0,15) }}</a></strong></h4></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$answers->links()}}

            </div>
        </div>
@endsection