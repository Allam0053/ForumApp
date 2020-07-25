<!-- penting tolong tambahkan 	route login pada line 99 route addquestion line 67-->

@extends('layouts.masterfor')


@section('buttonprofil')
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdropprofil" style="margin-right: 10px">Profil</button>
@endsection

@section('buttonlogin')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdroplogin">Log in</button>
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

@if(session('gagal'))
    <div class="toast fixed-top" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" style="margin: 0 auto 0 auto;">
        <div class="toast-header">
            <strong class="mr-auto">log in notifikasi</strong>
            <small class="text-muted">Baru saja</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{session('gagal')}}
        </div>
    </div>
@endif


<div class="row" style="margin-top: 30px">
	<div class="content col-12">
		<button class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModalforum">Apa pertanyaan anda? <strong></strong></button>
		<div class="float-right">{{$questions->links()}}</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModalforum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ajukan Pertanyaan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@if(Auth::check())
				<form class="form" method="post" action="{{ route('storequestion') }}">
					<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
					<input type="hidden" name="slug" value="0">
					<div class="modal-body">
						@csrf
						<div class="form-group">
							<!-- <label for="question">Pertanyaan:</label> -->
							<textarea name="question" required class="q-text-area text_area_base qu-fontSize--large qu-lineHeight--regular" rows="1" placeholder="Awali pertanyaan Anda dengan &quot;Apa&quot;, &quot;Bagaimana&quot;, &quot;Mengapa&quot;, dll." autocomplete="chrome-off" style="box-sizing: border-box; direction: ltr; width: 100%; box-shadow: none; background-color: transparent; padding: 0px; outline: none; border: none; flex: 1 1 0%; min-height: 26px; overflow: hidden; overflow-wrap: break-word; height: 75px; resize: none;"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Ajukan pertanyaan</button>
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
								<form class="form" method="post" action="{{ route('login') }}">
									@csrf
									<div class="form-group">
										<label>username</label>
										<input type="text" class="form-control" name="email" placeholder="username" required>
									</div>
									<div class="form-group">
										<label>password</label>
										<input type="password" class="form-control" name="password" placeholder="password" required>
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

<div class="row">
	@foreach($questions as $frm)
	<div class="col-sm-4" style="margin-top: 15px;">
		<div class="card">
			<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
				<rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Contoh</text>
			</svg>
			<div class="card-body">
				<h5 class="card-text"><strong>{{substr($frm->question, 0, 20)}}<?php if (substr($frm->question, 0, 20) != $frm->question) echo "..."; ?></strong></h5>
				<p class="card-text">{{$frm->user->name}}</p>
				<div class="d-flex justify-content-between align-items-center">
					<div class="btn-group">
						<a class="btn btn-sm btn-outline-secondary" href="{{route('view',$frm->id)}}">View</a>
					</div>
					<small class="text-muted">{{$frm->created_at->diffForHumans()}}</small><?php if ($frm->created_at != $frm->updated_at) echo ", <small>diedit " . $frm->updated_at->diffForHumans() . "</small>"; ?>
				</div>
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
				<td><a href="{{ route('view', $ans->question->id) }}">{{$ans->question_id}}</a></td>
				<td>{{substr($ans->answer,0,20)}}</td>
			</tr>
			@endforeach

		</table>
	</div>
</div>
@endif
@endsection
