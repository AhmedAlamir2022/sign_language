<!DOCTYPE html>
<html lang="en">
@section('title') {{trans('passwords.title')}} - {{trans('main_trans.Main_Title')}} @stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('instructor.body.head')
</head>
<body style="font-family: 'Cairo', sans-serif">
<div class="wrapper">
    @include('instructor.body.main-header')
    @include('instructor.body.main-sidebar')
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">{{trans('passwords.title')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}" class="default-color">{{trans('passwords.Dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('passwords.title')}}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="col-xs-12">
                            <div class="col-md-12"><br>
                                <form action="{{ route('instructor.update.password') }}" method="post" autocomplete="off">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('passwords.Current_Password')}}</label>
                                            <input type="password" name="oldpassword" class="form-control" required>
                                        </div>
                                    </div><br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('passwords.New_Password')}}</label>
                                            <input type="password" name="newpassword" class="form-control" required>
                                        </div>
                                    </div><br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('passwords.Confirm_Password')}}</label>
                                            <input type="password" name="confirm_password" class="form-control" required>
                                        </div>
                                    </div><br><hr>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('passwords.title')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=================================footer -->
        @include('instructor.body.footer')
    </div><!-- main content wrapper end-->
</div>
<!--=================================footer -->
@include('instructor.body.footer-scripts')
</body>
</html>
