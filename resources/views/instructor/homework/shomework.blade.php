<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ trans('homework_trans.Homework_Solutions') }} - {{trans('main_trans.Main_Title')}}</title>
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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">
                            {{ trans('homework_trans.Homework_Solutions') }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}"
                                    class="default-color">{{ trans('homework_trans.Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ trans('homework_trans.Homework_Solutions') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($errors->any())
                    <div class="error">{{ $errors->first('Name') }}</div>
                @endif
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="10" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('homework_trans.Homework') }} </th>
                                            <th>{{ trans('homework_trans.Student') }}</th>
                                            <th>{{ trans('homework_trans.Solution_File') }}</th>
                                            <th>{{ trans('homework_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($solutions as $homework)
                                            @if ($homework->inst_id == Auth::guard('instructor')->user()->id)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $homework->Homework->name }}</td>
                                                    <td>{{ $homework->Student->name }}</td>
                                                    <td>{{ $homework->hs_file }}</td>
                                                    <td>
                                                        <a href="{{ route('download.sshomework', $homework->hs_file) }}"
                                                            title="{{ trans('homework_trans.Download') }}" class="btn btn-warning btn-sm"
                                                            role="button" aria-pressed="true"><i
                                                                class="ti-download"></i></a>

                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--================================footer -->
            @include('instructor.body.footer')
        </div><!-- main content wrapper end-->
    </div>
    <!--=================================footer -->
    @include('instructor.body.footer-scripts')
</body>

</html>
