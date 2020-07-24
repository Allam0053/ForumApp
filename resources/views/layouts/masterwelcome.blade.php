<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
                background-repeat: no-repeat; 
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <!--navbar atas-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
          <a class="navbar-brand" href="{{ route('dashboard') }}">Tugas 4</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <!--<li class="nav-item active">
                <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
              </li>-->
              <!--<li class="nav-item active">
                <a class="nav-link" href="{{ route('forum') }}">Forum <span class="sr-only">(current)</span></a>
              </li>-->
              <li class="nav-item active" style="margin-right: 5px">
                <!-- Button trigger modal -->
                @yield('buttonlogin')
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
              </li>
              <li class="nav-item action" style="margin-left: 5px">
              @yield('buttonsignup')
                <div class="modal fade" id="staticBackdropsignup" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Sign Up</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!--sign up-->
                        <form class="form" method="post" action="{{ route('signup') }}">
                            @csrf
                            <div class="form-group">
                                <label>username</label>
                                <input type="text" class="form-control" name="email" placeholder="username/email">
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <div class="form-group">
                                <label>nama</label>
                                <input type="text" class="form-control" name="name" placeholder="nama">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">sign up</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
            <!--search-->
            <!--
            <form class="form-inline my-2 my-lg-0" action="{{ route('search_f') }}" method="get">
              @csrf
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn btn-outline-light btn-dark my-2 my-sm-0" type="submit">Search</button>
            </form>
            -->
          </div>
        </nav>
        <div class="container">
        @yield('content')
        </div>
    </body>

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".toast").toast("show")
    })
</script>


</html>