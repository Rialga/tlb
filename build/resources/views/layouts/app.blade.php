<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tiga Laskar Beton |  {{ $title }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo3.png') }}"/>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2-mod.css')}}">

    @yield('css')

    <style>
      /* Center the loader */
      #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        border-bottom: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
      }

      @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
      }

      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }

      /* Add animation to "page content" */
      .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
      }

      @-webkit-keyframes animatebottom {
        from { bottom:-100px; opacity:0 }
        to { bottom:0px; opacity:1 }
      }

      @keyframes animatebottom {
        from{ bottom:-100px; opacity:0 }
        to{ bottom:0; opacity:1 }
      }

      #myDiv {
        display: none;
      }
      </style>
</head>

<body class="skin-blue sidebar-mini" onload="myFunction()" style="margin:0;" lang="id">
<div id="loader"></div>
<div id="myDiv" class="animate-bottom">
  @if (!Auth::guest())
      <div class="wrapper">
          <!-- Main Header -->
          <header class="main-header">

              <!-- Logo -->
              <a href="{{ url('/') }}" class="logo">
                <span class="logo-mini"><img src="{{ asset('assets/images/logo-2.png')}}" height="46px" width="44px"></span>
                <span class="logo-lg"><img src="{{ asset('assets/images/new-header.png')}}" align="middle" style="margin-left: -20px; width:200px; height: 40px; "></span>
              </a>

              <!-- Header Navbar -->
              <nav class="navbar navbar-static-top" role="navigation">
                  <!-- Sidebar toggle button-->
                  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                      <span class="sr-only">Toggle navigation</span>
                  </a>
                  <!-- Navbar Right Menu -->
                  <div class="navbar-custom-menu">
                      <ul class="nav navbar-nav">

                          {{--Pesan UwU--}}
                          <li class="dropdown messages-menu">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="fa fa-bell-o"></i>

                                  @if ($stnk->count() + $pajak->count() +$sim->count() == 0)
                                      <span class="label label-danger"></span>
                                  @else
                                  <span class="label label-danger">{{  $stnk->count() + $pajak->count() +$sim->count() }}</span>
                                  @endif
                              </a>
                              <ul class="dropdown-menu">


                                  @if ($stnk->count() + $pajak->count() +$sim->count() == 0)
                                      <li class="header">Anda tidak memiliki notifikasi saat ini</li>
                                      <li>
                                          <ul class="menu">
                                              <li>
                                                  <a style="text-align: center"> tidak ada notifikasi </a>
                                              </li>
                                          </ul>
                                      </li>
                                  @else
                                  <li class="header">Anda memiliki {{  $stnk->count() + $pajak->count() +$sim->count() }} notifikasi</li>
                                  <li>
                                      <!-- inner menu: contains the actual data -->
                                      <ul class="menu">
                                          @foreach($pajak as $datapajak)

                                          <li class="datapajak">
                                              <input type="hidden" id="titlepajak" value="Pajak">
                                              <input type="hidden" id="textpajak" value="Sehubungan dengan akan berakhir dan jatuh tempo kendaraan perusahaan :">
                                              <input type="hidden" id="nopol" value="{{$datapajak->no_polisi}}">
                                              <input type="hidden" id="jenis" value="{{$datapajak->jenis_kendaraan}}">
                                              <input type="hidden" id="tglpajak" value="{{Carbon\Carbon::parse($datapajak->masa_pajak)->format('d M Y')}}">
                                              <a href="#" class="pajak">
                                                  <i class="fa fa-warning text-yellow"></i>  <small style="color: red">Perpanjangan Pajak {{ $datapajak->no_polisi }} </small>
                                              </a>
                                          </li>
                                          @endforeach

                                          @foreach($stnk as $datastnk)
                                          <li class="datastnk">
                                              <input type="hidden" id="titlestnk" value="STNK">
                                              <input type="hidden" id="textstnk" value="Sehubungan akan berakhirnya masa berlaku STNK  kendaraan perusahaan dengan :">
                                              <input type="hidden" id="stnknopol" value="{{$datastnk->no_polisi}}">
                                              <input type="hidden" id="stnkjenis" value="{{$datastnk->jenis_kendaraan}}">
                                              <input type="hidden" id="stnktgl" value="{{Carbon\Carbon::parse($datastnk->masa_pajak)->format('d M Y')}}">
                                              <a href="#" class="stnk">
                                                  <i class="fa fa-warning text-yellow"></i>  <small style="color: red">Perpanjangan STNK {{ $datastnk->no_polisi }} </small>
                                              </a>
                                          </li>
                                          @endforeach

                                        @foreach($sim as $datasim)
                                          <li class="datasim">

                                              <input type="hidden" id="supirnama" value="{{$datasim->nama_supir}}">
                                              <input type="hidden" id="simtgl" value="{{Carbon\Carbon::parse($datasim->expired_sim)->format('d M Y')}}">
                                              <a href="#" class="sim">
                                                  <i class="fa fa-warning text-yellow"></i>  <small style="color: red">Perpanjangan SIM {{ $datasim->no_supir }} </small>
                                              </a>
                                          </li>
                                        @endforeach
                                      </ul>
                                  </li>
                                  @endif
                              </ul>
                          </li>


                          <!-- User Account Menu -->
                          <li class="dropdown user user-menu">
                              <!-- Menu Toggle Button -->
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <!-- The user image in the navbar-->
                                  <img src="{{ asset('assets/images/user.png')}}"
                                       class="user-image" alt="User Image"/>
                                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                  <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                              </a>
                              <ul class="dropdown-menu">
                                  <!-- The user image in the menu -->
                                  <li class="user-header">
                                      <img src="{{ asset('assets/images/user.png')}}"
                                           class="img-circle" alt="User Image"/>
                                      <p>
                                          {!! Auth::user()->name !!}
                                          <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                      </p>
                                  </li>
                                  <!-- Menu Footer-->
                                  <li class="user-footer">
                                      <div class="pull-left">
                                          <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#profile">Profile</button>
                                      </div>
                                      <div class="pull-right">
                                          <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                              Sign out
                                          </a>
                                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
                                      </div>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </nav>

          </header>

          <!-- Left side column. contains the logo and sidebar -->
          @include('layouts.sidebar')
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
              @yield('content')
          </div>

          <!-- Main Footer -->
          <footer class="main-footer" style="max-height: 100px;text-align: center">
              <strong>Copyright © {{ date('Y')}} <a href="{{ url('/') }}">PT Tiga Laskar Beton</a>.</strong> All rights reserved. - <strong>Versi {{ config('app.version') }}</strong>
          </footer>

      </div>
  @else
      <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
              <div class="navbar-header">

                  <!-- Collapsed Hamburger -->
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                          data-target="#app-navbar-collapse">
                      <span class="sr-only">Toggle Navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>

                  <!-- Branding Image -->
                  <a class="navbar-brand" href="{!! url('/') !!}">
                      {{ config('app.name')}}
                  </a>
              </div>

              <div class="collapse navbar-collapse" id="app-navbar-collapse">
                  <!-- Left Side Of Navbar -->
                  <ul class="nav navbar-nav">
                      <li><a href="{!! url('/') !!}">Home</a></li>
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="nav navbar-nav navbar-right">
                      <!-- Authentication Links -->
                      <li><a href="{!! url('/login') !!}">Login</a></li>
                  </ul>
              </div>
          </div>
      </nav>

      <div id="page-content-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      @yield('content')
                  </div>
              </div>
          </div>
      </div>
      @endif

    </div>


    <!-- Modal Message-->
    <div class="modal fade" id="modal-kendaraan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Notifikasi Perpanjangan <a id="title"></a></h4>
                </div>
                <div class="modal-body">
                    <p id="text"></p>
                        <table>
                            <tr>
                                <td>Nomor Polisi</td>
                                <td> &nbsp;&nbsp;: </td>
                                <td> &nbsp;<a id="no_pol"></a></td>
                            </tr>
                            <tr>
                                <td>Jenis Kendaraan</td>
                                <td> &nbsp; : </td>
                                <td>&nbsp;<a id="jenis_kendaraan"></a></td>
                            </tr>
                            <tr>
                                <td>Jatuh Tempo</td>
                                <td> &nbsp; : </td>
                                <td>&nbsp;<a id="tgl"></a></td>
                            </tr>

                        </table>
                        <br>
                        <p>Agar segera dilakukan pembayaran dan melaporkan kembali ke bagian
                            administrasi perusahaan untuk dilakukan update status</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-supir">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Notifikasi Perpanjangan SIM</h4>
                </div>
                <div class="modal-body">

                    <p>
                        Sehubungan dengan akan berakhirnya masa berlaku SIM atas nama <strong id="nama"></strong>
                        dengan masa berlaku SIM hingga <strong id="expsim"></strong>, agar segera diinfokan ke pribadi
                        tersebut untuk segera  melakukan perpanjangan SIM dan melaporkan kembali ke bagian
                        administrasi perusahaan setelah melakukan perpanjangan
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- Modal -->
    <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Profil Anda</h3>
          </div>

          <div class="modal-body">

                      @php
                        $mine = Auth::user();
                      @endphp
                          <table class="table">
                            <tr>
                              <th>Nama</th>
                              <td> : {{ $mine->name }}</td>
                            </tr>
                            <tr>
                              <th>Email</th>
                              <td> : {{ $mine->email }}</td>
                            </tr>
                            <tr>
                              <th>Jabatan</th>
                              <td> : {{ $mine->jabatan->nama_jabatan }}</td>
                            </tr>
                          </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning pull-left" data-toggle="modal" data-target="#ganpas">Ganti Password</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ganpas" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Ganti Password</h3>
          </div>

          <div class="modal-body">
            {!! Form::open(['route' => 'ganti_password'])!!}

            <div class="form-group col-sm-12">
                {!! Form::label('password', 'Password Baru') !!}
                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password'])!!}
            </div>

            <div class="form-group col-sm-12">
                {!! Form::label('password_confirmation', 'Konfirmasi Password Baru') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'confirm_password'])!!}
            </div>
            <div class="form-group col-sm-12">
              <span id='message'></span>
              <div class="clearfix">

              </div>
              <span>* Pastikan panjang password minimal 6 karakter</span>
            </div>

            <div class="form-group col-sm-12">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary', 'id' => 'simpan']) !!}
            </div>
            {!! Form::close() !!}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

      <!-- jQuery 3.1.1 -->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <!-- AdminLTE App -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/js/adminlte.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
      <script type="text/javascript" src="{{ asset('assets/js/moment-with-locales.min.js')}}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.min.js')}}">
      </script>
      <script>

        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 700);
        }

        function showPage() {
          document.getElementById("loader").style.display = "none";
          document.getElementById("myDiv").style.display = "block";
        }

        let jQuery = $(document).ready(function(){
          $('select').select2();

          $(function () {
              $('.datetimepicker').datetimepicker({
                // locale : 'id'
                format: "YYYY-MM-DD HH:mm:ss"
              });
          });


          $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
              $('#message').html('Cocok').css('color', 'green');
              if ($('#password').val().length >= 6) {
                $('#simpan').removeAttr("disabled");
              }
            } else{
              $('#message').html('Tidak Cocok').css('color', 'red');
              $('#simpan').attr("disabled", "disabled");
            }
	  });
	});



        $('.pajak').on('click', function (event) {
            event.preventDefault();

            var judul = $(this).parents('.datapajak').find('#titlepajak').val();
            var text = $(this).parents('.datapajak').find('#textpajak').val();
            var nopol = $(this).parents('.datapajak').find('#nopol').val();
            var jenis = $(this).parents('.datapajak').find('#jenis').val();
            var expajak = $(this).parents('.datapajak').find('#tglpajak').val();


            $('#title').text(judul);
            $('#text').text(text);
            $('#no_pol').text(nopol);
            $('#jenis_kendaraan').text(jenis);
            $('#tgl').text(expajak);

            $('#modal-kendaraan').modal('show');
        });

        $('.stnk').on('click', function (event) {
            event.preventDefault();

            var judul = $(this).parents('.datastnk').find('#titlestnk').val();
            var text = $(this).parents('.datastnk').find('#textstnk').val();
            var nopol = $(this).parents('.datastnk').find('#nopol').val();
            var jenis = $(this).parents('.datastnk').find('#stnkjenis').val();
            var expstnk = $(this).parents('.datastnk').find('#stnktgl').val();


            $('#title').text(judul);
            $('#text').text(text);
            $('#no_pol').text(nopol);
            $('#jenis_kendaraan').text(jenis);
            $('#tgl').text(expstnk);

            $('#modal-kendaraan').modal('show');
        });


        $('.sim').on('click', function (event) {
            event.preventDefault();

            var namasupir = $(this).parents('.datasim').find('#supirnama').val();
            var expsim = $(this).parents('.datasim').find('#simtgl').val();

            $('#nama').text(namasupir);
            $('#expsim').text(expsim);

            $('#modal-supir').modal('show');
        });


        </script>
      @yield('scripts')
  </body>
</html>
