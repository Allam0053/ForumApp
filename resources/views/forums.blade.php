<!-- penting tolong tambahkan 	route login pada line 99 route addquestion line 67-->

@extends('layouts.masterfor')


@section('buttonprofil')
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdropprofil" style="margin-right: 10px">profil</button>
@endsection

@section('buttonlogin')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdroplogin">log in</button>
@endsection

@section('content')
	
		<!--notifikasi-->
	    @if(session('sukses'))
	    <div class="toast fixed-top" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" style="margin: 0 auto 0 auto;">
	      <div class="toast-header">
	        <strong class="mr-auto">Forum Notifikasi</strong>
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
	

	    <!--notifikasi-->
	    @if(session('no_result'))
	    <div class="toast fixed-top" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" style="margin: 0 auto 0 auto;">
	      <div class="toast-header">
	        <strong class="mr-auto">Forum Notifikasi</strong>
	        <small class="text-muted">Baru saja</small>
	        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="toast-body">
	        {{session('no_result')}}
	      </div>
	    </div>
    	@endif


	<div class="row" style="margin-top: 30px">
		<div class="content col-12">
			<button class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModalforum">Tambah Forum <strong>+</strong></button>
			<div class="float-right">{{$questions->links()}}</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="exampleModalforum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bg-secondary">
		        <h5 class="modal-titl text-white" id="exampleModalLabel">Forum +</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      @if(Auth::check())
		      <form class="form" method="post" action="#">
		      	<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
		      	<input type="hidden" name="slug" value="0">
		      	<div class="modal-body">
					@csrf
					<div class="form-group">
						<label>Judul</label>
						<input type="text" class="form-control" name="judul" placeholder="judul">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" name="konten" placeholder="Deskripsi"></textarea>
					</div>
		    	</div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save changes</button>
			    </div>
			  </form>
			  @else
			  	<p class="alert alert-warning">mohon <button class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#staticBackdroplogin">log in</button> untuk tambah forum</p>
			  	<!-- Modal login -->
                <div class="modal fade" id="staticBackdroplogin" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Login Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!--login-->
                        <form class="form" method="post" action="">
                            @csrf
                            <div class="form-group">
                                <label>username</label>
                                <input type="text" class="form-control" name="email" placeholder="username">
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">log in</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
			  @endif
		    </div>
		  </div>
		</div>

		
	</div>

	
	<div class="row" style="margin-top: 30px">
		@foreach($questions as $frm)
		<div class="content col-4" style="margin-top: 30px;">
			<div class="card" style=" background-color:rgba(255, 255, 200, 0.7); border-radius: 10px">
				<div class="card-title" style="margin-top: 10px;">
					<p><small>{{$frm->created_at->diffForHumans()}}</small><?php if($frm->created_at!=$frm->updated_at) echo", <small>diedit ".$frm->updated_at->diffForHumans()."</small>";?></p>
				</div>
					<div class="card-body">
						<h3><small>oleh {{$frm->user->name}}</small></h3>
						<p>{{substr($frm->question, 0, 20)}}<?php if(substr($frm->question, 0, 20)!=$frm->question)echo"...";?></p>
					</div>			
			</div>
		</div>
		@endforeach
	</div>
	<br>

	@if(session('ketemu'))
	<div class="row">
		<div class="content col-4">
			<table class="table card" style=" background-color:rgba(255, 255, 200, 0.7); border-radius: 10px">
				<tr>
					<th scope="col">id pertanyaan</th>
					<th scope="col">balasan terkait</th>
				</tr>
				
					@foreach($answers as $ans)
							<tr>
								<td><a href="#">{{$ans->forum_id}}</a></td>
								<td>{{substr($ans->answer,0,20)}}</td>
							</tr>
					@endforeach
				
			</table>
		</div>
	</div>
	@endif
@endsection


