<div class="navbar navbar-expand pr-0 navbar-light border-bottom-2"
     id="default-navbar"
     data-primary>

    <!-- Navbar Toggler -->

    <button class="navbar-toggler w-auto mr-16pt d-block d-lg-none rounded-0"
            type="button"
            data-toggle="sidebar">
        <span class="material-icons">short_text</span>
    </button>

    <!-- // END Navbar Toggler -->

    <!-- Navbar Brand -->

    <a href="{{ route('dashboard') }}"
       class="navbar-brand mr-16pt d-lg-none">

                        <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">

                            <span class="avatar-title rounded bg-primary"><img src="{{ asset('backend/images/illustration/student/128/white.svg') }}"
                                                                               alt="logo"
                                                                               class="img-fluid" /></span>

                        </span>

        <span class="d-none d-lg-block">{{ config('app.name', 'Laravel') }}</span>
    </a>

    {{--<ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
        <li class="nav-item">
            <a href="index.html"
               class="nav-link">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a href="#"
               class="nav-link dropdown-toggle"
               data-toggle="dropdown"
               data-caret="false">Courses</a>
            <div class="dropdown-menu">
                <a href="courses.html"
                   class="dropdown-item">Browse Courses</a>
                <a href="student-course.html"
                   class="dropdown-item">Preview Course</a>
                <a href="student-lesson.html"
                   class="dropdown-item">Preview Lesson</a>
                <a href="student-take-course.html"
                   class="dropdown-item"><span class="mr-16pt">Take Course</span> <span class="badge badge-notifications badge-accent text-uppercase ml-auto">Pro</span></a>
                <a href="student-take-lesson.html"
                   class="dropdown-item">Take Lesson</a>
                <a href="student-take-quiz.html"
                   class="dropdown-item">Take Quiz</a>
                <a href="student-quiz-result-details.html"
                   class="dropdown-item">Quiz Result</a>
                <a href="student-dashboard.html"
                   class="dropdown-item">Student Dashboard</a>
                <a href="student-my-courses.html"
                   class="dropdown-item">My Courses</a>
                <a href="student-quiz-results.html"
                   class="dropdown-item">My Quizzes</a>
                <a href="help-center.html"
                   class="dropdown-item">Help Center</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a href="#"
               class="nav-link dropdown-toggle"
               data-toggle="dropdown"
               data-caret="false">Paths</a>
            <div class="dropdown-menu">
                <a href="paths.html"
                   class="dropdown-item">Browse Paths</a>
                <a href="student-path.html"
                   class="dropdown-item">Path Details</a>
                <a href="student-path-assessment.html"
                   class="dropdown-item">Skill Assessment</a>
                <a href="student-path-assessment-result.html"
                   class="dropdown-item">Skill Result</a>
                <a href="student-paths.html"
                   class="dropdown-item">My Paths</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a href="#"
               class="nav-link dropdown-toggle"
               data-toggle="dropdown"
               data-caret="false">Teachers</a>
            <div class="dropdown-menu">
                <a href="instructor-dashboard.html"
                   class="dropdown-item">Instructor Dashboard</a>
                <a href="instructor-courses.html"
                   class="dropdown-item">Manage Courses</a>
                <a href="instructor-quizzes.html"
                   class="dropdown-item">Manage Quizzes</a>
                <a href="instructor-earnings.html"
                   class="dropdown-item">Earnings</a>
                <a href="instructor-statement.html"
                   class="dropdown-item">Statement</a>
                <a href="instructor-edit-course.html"
                   class="dropdown-item">Edit Course</a>
                <a href="instructor-edit-quiz.html"
                   class="dropdown-item">Edit Quiz</a>
            </div>
        </li>
        <li class="nav-item dropdown active"
            data-toggle="tooltip"
            data-title="Community"
            data-placement="bottom"
            data-boundary="window">
            <a href="#"
               class="nav-link dropdown-toggle"
               data-toggle="dropdown"
               data-caret="false">
                <i class="material-icons">people_outline</i>
            </a>
            <div class="dropdown-menu">
                <a href="teachers.html"
                   class="dropdown-item active">Browse Teachers</a>
                <a href="student-profile.html"
                   class="dropdown-item">Student Profile</a>
                <a href="teacher-profile.html"
                   class="dropdown-item">Instructor Profile</a>
                <a href="blog.html"
                   class="dropdown-item">Blog</a>
                <a href="blog-post.html"
                   class="dropdown-item">Blog Post</a>
                <a href="faq.html"
                   class="dropdown-item">FAQ</a>
                <a href="help-center.html"
                   class="dropdown-item">Help Center</a>
                <a href="discussions.html"
                   class="dropdown-item">Discussions</a>
                <a href="discussion.html"
                   class="dropdown-item">Discussion Details</a>
                <a href="discussions-ask.html"
                   class="dropdown-item">Ask Question</a>
            </div>
        </li>
    </ul>--}}

    <!-- // END Navbar Brand -->

    <span class="d-none d-md-flex align-items-center mr-16pt">

                        <span class="avatar avatar-sm mr-12pt">

                            <span class="avatar-title rounded navbar-avatar"><i class="material-icons">{{--trending_up--}}shopping_cart</i></span>

                        </span>

                        <small class="flex d-flex flex-column">
                            <strong class="navbar-text-100">Orders</strong>
                            <span class="navbar-text-50">{{ \App\Models\Order::count() }}</span>
                        </small>
                    </span>
    <span class="d-none d-md-flex align-items-center mr-16pt">

                        <span class="avatar avatar-sm mr-12pt">

                            <span class="avatar-title rounded navbar-avatar"><i class="material-icons">people</i></span>

                        </span>

                        <small class="flex d-flex flex-column">
                            <strong class="navbar-text-100">Customers</strong>
                            <span class="navbar-text-50">{{ \App\Models\Customer::count() }}</span>
                        </small>
                    </span>

    <div class="flex"></div>

    <!-- Switch Layout -->

    {{--<a href="#"
       class="navbar-toggler navbar-toggler-custom align-items-center justify-content-center d-none d-lg-flex"
       data-toggle="tooltip"
       data-title="Switch to Fullscreen mood"
       data-placement="bottom"
       id="fullscreen_button"
       onclick="openFullscreen();"
       data-boundary="window">
        <span class="material-icons">fullscreen</span>
    </a>--}}

    <!-- // END Switch Layout -->

    <!-- Navbar Menu -->

    <div class="nav navbar-nav flex-nowrap d-flex mr-16pt">

        <!-- Messages dropdown -->
        {{--@include('components.messages')--}}
        <!-- // END Notifications dropdown -->

        <!-- Notifications dropdown -->
        @include('components.notifications')
        <!-- // END Notifications dropdown -->

        <div class="nav-item dropdown">
            <a href="#"
               class="nav-link d-flex align-items-center dropdown-toggle"
               data-toggle="dropdown"
               data-caret="false">

                                <span class="avatar avatar-sm mr-8pt2">

                                    <span class="avatar-title rounded-circle bg-primary"><i class="material-icons">account_box</i></span>

                                </span>

            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header"><strong>Profile</strong></div>
                <a class="dropdown-item"
                   href="{{ route('dashboard.settings.profile') }}">Edit Profile</a>
                {{--<a class="dropdown-item"
                   href="billing.html">Billing</a>
                <a class="dropdown-item"
                   href="billing-history.html">Payments</a>--}}
                <a class="dropdown-item"
                   href="{{ route('logout') }}" onclick="event.preventDefault();
                                                $('#logout-form').submit();">{{ __('Log Out') }}</a>
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <!-- // END Navbar Menu -->

</div>
