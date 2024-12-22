<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{trans('homework_trans.Homework_List')}} - {{trans('main_trans.Main_Title')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('student.body.head')
</head>

<body style="font-family: 'Cairo', sans-serif">
    <div class="wrapper">
        @include('student.body.main-header')
        @include('student.body.main-sidebar')
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">{{trans('homework_trans.Homework_List')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                    class="default-color">{{trans('homework_trans.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('homework_trans.Homework_List')}}</li>
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
                                            <th>{{trans('homework_trans.Name')}}</th>
                                            <th>{{trans('homework_trans.Subject')}}</th>
                                            <th>{{trans('homework_trans.Instructor')}}</th>
                                            <th>{{trans('homework_trans.File')}}</th>
                                            <th>{{trans('homework_trans.Added_Date')}}</th>
                                            <th>{{trans('homework_trans.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($homeworks as $homework)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{ $homework->name }}</td>
                                                <td>{{ $homework->Subjects->name }}</td>
                                                <td>{{ $homework->Instructors->name }}</td>
                                                <td>{{ $homework->h_file }}</td>
                                                <td>{{ Carbon\Carbon::parse($homework->created_at)->diffForHumans() }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('download.student.attachment', $homework->h_file) }}"
                                                        title="{{trans('homework_trans.Download')}}" class="btn btn-warning btn-sm" role="button"
                                                        aria-pressed="true"><i class="ti-download"></i></a>
                                                </td>
                                            </tr>


                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--================================footer -->
            @include('student.body.footer')
        </div><!-- main content wrapper end-->
    </div>
    <!--=================================footer -->
    @include('student.body.footer-scripts')
</body>

</html>
