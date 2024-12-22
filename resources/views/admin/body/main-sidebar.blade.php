<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Dashboard_page') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('main_trans.Main_Title') }}
                    </li>
                    <!-- Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-menu">
                            <div class="pull-left"><i class="ti-user"></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Users') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('all.admins') }}">{{ trans('Sidebar_trans.Admin_List') }}</a> </li>
                            <li> <a href="{{ route('all.inst') }}">{{ trans('Sidebar_trans.Inst_List') }}</a> </li>
                            <li> <a href="{{ route('all.students') }}">{{ trans('Sidebar_trans.Students') }}</a> </li>
                        </ul>
                    </li>
                    <!-- Subjects-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subjects">
                            <div class="pull-left"><i class="fa fa-book"></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Subjects') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Subjects" class="collapse" data-parent="#Subjects">
                            <li><a href="{{ route('Subject.index') }}">{{ trans('Sidebar_trans.Subjects_List') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Exams -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Rates">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Exams') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Rates" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('all.exams') }}">{{ trans('Sidebar_trans.Exam_List') }}</a></li>
                        </ul>
                    </li>

                    <!-- Homework-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Complaints">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Homework') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Complaints" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('all.homeworks') }}">{{ trans('Sidebar_trans.Homework_List') }}</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Messages -->
                    <li><a href="javascript:void(0);" data-toggle="collapse" data-target="#Messages">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Messages') }}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Messages" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('all.messages') }}">{{ trans('Sidebar_trans.Messages_List') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!--Students Evaluation-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#evaluations-menu">
                            <div class="pull-left"><i class="ti-palette"></i></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Evaluations') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="evaluations-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('all.evaluations') }}">{{ trans('Sidebar_trans.Student_Evaluations') }}</a> </li>
                        </ul>
                    </li>


                    <!-- Materials-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Library">
                            <div class="pull-left"><i class="fa fa-book"></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Materials') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Library" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('all.books') }}">{{ trans('Sidebar_trans.Instructors_Books') }}</a></li>
                            <li><a href="{{ route('all.videos') }}">{{ trans('Sidebar_trans.Instructors_Videos') }}</a></li>
                        </ul>
                    </li>
                    <!-- {Podcasts}-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Prodcasts-menu">
                            <div class="pull-left"><i class="ti-palette"></i></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Podcasts') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Prodcasts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ route('admin.podcasts') }}">{{ trans('Sidebar_trans.Podcasts_list') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('main_trans.Settings') }}
                    </li>
                    <!-- Profile-->
                    <li>
                        <a href="{{ route('admin.profile') }}"><i class="ti-user"></i><span
                                class="right-nav-text">{{ trans('main_trans.Profile') }}</span></a>
                    </li>
                    <!-- Change Password-->
                    <li>
                        <a href="{{ route('change.password') }}"><i class="ti-settings"></i><span
                                class="right-nav-text">{{ trans('main_trans.ChangePassword') }}</span></a>
                    </li>
                    <!-- Logout-->
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                                class="text-info ti-lock"></i>{{ trans('main_trans.Logout') }}</a>
                    </li>
                    <br>
                    <hr>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
