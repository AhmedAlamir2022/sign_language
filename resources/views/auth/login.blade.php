<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Student Login - Website Learning Sign Language</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/icon.jpg') }}" />
    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
    <!-- css -->
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>
    <div class="wrapper">
        <!--=================================preloader -->
        <div id="pre-loader"><img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt=""></div>

        <!--=================================login-->
        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            style="background-image: url('{{ asset('assets/images/sativa.png') }}');">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">
                    <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                        style="background-image: url('{{ asset('assets/images/nguyen-khanh-ly-liiusuaISP0-unsplash.jpg') }}');">
                        <div class="login-fancy">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">Student Login</h3>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">Email Address *</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="Password">Password * </label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="section-field">
                                    <div class="remember-checkbox mb-30">
                                        <input type="checkbox" class="form-control" name="two" id="two" />
                                        <label for="two"> Remmember Me</label>
                                    </div>
                                </div>
                                <button class="button"><span>Login</span><i class="fa fa-check"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- jquery -->
    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';
    </script>
    <!-- chart -->
    <script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
    <!-- calendar -->
    <script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
    <!-- charts sparkline -->
    <script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
    <!-- charts morris -->
    <script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
    <!-- sweetalert2 -->
    <script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
    <!-- toastr -->
    @yield('js')
    <script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
    <!-- validation -->
    <script src="{{ URL::asset('assets/js/validation.js') }}"></script>
    <!-- lobilist -->
    <script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
    <!-- custom -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
</body>

</html>
