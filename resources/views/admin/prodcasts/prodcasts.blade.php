<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{trans('podcast_trans.main_title')}} - {{trans('main_trans.Main_Title')}}</title>
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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">{{trans('podcast_trans.main_title')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="default-color">{{trans('videos_trans.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('podcast_trans.main_title')}}</li>
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
                                            <th>{{trans('podcast_trans.Title')}}</th>
                                            <th>{{trans('podcast_trans.Interviwer')}}</th>
                                            <th>{{trans('podcast_trans.quest')}}</th>
                                            <th>{{trans('podcast_trans.Insrtuctor')}}</th>
                                            <th>{{trans('podcast_trans.Added_Date')}}</th>
                                            <th>{{trans('podcast_trans.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($prodcasts  as $prodcast)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{ $prodcast->title }}</td>
                                                <td>{{ $prodcast->interviwer }}</td>
                                                <td>{{ $prodcast->quest }}</td>
                                                <td>{{ $prodcast->Instructor->name }}</td>
                                                <td>{{ Carbon\Carbon::parse($prodcast->created_at)->diffForHumans() }}
                                                </td>
                                                <td><button type="button" class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#watch{{ $prodcast->id }}"
                                                        title="Watch">{{trans('videos_trans.Watch')}}</button></td>
                                            </tr>
                                            <!-- watch_video_model -->
                                            <div class="modal fade" id="watch{{ $prodcast->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        {!! Embed::make($prodcast->url)->parseUrl()->getIframe() !!}

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
