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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">{{ trans('homework_trans.Homework_Solutions') }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
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
                            <button type="button" class="button x-small" data-toggle="modal"
                                data-target="#exampleModal">
                                {{ trans('homework_trans.Upload_New_Homework_Solution') }}</button><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="10" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('homework_trans.Homework') }} </th>
                                            <th>{{ trans('homework_trans.Instructor') }}</th>
                                            <th>{{ trans('homework_trans.Solution_File') }}</th>
                                            <th>{{ trans('homework_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($solutions as $homework)
                                            @if ($homework->stud_id == Auth::user()->id)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $homework->Homework->name }}</td>
                                                    <td>{{ $homework->Instructor->name }}</td>
                                                    <td>{{ $homework->hs_file }}</td>
                                                    <td>
                                                        <a href="{{ route('download.shomework', $homework->hs_file) }}"
                                                            title="{{ trans('homework_trans.Download') }}" class="btn btn-warning btn-sm"
                                                            role="button" aria-pressed="true"><i
                                                                class="ti-download"></i></a>
                                                    </td>
                                                </tr>


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
                                    {{ trans('homework_trans.Add_new_solution') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('add.shomework') }}" method="post" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{ trans('homework_trans.Name') }} </label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div> <br>
                                    <div class="section-field mb-20">
                                        <label for="grade_id" class="mb-10">{{ trans('homework_trans.Homework') }}  </label>
                                        <select class="form-control" name="homework_id" class="custom-select"
                                            onchange="console.log($(this).val())" required>
                                            <option value="" selected disabled> --------{{ trans('homework_trans.Choose_Homework') }} -------
                                            </option>
                                            @foreach ($homeworks as $homework)
                                                <option value = "{{ $homework->id }}">{{ $homework->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="section-field mb-20">
                                        <label for="inst_id" class="mb-10">{{ trans('homework_trans.Instructor') }} </label>
                                        <select class="form-control" name="inst_id" class="custom-select"
                                            onchange="console.log($(this).val())" required>
                                            <option value="" selected disabled> --------{{ trans('homework_trans.Choose_Instructor') }}-------
                                            </option>
                                            @foreach ($insts as $inst)
                                                <option value = "{{ $inst->id }}">{{ $inst->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{ trans('homework_trans.Solution_File') }}</label>
                                            <input type="file" name="hs_file"
                                                accept=".pdf,.jpg, .png, image/jpeg, image/png" class="form-control"
                                                required>
                                        </div>
                                    </div> <br>
                                    <hr>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                        type="submit">{{ trans('homework_trans.Add_new_solution') }}</button>
                                </form>
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
