<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{trans('messages.All_Messages')}} - {{trans('main_trans.Main_Title')}}</title>
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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">{{trans('messages.All_Messages')}} </h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}"
                                    class="default-color">{{trans('messages.Dashboard')}} </a></li>
                            <li class="breadcrumb-item active">{{trans('messages.All_Messages')}} </li>
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
                                {{trans('messages.Send_Message')}}</button><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('messages.Student')}}</th>
                                            <th>{{trans('messages.My_Message')}}</th>
                                            <th>{{trans('messages.Student_Message')}}</th>
                                            <th>{{trans('messages.Added_Date')}}</th>
                                            <th>{{trans('messages.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($stud_messages as $message)
                                            @if ($message->inst_id == Auth::guard('instructor')->user()->id)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $message->Student->name }}</td>
                                                    <td>
                                                        @if ($message->inst_message == null)
                                                            <button class="btn btn-warning btn-sm">{{trans('messages.Not_Replay')}}
                                                                </button>
                                                        @else
                                                            {{ $message->inst_message }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $message->stud_message }}</td>
                                                    <td>{{ Carbon\Carbon::parse($message->created_at)->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        @if ($message->inst_message == null)
                                                            <button type="button" class="btn btn-info btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#update_status{{ $message->id }}"
                                                                title="Delete">{{trans('messages.Replay')}}</button>
                                                        @endif
                                                    </td>
                                                </tr>


                                                <!-- Edit Status_modal_user -->
                                                <div class="modal fade" id="update_status{{ $message->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">
                                                                    {{trans('messages.Replay_on')}}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('edit.inst.stud.mess', $message->id) }}"
                                                                    method="post" autocomplete="off"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $message->id }}">
                                                                            <label for="status">{{trans('messages.Student')}}</label>
                                                                            <input class="form-control" type="text"
                                                                                readonly
                                                                                value="{{ $message->Student->name }}">
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <label for="status">{{trans('messages.Student_Message')}}</label>
                                                                            <textarea class="form-control" readonly rows="3">{{ $message->stud_message }}</textarea>
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <label for="title">{{trans('messages.My_Message')}}</label>
                                                                            <textarea class="form-control" required rows="3" name="inst_message"></textarea>
                                                                        </div>
                                                                    </div><br>
                                                                    <hr>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{trans('messages.Close')}}</button>
                                                                        <button type="submit"
                                                                            class="btn btn-info">{{trans('messages.Send')}}</button>
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
                                    {{trans('messages.Send_Message')}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('send.inst.stud.mess') }}" method="post"
                                    autocomplete="off">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('messages.Student')}}</label>
                                            <select class="form-control" name="stud_id" required>
                                                <option value=" ">-----{{trans('messages.Select_Student')}}-----</option>
                                                @foreach ($users as $user)
                                                    <option value = "{{ $user->id }}">{{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('messages.Message')}}</label>
                                            <textarea class="form-control" rows="3" name="inst_message"></textarea>
                                        </div>
                                    </div><br>
                                    <hr>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                        type="submit">{{trans('messages.Add_New')}}</button>
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
