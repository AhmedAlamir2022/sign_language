<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{trans('inst_trans.Title')}} - {{trans('main_trans.Main_Title')}}</title>
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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> {{trans('inst_trans.Title')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="default-color">{{trans('admin_trans.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('inst_trans.Title')}}</li>
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
                                {{trans('admin_trans.Add_New')}}</button><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="10" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('admin_trans.Name')}}</th>
                                            <th>{{trans('admin_trans.Email')}}</th>
                                            <th>{{trans('admin_trans.Mobile_Number')}}</th>
                                            <th>{{trans('admin_trans.Address')}}</th>
                                            <th>{{trans('admin_trans.Added_Date')}}</th>
                                            <th>{{trans('admin_trans.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($insts as $user)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->contact }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal" data-target="#delete{{ $user->id }}"
                                                        title="Delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <!-- delete_modal_user -->
                                            <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title" id="exampleModalLabel">
                                                                {{trans('inst_trans.Delete_Inst')}}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('delete.inst', $user->id) }}"
                                                                method="post">
                                                                @csrf
                                                                {{trans('inst_trans.Delete_Inst_Sure')}}
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $user->id }}">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{trans('admin_trans.Close')}}</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">{{trans('admin_trans.Delete')}}</button>
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
                <!-- add_modal_Grade -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    {{trans('admin_trans.Add_New')}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('add.inst') }}" method="post" autocomplete="off">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('admin_trans.Name')}}</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('admin_trans.Email')}}</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div> <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('admin_trans.Password')}}</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                    </div><br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('admin_trans.UserName')}}</label>
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('admin_trans.Mobile_Number')}}</label>
                                            <input type="number" name="contact" class="form-control">
                                        </div>
                                    </div><br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('admin_trans.Address')}}</label>
                                            <textarea class="form-control" rows="3" name="address"></textarea>
                                        </div>
                                    </div><br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('admin_trans.Country')}}</label>
                                            <input type="text" name="country" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('admin_trans.City')}}</label>
                                            <input type="text" name="city" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                        type="submit">{{trans('admin_trans.Add_New')}}</button>
                                </form>
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
