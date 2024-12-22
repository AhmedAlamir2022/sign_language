<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{trans('evaluation_trans.Title')}} - {{trans('main_trans.Main_Title')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('admin.body.head')
</head>

<body style="font-family: 'Cairo', sans-serif">
    <div class="wrapper">
        @include('admin.body.main-header')
        @include('admin.body.main-sidebar')
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">{{trans('evaluation_trans.Title')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="default-color">{{trans('exams_trans.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('evaluation_trans.Title')}}</li>
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
                                            <th>{{trans('evaluation_trans.Student')}}</th>
                                            <th>{{trans('evaluation_trans.From')}}</th>
                                            <th>{{trans('evaluation_trans.To')}}</th>
                                            <th>{{trans('evaluation_trans.Precentage')}}</th>
                                            <th>{{trans('evaluation_trans.Feedback')}}</th>
                                            <th>{{trans('evaluation_trans.Added_Date')}}</th>
                                            <th>{{trans('evaluation_trans.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($evaluations as $evaluation)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{ $evaluation->Instructor->name }}</td>
                                                <td>{{ $evaluation->Student->name }}</td>
                                                <td>{{ $evaluation->date_from }}</td>
                                                <td>{{ $evaluation->date_to }}</td>
                                                <td>{{ $evaluation->prcentage }}</td>
                                                <td>{{ $evaluation->feedback }}</td>
                                                <td>{{ Carbon\Carbon::parse($evaluation->created_at)->diffForHumans() }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal" data-target="#delete{{ $evaluation->id }}"
                                                        title="Delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <!-- delete_modal_evaluation -->
                                            <div class="modal fade" id="delete{{ $evaluation->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title" id="exampleModalLabel">
                                                                {{trans('evaluation_trans.Delete_evaluation')}}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('delete.stud_evaluation', $evaluation->id) }}"
                                                                method="post">
                                                                @csrf
                                                                {{trans('evaluation_trans.Delete_evaluation_Sure')}}
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $evaluation->id }}">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{trans('exams_trans.Close')}}</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">{{trans('exams_trans.Delete')}}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--================================footer -->
            @include('admin.body.footer')
        </div><!-- main content wrapper end-->
    </div>
    <!--=================================footer -->
    @include('admin.body.footer-scripts')
</body>

</html>
