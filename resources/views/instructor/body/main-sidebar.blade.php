<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('instructor.dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Dashboard_page') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('main_trans.Main_Title') }}
                    </li>
                    <!-- Messages -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-menu">
                            <div class="pull-left"><i class="ti-user"></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Messages') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ route('inst.student.messages') }}">{{ trans('Sidebar_trans.Messages_List') }}</a>
                            </li>
                        </ul>
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
                            <li><a href="{{ route('instructor.books') }}">{{ trans('Sidebar_trans.My_Books') }}</a></li>
                            <li><a href="{{ route('instructor.videos') }}">{{ trans('Sidebar_trans.My_Videos') }}</a></li>
                        </ul>
                    </li>
                    <!-- Exams -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Features">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Exams') }}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Features" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('inst.myexams') }}">{{ trans('Sidebar_trans.Exam_List') }}</a></li>
                        </ul>
                    </li>
                    <!-- Evaluation -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Evaluation">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Evaluations') }}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Evaluation" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('all.inst.students') }}">{{ trans('main_trans.Students') }}</a></li>
                            <li><a href="{{ route('inst.evaluation') }}">{{ trans('Sidebar_trans.Student_Evaluations') }}</a></li>
                        </ul>
                    </li>
                    <!-- Homeworks-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Homeworks-menu">
                            <div class="pull-left"><i class="ti-palette"></i></i><span
                                    class="right-nav-text">{{ trans('Sidebar_trans.Homework') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Homeworks-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ route('instructor.homeworks') }}">{{ trans('Sidebar_trans.Homework_List') }}</a>
                            </li>
                            <li> <a
                                    href="{{ route('instructor.shomeworks') }}">{{ trans('Sidebar_trans.Students_Solutions') }}</a>
                            </li>
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
                                    href="{{ route('instructor.prodcasts') }}">{{ trans('Sidebar_trans.Podcasts_list') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('main_trans.Settings') }}
                    </li>
                    <!-- Profile-->
                    <li>
                        <a href="{{ route('instructor.profile') }}"><i class="ti-user"></i><span
                                class="right-nav-text">{{ trans('main_trans.Profile') }}</span></a>
                    </li>
                    <!-- Change Password-->
                    <li>
                        <a href="{{ route('instructor.change.password') }}"><i class="ti-settings"></i><span
                                class="right-nav-text">{{ trans('main_trans.ChangePassword') }}</span></a>
                    </li>
                    <!-- Logout-->
                    <li>
                        <a class="dropdown-item" href="{{ route('instructor.logout') }}"><i
                                class="text-info ti-lock"></i>{{ trans('main_trans.Logout') }}</a>
                    </li>
                    <br>
                    <hr>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
