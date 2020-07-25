@extends('layouts.masterfor')
@section('content')
<?php $parent = 0 ?>
<div class="row" style="margin-top: 20px;">

	<div class="content col-12 rounded-lg">
		<div class="card">
			<div class="card-header">
				Pertanyaan
			</div>
			<div class="card-body">
				<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Contoh">
					<rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Contoh</text>
				</svg>
				<blockquote class="blockquote mb-0">
					<h4><strong>{{$question->question}}</strong></h4>
					<footer class="blockquote-footer">Ditanyakan oleh {{$question->user->name}}, <small>{{$question->created_at->diffForHumans()}}</small></a></footer>
				</blockquote>
			</div>
			@if(Auth::check())
			@if(auth()->user()->id == $question->user_id)
			<!--edit forum-->
			<a class="btn btn-warning btn-sm float-right" style="margin-right: 5px" data-toggle="modal" data-target="#Modalforum">Edit</a>
			<!--delete forum-->
			<a href="{{ route('deletequestion', $question->id)}}" class="btn btn-danger btn-sm float-right"  onclick="return confirm('Yakin hapus?')">Hapus</a>

			<!-- Modal -->
			<div class="modal fade" id="Modalforum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-secondary">
							<h5 class="modal-titl text-white" id="ModalforumLabel">Edit Pertanyaan</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form class="form" method="post" action="{{ route('updatequestion') }}">
							<input type="hidden" name="id" value="{{ $question->id }}">
							<div class="modal-body">
								@csrf
								@method('PUT')
								<div class="form-group">
									<textarea class="form-control" name="question" placeholder="Deskripsi" required>{{$question->question}}</textarea>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-primary">Konfirmasi</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			@endif
			@endif
			<!-- </div> -->
			<div class="card-footer" style=" background-color:rgba(255, 255, 200, 0.7); border-radius: 10px; margin-top: 10px">
				<!--answer-->
				@foreach($question->answer as $kmn)
				@if($kmn->parent=='')
				<h5 class="text-justify"><strong>{{$kmn->user->name}}</strong>, <small>{{$kmn->created_at->diffForHumans()}}</small></h5>
				<p class="text-justify">{{ $kmn->answer }}</p>
				@if(Auth::check())
				<a href="javascript:void(0)" class="btn btn-primary float-left" style="margin-right: 5px" data-toggle="modal" data-target="#balaskomen{{$kmn->id}}">Balas</a>
				<!-- Modal -->
				<div class="modal fade" id="balaskomen{{$kmn->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-secondary">
								<h5 class="modal-titl text-white" id="exampleModalLabel">Membalas {{$kmn->user->name}}</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<form class="form" method="post" action="{{ route('storeanswer') }}">
								@csrf
								<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
								<input type="hidden" name="question_id" value="{{ $question->id }}">
								{{-- <input type="hidden" name="parent" value="{{$kmn->id}}"> --}}
								<textarea type="text" name="answer" class="form-control" placeholder="balas answer..." required></textarea>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>

						</div>
					</div>
				</div>
				@endif

				<!-- aksi answer (oleh pembuat answer) => edit/delete -->
				@if(Auth::check())
				@if( auth()->user()->id == $kmn->user_id )
				<a href=" {{ route('deleteanswer', $kmn->id) }} " class="btn btn-danger btn-sm float-left" style="margin-right: 5px">delete</a>
				<a class="btn btn-warning btn-sm float-left" style="margin-right: 5px" data-toggle="modal" data-target="#Modalanswer{{$kmn->id}}">edit</a>

				<div class="modal fade" id="Modalanswer{{$kmn->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-secondary">
								<h5 class="modal-titl text-white" id="ModalanswerLabel">Edit answer</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form class="form" method="post" action="{{ route('updateanswer') }}">
								@method('put')
								<input type="hidden" name="id" value="{{ $kmn->id }}">
								<div class="modal-body">
									@csrf
									<div class="form-group">
										<textarea class="form-control" name="answer" placeholder="Deskripsi" required>{{$kmn->answer}}</textarea>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				@endif
				@endif
				<br><br>


				@endif
				<br>
				@endforeach

				@if(Auth::check())
				<form class="form" method="post" action="{{ route('storeanswer') }}">
					@csrf
					<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
					<input type="hidden" name="question_id" value="{{ $question->id }}">
					<textarea type="text" name="answer" class="form-control" placeholder="answer..." style="background-color: rgba(255,255,255,0.4); resize: none;" required></textarea>
					<button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
				</form>
				@else
				<p class="alert alert-warning">Mohon <button class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#staticBackdroplogin">log in</button> untuk tambah jawaban</p>
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
										<label>Username</label>
										<input type="text" class="form-control" name="email" placeholder="username" required>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" name="password" placeholder="password" required>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Log In</button>
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




	@endsection
