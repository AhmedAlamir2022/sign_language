<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{trans('books_trans.Title')}} - {{trans('main_trans.Main_Title')}}</title>
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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> {{trans('books_trans.Title')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}"
                                    class="default-color">{{trans('exams_trans.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('books_trans.Title')}}</li>
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
                                {{trans('books_trans.add_new_book')}}</button><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="10" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('books_trans.Name')}}</th>
                                            <th>{{trans('books_trans.Subject')}}</th>
                                            <th>{{trans('books_trans.File')}}</th>
                                            <th>{{trans('books_trans.Added_Date')}}</th>
                                            <th>{{trans('books_trans.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($books as $book)
                                            @if ($book->inst_id == Auth::guard('instructor')->user()->id)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $book->name }}</td>
                                                    <td>{{ $book->Subjects->name }}</td>
                                                    <td>{{ $book->file }}</td>
                                                    <td>{{ Carbon\Carbon::parse($book->created_at)->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#delete{{ $book->id }}"
                                                            title="Delete"><i class="fa fa-trash"></i></button>
                                                        <a href="{{ route('download.inst.book', $book->file) }}"
                                                            title="{{trans('books_trans.Download')}}" class="btn btn-warning btn-sm"
                                                            role="button" aria-pressed="true"><i
                                                                class="ti-download"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- delete_modal_specilization -->
                                                <div class="modal fade" id="delete{{ $book->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">
                                                                    {{trans('books_trans.delete_book')}}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('delete.inst.book', $book->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    {{trans('books_trans.delete_sure')}}
                                                                    <input id="id" type="hidden" name="id"
                                                                        class="form-control"
                                                                        value="{{ $book->id }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{trans('books_trans.close')}}</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">{{trans('books_trans.delete')}}</button>
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
                                    {{trans('books_trans.add_new_book')}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('add.inst.book') }}" method="post" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('books_trans.Name')}}</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div> <br>
                                    <div class="section-field mb-20">
                                        <label for="subject_id" class="mb-10">{{trans('books_trans.Subject')}} </label>
                                        <select class="form-control" name="subject_id" class="custom-select" required>
                                            <option value="" selected disabled> --------{{trans('books_trans.Choose_Subject')}}-------
                                            </option>
                                            @foreach ($subjects as $subject)
                                                <option value = "{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('books_trans.File')}}</label>
                                            <input type="file" name="file"
                                                accept=".pdf,.jpg, .png, image/jpeg, image/png" class="form-control"
                                                required>
                                        </div>
                                    </div> <br>
                                    <hr>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                        type="submit">{{trans('books_trans.add_new_book')}}</button>
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
