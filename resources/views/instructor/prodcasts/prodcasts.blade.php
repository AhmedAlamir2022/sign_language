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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">{{trans('podcast_trans.main_title')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}"
                                    class="default-color">{{trans('podcast_trans.Dashboard')}}</a></li>
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
                            <button type="button" class="button x-small" data-toggle="modal"
                                data-target="#exampleModal">{{trans('podcast_trans.Add_new')}}
                                </button><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="10" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('podcast_trans.Title')}}</th>
                                            <th>{{trans('podcast_trans.Interviwer')}}</th>
                                            <th>{{trans('podcast_trans.quest')}}</th>
                                            <th>{{trans('podcast_trans.Added_Date')}}</th>
                                            <th>{{trans('podcast_trans.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($prodcasts as $prodcast)
                                            @if ($prodcast->inst_id == Auth::guard('instructor')->user()->id)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $prodcast->title }}</td>
                                                    <td>{{ $prodcast->interviwer }}</td>
                                                    <td>{{ $prodcast->quest }}</td>
                                                    <td>{{ Carbon\Carbon::parse($prodcast->created_at)->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#delete{{ $prodcast->id }}"
                                                            title="{{trans('podcast_trans.Delete')}}"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>

                                                <!-- delete_modal_specilization -->
                                                <div class="modal fade" id="delete{{ $prodcast->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">
                                                                    {{trans('podcast_trans.Delete')}}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('delete.inst.prodcast', $prodcast->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    {{trans('podcast_trans.Delete_Sure')}}
                                                                    <input id="id" type="hidden" name="id"
                                                                        class="form-control"
                                                                        value="{{ $prodcast->id }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{trans('podcast_trans.Close')}}</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">{{trans('podcast_trans.Delete_1')}}</button>
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
                                    {{trans('podcast_trans.Add_new')}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('add.inst.prodcast') }}" method="post" autocomplete="off">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('podcast_trans.Title')}}</label>
                                            <input type="text" name="title" class="form-control" required>
                                        </div>
                                    </div> <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('podcast_trans.Interviwer')}}</label>
                                            <input type="text" name="interviwer" class="form-control" required>
                                        </div>
                                    </div> <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('podcast_trans.quest')}}</label>
                                            <input type="text" name="quest" class="form-control" required>
                                        </div>
                                    </div> <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('podcast_trans.Prodcast_URL')}}</label>
                                            <input type="url" name="url" class="form-control" required>
                                        </div>
                                    </div> <br>
                                    <hr>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                        type="submit">{{trans('podcast_trans.Add_new')}}</button>
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
