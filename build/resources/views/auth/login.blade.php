<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Fauzi PadLaw (efzet)">
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tiga Laskar Beton | Login</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo3.png') }}"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/my-login.css')}}">
</head>

<body class="my-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="brand">
                            <img src="{{ asset('assets/images/TLB_PNG.png')}}" alt="logo">
                        </div>
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Login</h4>
                                <form method="POST" class="my-login-validation" novalidate="" action="{{ url('/login') }}">
                                        {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label for="email">E-Mail Address</label>
                                        <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                        <div class="invalid-feedback">
                                            Email is invalid
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <font color="red">{{ $errors->first('email') }}</font>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password
                                        </label>
                                        <input id="password" type="password" class="form-control" name="password" required data-eye>
                                        <div class="invalid-feedback">
                                            Password is required
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <font color="red">{{ $errors->first('password') }}</font>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                            <label for="remember" class="custom-control-label">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="form-group m-0">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="footer">
                        <p>
                            <i>
                                    Dalam upaya mencegah hal-hal yang tidak diinginkan, kami<b> PT Tiga Laskar
                                    Beton </b> bersama ini kami himbau dan sampaikan bahwa seluruh informasi terkait
                                    transaksi jual beli hanya dilakukan melalui surat resmi atau langsung datang
                                    ke kantor pemasaran.
                            </i>
                        </p>

                        <p>
                            <i>
                                    Apabila terdapat pernyataan untuk melakukan transfer ke rekening bank tertentu
                                    <strong>bukan atas nama perusahan Tiga Laskar Beton</strong> agar terlebih dahulu dapat mengkonfirmasi
                                    ke Bagian Administrasi perusahaan di nomor telepon (0751) - 73518 atau dapat mengunjungi
                                    kami ke kantor pemasaran <br>
                                    Jl. Raya Indarung KM.10 Kel. Bandar Buat Kec. Lubuk Kilangan
                                    Padang – Sumatera Barat.
                            </i>
                        </p>


                        Copyright &copy; {{ date('Y') }} &mdash; PT Tiga Laskar Beton
                    </div>
                </div>

            </div>
        </section>


        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/js/my-login.js')}}"></script>
    </body>
</html>
