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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">{{trans('videos_trans.Title')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
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

                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="10" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('videos_trans.Name')}}</th>
                                            <th>{{trans('videos_trans.Subject')}}</th>
                                            <th>{{trans('videos_trans.Insrtuctor')}}</th>
                                            <th>{{trans('videos_trans.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($videos as $video)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{ $video->name }}</td>
                                                <td>{{ $video->Subjects->name }}</td>
                                                <td>{{ $video->Instructors->name }}</td>
                                                <td><button type="button" class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#watch{{ $video->id }}"
                                                        title="Watch">{{trans('videos_trans.Watch')}}</button></td>
                                            </tr>
                                            <!-- watch_video_model -->
                                            <div class="modal fade" id="watch{{ $video->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        {!! Embed::make($video->url)->parseUrl()->getIframe() !!}

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
            @include('student.body.footer')
        </div><!-- main content wrapper end-->
    </div>
    <!--=================================footer -->
    @include('student.body.footer-scripts')
</body>

</html>
