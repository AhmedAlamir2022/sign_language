<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{trans('videos_trans.Title')}} - {{trans('main_trans.Main_Title')}}</title>
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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> {{trans('videos_trans.Title')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}"
                                    class="default-color">{{trans('videos_trans.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('videos_trans.Title')}}</li>
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
                            <button type="button" class="button x-small" data-toggle="modal"
                                data-target="#exampleModal">
                                {{trans('videos_trans.Add_New_Video')}}</button><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="10" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('videos_trans.Name')}}</th>
                                            <th>{{trans('videos_trans.Subject')}}</th>
                                            <th>{{trans('videos_trans.Added_Date')}}</th>
                                            <th>{{trans('videos_trans.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($videos as $video)
                                            @if ($video->inst_id == Auth::guard('instructor')->user()->id)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $video->name }}</td>
                                                    <td>{{ $video->Subjects->name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($video->created_at)->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#delete{{ $video->id }}"
                                                            title="{{trans('videos_trans.Delete')}}"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>

                                                <!-- delete_modal_specilization -->
                                                <div class="modal fade" id="delete{{ $video->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">
                                                                    {{trans('videos_trans.Delete_video')}}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('delete.inst.video', $video->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    {{trans('videos_trans.Delete_Sure')}}
                                                                    <input id="id" type="hidden" name="id"
                                                                        class="form-control"
                                                                        value="{{ $video->id }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{trans('videos_trans.Close')}}</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">{{trans('videos_trans.Delete')}}</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add_modal_Grade -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    {{trans('videos_trans.Add_New_Video')}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('add.inst.video') }}" method="post" autocomplete="off">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('videos_trans.Name')}}</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div> <br>
                                    <div class="section-field mb-20">
                                        <label for="subject_id" class="mb-10">{{trans('videos_trans.Subject')}} </label>
                                        <select class="form-control" name="subject_id" class="custom-select" required>
                                            <option value="" selected disabled> --------{{trans('videos_trans.Choose_Subject')}}-------
                                            </option>
                                            @foreach ($subjects as $subject)
                                                <option value = "{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('videos_trans.Video_URL')}}</label>
                                            <input type="url" name="url" class="form-control" required>
                                        </div>
                                    </div> <br>
                                    <hr>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                        type="submit">{{trans('videos_trans.Add_New_Video')}}</button>
                                </form>
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
