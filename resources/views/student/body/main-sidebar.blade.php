<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Dashboard_page') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('main_trans.Main_Title') }}
                    </li>
                    <!-- Material -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Books">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Materials') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Books" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('stud.books') }}">{{ trans('books_trans.Books') }}</a></li>
                            <li><a href="{{ route('stud.videos') }}">{{ trans('videos_trans.videos') }}</a></li>
                        </ul>
                    </li>
                    <!-- Exams -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subjects">
                            <div class="pull-left"><i class="fa fa-book"></i><span class="right-nav-text">{{ trans('Sidebar_trans.Exams') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Subjects" class="collapse" data-parent="#Subjects">
                            <li><a href="{{ route('stud.exams') }}">{{ trans('Sidebar_trans.Exam_List') }}</a></li>
                        </ul>
                    </li>
                    <!-- Homeworks -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Features">
                            <div class="pull-left"><i class="fa fa-building"></i><span class="right-nav-text">{{ trans('Sidebar_trans.Homework') }}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Features" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('stud.homeworks') }}">{{ trans('Sidebar_trans.Homework_List') }}</a></li>
                            <li><a href="{{ route('my.homeworks.solutions') }}">{{ trans('Sidebar_trans.upload_solution') }}</a></li>
                        </ul>
                    </li>
                    <!-- Evaluations-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Evaluations">
                            <div class="pull-left"><i class="fa fa-book"></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Evaluations') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Evaluations" class="collapse" data-parent="#Evaluations">
                            <li><a href="{{ route('stud.evaluations') }}">{{ trans('Sidebar_trans.My_Evaluations') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-menu">
                            <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">{{ trans('Sidebar_trans.Messages') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('student.instructor.messages') }}">{{ trans('Sidebar_trans.Instructor_Messages') }}</a> </li>
                        </ul>
                    </li>
                    <!-- {Prodcasts}-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Prodcasts-menu">
                            <div class="pull-left"><i class="ti-palette"></i></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Podcasts') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Prodcasts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ route('students.podcasts') }}">{{ trans('Sidebar_trans.Podcasts_list') }}</a>
                            </li>
                        </ul>
                    </li>


                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('main_trans.Settings') }}</li>
                    <!-- Profile-->
                    <li>
                        <a href="{{ route('student.profile') }}"><i class="ti-user"></i><span
                                class="right-nav-text">{{ trans('main_trans.Profile') }}</span></a>
                    </li>
                    <!-- Change Password-->
                    <li>
                        <a href="{{ route('student.change.password') }}"><i class="ti-settings"></i><span
                                class="right-nav-text">{{ trans('main_trans.ChangePassword') }}</span></a>
                    </li>
                    <!-- Logout-->
                    <li>
                        <a class="dropdown-item" href="{{ route('student.logout') }}"><i
                                class="text-info ti-lock"></i>{{ trans('main_trans.Logout') }}</a>
                    </li>
                    <br>
                    <hr>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
