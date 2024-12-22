<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{trans('evaluation_trans.My_Evaluations')}} - {{trans('main_trans.Main_Title')}}</title>
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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">{{trans('evaluation_trans.My_Evaluations')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                    class="default-color">{{trans('exams_trans.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('evaluation_trans.My_Evaluations')}}</li>
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
                                            <th>{{trans('evaluation_trans.Instructor')}}</th>
                                            <th>{{trans('evaluation_trans.From')}}</th>
                                            <th>{{trans('evaluation_trans.To')}}</th>
                                            <th>{{trans('evaluation_trans.Precentage')}}</th>
                                            <th>{{trans('evaluation_trans.Feedback')}}</th>
                                            <th>{{trans('evaluation_trans.Added_Date')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($evaluations as $evaluation)
                                            @if ($evaluation->stud_id == Auth::user()->id)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $evaluation->Instructor->name }}</td>
                                                    <td>{{ $evaluation->date_from }}</td>
                                                    <td>{{ $evaluation->date_to }}</td>
                                                    <td>{{ $evaluation->prcentage }}</td>
                                                    <td>{{ $evaluation->feedback }}</td>
                                                    <td>{{ Carbon\Carbon::parse($evaluation->created_at)->diffForHumans() }}</td>
                                                </tr>
                                            @endif
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
