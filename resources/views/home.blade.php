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
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md text-white">
                    FORUM App
                </div>

                <!---->
                <div class="card mb-3" style="max-width: 450px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="wallpaper/undraw_shared_workspace_hwky.svg" class="card-img" >
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="card-title"><h4><strong>Git Project</strong></h4></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 450px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="wallpaper/undraw_web_developer_p3e5.svg" class="card-img" >
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="card-title"><h4><strong>Web Developing</strong></h4></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 450px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="wallpaper/undraw_code_review_l1q9.svg" class="card-img" >
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="card-title"><h4><strong>Laravel Framework</strong></h4></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection