@extends('layouts.backend')

@section('title')
    {{ $customer->user->full_name }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.customers.index') }}">Customers</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $customer->user->full_name }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.customers.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    All Csutomers
@endsection

@section('main_content')
<div></div>
<div class="page-section bg-primary">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
        <img src="{{ asset('backend/images/illustration/teacher/128/white.svg') }}"
             width="104"
             class="mr-md-32pt mb-32pt mb-md-0"
             alt="instructor">
        <div class="flex mb-32pt mb-md-0">
            <h2 class="text-white mb-0">Laza Bogdan</h2>
            <p class="lead text-white-50 d-flex align-items-center">Instructor <span class="ml-16pt d-flex align-items-center"><i class="material-icons icon-16pt mr-4pt">opacity</i> 2,300 IQ</span></p>
        </div>
        <a href=""
           class="btn btn-outline-white">Follow</a>
    </div>
</div>

<div class="page-section bg-white border-bottom-2">
    <div class="container page__container">
        <div class="row">
            <div class="col-md-6">
                <h4>About me</h4>
                <p>Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.</p>
            </div>
            <div class="col-md-6">
                <h4>Connect</h4>
                <p>I’m currently working as a freelance marketing director and always interested in a challenge. Here’s how to reach out and connect.</p>
                <div class="d-flex align-items-center">
                    <a href=""
                       class="text-accent fab fa-facebook-square font-size-24pt mr-8pt"></a>
                    <a href=""
                       class="text-accent fab fa-twitter-square font-size-24pt"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-section border-bottom-2">
    <div class="container page__container">

        <div class="card">
            <img src="{{ asset('backend/images/paths/typescript_892x286.png') }}"
                 alt="TypeScript"
                 class="card-img"
                 style="max-height: 100%; width: initial;">
            <div class="fullbleed bg-primary"
                 style="opacity: .5;"></div>
            <img src="{{ asset('backend/images/paths/typescript_64x64.svg') }}"
                 width="64"
                 alt="Instruduction to TypeScript"
                 class="rounded position-absolute"
                 style="right: 1rem; top: 1rem;">
            <div class="card-body d-flex align-items-center justify-content-center fullbleed">
                <div>
                    <h2 class="text-white mb-16pt">{{ $customer->user->full_name }}</h2>
                    <div class="d-flex align-items-center mb-16pt justify-content-center">
                        <div class="d-flex align-items-center mr-16pt">
                            <span class="material-icons icon-16pt text-white-50 mr-4pt">access_time</span>
                            <p class="flex text-white-50 lh-1 mb-0">50 minutes left</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-white-50 mr-4pt">play_circle_outline</span>
                            <p class="flex text-white-50 lh-1 mb-0">12 lessons</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="student-take-lesson.html"
                           class="btn btn-white mr-8pt">Edit</a>
                        <a href="student-take-course.html"
                           class="btn btn-outline-white ml-0">Start over</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap align-items-start">
            <div class="d-flex align-items-center mr-24pt">
                <a href="student-take-course.html"
                   class="mr-12pt">
                    <img src="{{ asset('backend/images/paths/angular_64x64.svg') }}"
                         width="40"
                         alt="Angular"
                         class="rounded">
                </a>
                <div class="flex">
                    <a class="card-title"
                       href="student-take-course.html">Angular Fundamentals</a>
                    <p class="lh-1 mb-0">
                        <span class="text-50 small">with</span>
                        <span class="text-50 small">Elijah Murray</span>
                    </p>
                </div>
            </div>
            <div class="d-flex align-items-center py-4pt"
                 style="white-space: nowrap;">
                <small class="text-50 mr-8pt">Your rating</small>
                <div class="rating mr-8pt">
                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                </div>
                <small class="text-50">4/5</small>
            </div>
        </div>
    </div>
</div>
<div class="container page__container">
    <div class="page-section">

        <div class="page-separator">
            <div class="page-separator__text">Learning Paths</div>
        </div>

        <!-- <div class="page-heading">
<h4>Learning Paths</h4>
<a
href=""
class="text-underline ml-sm-auto">All my learning paths</a>
</div> -->

        <div class="row card-group-row mb-lg-8pt">

            <div class="col-sm-4 card-group-row__col">

                <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                     data-toggle="popover"
                     data-trigger="click">

                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <div class="flex">
                                <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                        <div class="overlay">
                                            <img src="{{ asset('backend/images/paths/angular_40x40@2x.png') }}"
                                                 width="40"
                                                 height="40"
                                                 alt="Angular"
                                                 class="rounded">
                                            <span class="overlay__content overlay__content-transparent">
                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                    <small class="h6 small text-white mb-0"
                                                           style="font-weight: 500;">80%</small>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="card-title">Angular</div>
                                        <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                </div>
                            </div>

                            <a href="student-path.html"
                               class="ml-4pt btn btn-sm btn-link text-secondary border-1 border-secondary">Resume</a>

                        </div>

                    </div>
                </div>

                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-left mr-12pt">
                            <img src="{{ asset('backend/images/paths/angular_40x40@2x.png') }}"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                        </div>
                        <div class="media-body">
                            <div class="card-title">Angular</div>
                            <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                        </div>
                    </div>

                    <p class="mt-16pt text-70">Angular is a platform for building mobile and desktop web applications.</p>

                    <div class="my-32pt">
                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                            <div class="d-flex align-items-center mr-8pt">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="student-path.html"
                               class="btn btn-primary mr-8pt">Resume</a>
                            <a href="student-path.html"
                               class="btn btn-outline-secondary ml-0">Start over</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <small class="text-50 mr-8pt">Your rating</small>
                        <div class="rating mr-8pt">
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                        </div>
                        <small class="text-50">4/5</small>
                    </div>
                </div>

            </div>

            <div class="col-sm-4 card-group-row__col">

                <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                     data-toggle="popover"
                     data-trigger="click">

                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <div class="flex">
                                <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                        <div class="overlay">
                                            <img src="{{ asset('backend/images/paths/swift_40x40@2x.png') }}"
                                                 width="40"
                                                 height="40"
                                                 alt="Angular"
                                                 class="rounded">
                                            <span class="overlay__content overlay__content-transparent">
                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                    <small class="h6 small text-white mb-0"
                                                           style="font-weight: 500;">80%</small>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="card-title">Swift</div>
                                        <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                </div>
                            </div>

                            <a href="student-path.html"
                               class="ml-4pt btn btn-sm btn-link text-secondary">Resume</a>

                        </div>

                    </div>
                </div>

                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-left mr-12pt">
                            <img src="{{ asset('backend/images/paths/swift_40x40@2x.png') }}"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                        </div>
                        <div class="media-body">
                            <div class="card-title">Swift</div>
                            <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                        </div>
                    </div>

                    <p class="mt-16pt text-70">Swift is a powerful and intuitive programming language for macOS, iOS, watchOS, tvOS and beyond.</p>

                    <div class="my-32pt">
                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                            <div class="d-flex align-items-center mr-8pt">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="student-path.html"
                               class="btn btn-primary mr-8pt">Resume</a>
                            <a href="student-path.html"
                               class="btn btn-outline-secondary ml-0">Start over</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <small class="text-50 mr-8pt">Your rating</small>
                        <div class="rating mr-8pt">
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                        </div>
                        <small class="text-50">4/5</small>
                    </div>
                </div>

            </div>

            <div class="col-sm-4 card-group-row__col">

                <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                     data-toggle="popover"
                     data-trigger="click">

                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <div class="flex">
                                <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                        <div class="overlay">
                                            <img src="{{ asset('backend/images/paths/react_40x40@2x.png') }}"
                                                 width="40"
                                                 height="40"
                                                 alt="Angular"
                                                 class="rounded">
                                            <span class="overlay__content overlay__content-transparent">
                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                    <small class="h6 small text-white mb-0"
                                                           style="font-weight: 500;">80%</small>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="card-title">React Native</div>
                                        <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                </div>
                            </div>

                            <a href="student-path.html"
                               class="ml-4pt btn btn-sm btn-link text-secondary">Resume</a>

                        </div>

                    </div>
                </div>

                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-left mr-12pt">
                            <img src="{{ asset('backend/images/paths/react_40x40@2x.png') }}"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                        </div>
                        <div class="media-body">
                            <div class="card-title">React Native</div>
                            <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                        </div>
                    </div>

                    <p class="mt-16pt text-70">Learn the fundamentals of working with React Native and how to create basic applications.</p>

                    <div class="my-32pt">
                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                            <div class="d-flex align-items-center mr-8pt">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="student-path.html"
                               class="btn btn-primary mr-8pt">Resume</a>
                            <a href="student-path.html"
                               class="btn btn-outline-secondary ml-0">Start over</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <small class="text-50 mr-8pt">Your rating</small>
                        <div class="rating mr-8pt">
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                        </div>
                        <small class="text-50">4/5</small>
                    </div>
                </div>

            </div>

            <div class="col-sm-4 card-group-row__col">

                <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                     data-toggle="popover"
                     data-trigger="click">

                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <div class="flex">
                                <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                        <div class="overlay">
                                            <img src="{{ asset('backend/images/paths/wordpress_40x40@2x.png') }}"
                                                 width="40"
                                                 height="40"
                                                 alt="Angular"
                                                 class="rounded">
                                            <span class="overlay__content overlay__content-transparent">
                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                    <small class="h6 small text-white mb-0"
                                                           style="font-weight: 500;">80%</small>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="card-title">WordPress</div>
                                        <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                </div>
                            </div>

                            <a href="student-path.html"
                               class="ml-4pt btn btn-sm btn-link text-secondary">Resume</a>

                        </div>

                    </div>
                </div>

                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-left mr-12pt">
                            <img src="{{ asset('backend/images/paths/wordpress_40x40@2x.png') }}"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                        </div>
                        <div class="media-body">
                            <div class="card-title">WordPress</div>
                            <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                        </div>
                    </div>

                    <p class="mt-16pt text-70">WordPress is open source software you can use to create a beautiful website, blog, or app.</p>

                    <div class="my-32pt">
                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                            <div class="d-flex align-items-center mr-8pt">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="student-path.html"
                               class="btn btn-primary mr-8pt">Resume</a>
                            <a href="student-path.html"
                               class="btn btn-outline-secondary ml-0">Start over</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <small class="text-50 mr-8pt">Your rating</small>
                        <div class="rating mr-8pt">
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                        </div>
                        <small class="text-50">4/5</small>
                    </div>
                </div>

            </div>

            <div class="col-sm-4 card-group-row__col">

                <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                     data-toggle="popover"
                     data-trigger="click">

                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <div class="flex">
                                <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                        <div class="overlay">
                                            <img src="{{ asset('backend/images/paths/devops_40x40@2x.png') }}"
                                                 width="40"
                                                 height="40"
                                                 alt="Angular"
                                                 class="rounded">
                                            <span class="overlay__content overlay__content-transparent">
                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                    <small class="h6 small text-white mb-0"
                                                           style="font-weight: 500;">80%</small>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="card-title">Dev Ops</div>
                                        <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                </div>
                            </div>

                            <a href="student-path.html"
                               class="ml-4pt btn btn-sm btn-link text-secondary">Resume</a>

                        </div>

                    </div>
                </div>

                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-left mr-12pt">
                            <img src="{{ asset('backend/images/paths/devops_40x40@2x.png') }}"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                        </div>
                        <div class="media-body">
                            <div class="card-title">Dev Ops</div>
                            <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                        </div>
                    </div>

                    <p class="mt-16pt text-70">Learn the fundamentals of working with Dev Ops and how to create basic applications.</p>

                    <div class="my-32pt">
                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                            <div class="d-flex align-items-center mr-8pt">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="student-path.html"
                               class="btn btn-primary mr-8pt">Resume</a>
                            <a href="student-path.html"
                               class="btn btn-outline-secondary ml-0">Start over</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <small class="text-50 mr-8pt">Your rating</small>
                        <div class="rating mr-8pt">
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                        </div>
                        <small class="text-50">4/5</small>
                    </div>
                </div>

            </div>

            <div class="col-sm-4 card-group-row__col">

                <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                     data-toggle="popover"
                     data-trigger="click">

                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <div class="flex">
                                <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                        <div class="overlay">
                                            <img src="{{ asset('backend/images/paths/redis_40x40@2x.png') }}"
                                                 width="40"
                                                 height="40"
                                                 alt="Angular"
                                                 class="rounded">
                                            <span class="overlay__content overlay__content-transparent">
                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                    <small class="h6 small text-white mb-0"
                                                           style="font-weight: 500;">80%</small>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="card-title">Redis</div>
                                        <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                    </div>
                                </div>
                            </div>

                            <a href="student-path.html"
                               class="ml-4pt btn btn-sm btn-link text-secondary">Resume</a>

                        </div>

                    </div>
                </div>

                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-left mr-12pt">
                            <img src="{{ asset('backend/images/paths/redis_40x40@2x.png') }}"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                        </div>
                        <div class="media-body">
                            <div class="card-title">Redis</div>
                            <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                        </div>
                    </div>

                    <p class="mt-16pt text-70">Learn the fundamentals of working with Redis and how to create basic applications.</p>

                    <div class="my-32pt">
                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                            <div class="d-flex align-items-center mr-8pt">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="student-path.html"
                               class="btn btn-primary mr-8pt">Resume</a>
                            <a href="student-path.html"
                               class="btn btn-outline-secondary ml-0">Start over</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <small class="text-50 mr-8pt">Your rating</small>
                        <div class="rating mr-8pt">
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                        </div>
                        <small class="text-50">4/5</small>
                    </div>
                </div>

            </div>

        </div>

        <div class="mb-32pt">

            <ul class="pagination justify-content-start pagination-xsm m-0">
                <li class="page-item disabled">
                    <a class="page-link"
                       href="#"
                       aria-label="Previous">
                        <span aria-hidden="true"
                              class="material-icons">chevron_left</span>
                        <span>Prev</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Page 1">
                        <span>1</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Page 2">
                        <span>2</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Next">
                        <span>Next</span>
                        <span aria-hidden="true"
                              class="material-icons">chevron_right</span>
                    </a>
                </li>
            </ul>

        </div>

        <div class="page-separator">
            <div class="page-separator__text">Development Courses</div>
        </div>

        <div class="row card-group-row">

            <div class="col-lg-3 card-group-row__col">

                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                     data-toggle="popover"
                     data-trigger="click">

                    <a href="student-take-course.html"
                       class="card-img-top js-image"
                       data-position=""
                       data-height="140">
                        <img src="{{ asset('backend/images/paths/angular_430x168.png') }}"
                             alt="course">
                        <span class="overlay__content">
                            <span class="overlay__action d-flex flex-column text-center">
                                <i class="material-icons icon-32pt">play_circle_outline</i>
                                <span class="card-title text-white">Resume</span>
                            </span>
                        </span>
                    </a>

                    <span class="corner-ribbon corner-ribbon--default-right-top corner-ribbon--shadow bg-accent text-white">NEW</span>

                    <div class="card-body flex">
                        <div class="d-flex">
                            <div class="flex">
                                <a class="card-title"
                                   href="student-take-course.html">Learn Angular fundamentals</a>
                                <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                            </div>
                            <a href="student-take-course.html"
                               data-toggle="tooltip"
                               data-title="Add Favorite"
                               data-placement="top"
                               data-boundary="window"
                               class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                        </div>
                        <div class="d-flex">
                            <div class="rating flex">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                            <!-- <small class="text-50">6 hours</small> -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-left mr-12pt">
                            <img src="{{ asset('backend/images/paths/angular_40x40@2x.png') }}"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                        </div>
                        <div class="media-body">
                            <div class="card-title mb-0">Learn Angular fundamentals</div>
                            <p class="lh-1 mb-0">
                                <span class="text-50 small">with</span>
                                <span class="text-50 small font-weight-bold">Elijah Murray</span>
                            </p>
                        </div>
                    </div>

                    <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>

                    <div class="mb-16pt">
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                        </div>
                    </div>

                    <div class="my-32pt">
                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                            <div class="d-flex align-items-center mr-8pt">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="student-take-lesson.html"
                               class="btn btn-primary mr-8pt">Resume</a>
                            <a href="student-take-course.html"
                               class="btn btn-outline-secondary ml-0">Start over</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <small class="text-50 mr-8pt">Your rating</small>
                        <div class="rating mr-8pt">
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                        </div>
                        <small class="text-50">4/5</small>
                    </div>

                </div>

            </div>

            <div class="col-lg-3 card-group-row__col">

                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                     data-toggle="popover"
                     data-trigger="click">

                    <a href="student-take-course.html"
                       class="card-img-top js-image"
                       data-position=""
                       data-height="140">
                        <img src="{{ asset('backend/images/paths/swift_430x168.png') }}"
                             alt="course">
                        <span class="overlay__content">
                            <span class="overlay__action d-flex flex-column text-center">
                                <i class="material-icons icon-32pt">play_circle_outline</i>
                                <span class="card-title text-white">Resume</span>
                            </span>
                        </span>
                    </a>

                    <div class="card-body flex">
                        <div class="d-flex">
                            <div class="flex">
                                <a class="card-title"
                                   href="student-take-course.html">Build an iOS Application in Swift</a>
                                <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                            </div>
                            <a href="student-take-course.html"
                               data-toggle="tooltip"
                               data-title="Remove Favorite"
                               data-placement="top"
                               data-boundary="window"
                               class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite</a>
                        </div>
                        <div class="d-flex">
                            <div class="rating flex">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                            <!-- <small class="text-50">6 hours</small> -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-left mr-12pt">
                            <img src="{{ asset('backend/images/paths/swift_40x40@2x.png') }}"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                        </div>
                        <div class="media-body">
                            <div class="card-title mb-0">Build an iOS Application in Swift</div>
                            <p class="lh-1 mb-0">
                                <span class="text-50 small">with</span>
                                <span class="text-50 small font-weight-bold">Elijah Murray</span>
                            </p>
                        </div>
                    </div>

                    <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>

                    <div class="mb-16pt">
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                        </div>
                    </div>

                    <div class="my-32pt">
                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                            <div class="d-flex align-items-center mr-8pt">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="student-take-lesson.html"
                               class="btn btn-primary mr-8pt">Resume</a>
                            <a href="student-take-course.html"
                               class="btn btn-outline-secondary ml-0">Start over</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <small class="text-50 mr-8pt">Your rating</small>
                        <div class="rating mr-8pt">
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                        </div>
                        <small class="text-50">4/5</small>
                    </div>

                </div>

            </div>

            <div class="col-lg-3 card-group-row__col">

                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                     data-toggle="popover"
                     data-trigger="click">

                    <a href="student-take-course.html"
                       class="card-img-top js-image"
                       data-position=""
                       data-height="140">
                        <img src="{{ asset('backend/images/paths/wordpress_430x168.png') }}"
                             alt="course">
                        <span class="overlay__content">
                            <span class="overlay__action d-flex flex-column text-center">
                                <i class="material-icons icon-32pt">play_circle_outline</i>
                                <span class="card-title text-white">Resume</span>
                            </span>
                        </span>
                    </a>

                    <div class="card-body flex">
                        <div class="d-flex">
                            <div class="flex">
                                <a class="card-title"
                                   href="student-take-course.html">Build a WordPress Website</a>
                                <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                            </div>
                            <a href="student-take-course.html"
                               data-toggle="tooltip"
                               data-title="Add Favorite"
                               data-placement="top"
                               data-boundary="window"
                               class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                        </div>
                        <div class="d-flex">
                            <div class="rating flex">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                            <!-- <small class="text-50">6 hours</small> -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-left mr-12pt">
                            <img src="{{ asset('backend/images/paths/wordpress_40x40@2x.png') }}"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                        </div>
                        <div class="media-body">
                            <div class="card-title mb-0">Build a WordPress Website</div>
                            <p class="lh-1 mb-0">
                                <span class="text-50 small">with</span>
                                <span class="text-50 small font-weight-bold">Elijah Murray</span>
                            </p>
                        </div>
                    </div>

                    <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>

                    <div class="mb-16pt">
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                        </div>
                    </div>

                    <div class="my-32pt">
                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                            <div class="d-flex align-items-center mr-8pt">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="student-take-lesson.html"
                               class="btn btn-primary mr-8pt">Resume</a>
                            <a href="student-take-course.html"
                               class="btn btn-outline-secondary ml-0">Start over</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <small class="text-50 mr-8pt">Your rating</small>
                        <div class="rating mr-8pt">
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                        </div>
                        <small class="text-50">4/5</small>
                    </div>

                </div>

            </div>

            <div class="col-lg-3 card-group-row__col">

                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                     data-toggle="popover"
                     data-trigger="click">

                    <a href="student-take-course.html"
                       class="card-img-top js-image"
                       data-position="left"
                       data-height="140">
                        <img src="{{ asset('backend/images/paths/react_430x168.png') }}"
                             alt="course">
                        <span class="overlay__content">
                            <span class="overlay__action d-flex flex-column text-center">
                                <i class="material-icons icon-32pt">play_circle_outline</i>
                                <span class="card-title text-white">Resume</span>
                            </span>
                        </span>
                    </a>

                    <div class="card-body flex">
                        <div class="d-flex">
                            <div class="flex">
                                <a class="card-title"
                                   href="student-take-course.html">Become a React Native Developer</a>
                                <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                            </div>
                            <a href="student-take-course.html"
                               data-toggle="tooltip"
                               data-title="Add Favorite"
                               data-placement="top"
                               data-boundary="window"
                               class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                        </div>
                        <div class="d-flex">
                            <div class="rating flex">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                            <!-- <small class="text-50">6 hours</small> -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-left mr-12pt">
                            <img src="{{ asset('backend/images/paths/react_40x40@2x.png') }}"
                                 width="40"
                                 height="40"
                                 alt="Angular"
                                 class="rounded">
                        </div>
                        <div class="media-body">
                            <div class="card-title mb-0">Become a React Native Developer</div>
                            <p class="lh-1 mb-0">
                                <span class="text-50 small">with</span>
                                <span class="text-50 small font-weight-bold">Elijah Murray</span>
                            </p>
                        </div>
                    </div>

                    <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>

                    <div class="mb-16pt">
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                            <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                        </div>
                    </div>

                    <div class="my-32pt">
                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                            <div class="d-flex align-items-center mr-8pt">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="student-take-lesson.html"
                               class="btn btn-primary mr-8pt">Resume</a>
                            <a href="student-take-course.html"
                               class="btn btn-outline-secondary ml-0">Start over</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <small class="text-50 mr-8pt">Your rating</small>
                        <div class="rating mr-8pt">
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                        </div>
                        <small class="text-50">4/5</small>
                    </div>

                </div>

            </div>

        </div>

        <div class="mb-32pt">

            <ul class="pagination justify-content-start pagination-xsm m-0">
                <li class="page-item disabled">
                    <a class="page-link"
                       href="#"
                       aria-label="Previous">
                        <span aria-hidden="true"
                              class="material-icons">chevron_left</span>
                        <span>Prev</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Page 1">
                        <span>1</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Page 2">
                        <span>2</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Next">
                        <span>Next</span>
                        <span aria-hidden="true"
                              class="material-icons">chevron_right</span>
                    </a>
                </li>
            </ul>

        </div>



        <div class="page-separator">
            <div class="page-separator__text">Achievements</div>
        </div>

        <div class="page-heading">
        <h4>Achievements</h4>
        <a
        href=""
        class="text-underline ml-sm-auto">My achievements</a>
        </div>

        <div class="position-relative carousel-card">
            <div class="js-mdk-carousel row d-block"
                 id="carousel-achievements">

                <a class="carousel-control-next js-mdk-carousel-control"
                   href="#carousel-achievements"
                   role="button"
                   data-slide="next">
                    <span class="carousel-control-icon material-icons"
                          aria-hidden="true">keyboard_arrow_right</span>
                    <span class="sr-only">Next</span>
                </a>

                <div class="mdk-carousel__content">

                    <div class="col-12 col-sm-6">

                        <a class="card border-0 mb-0"
                           href="">
                            <img src="{{ asset('backend/images/achievements/flinto.png') }}"
                                 alt="Flinto"
                                 class="card-img"
                                 style="max-height: 100%; width: initial;">
                            <div class="fullbleed bg-primary"
                                 style="opacity: .5;"></div>
                            <span class="card-body d-flex flex-column align-items-center justify-content-center fullbleed">
                                <span class="row flex-nowrap">
                                    <span class="col-auto text-center d-flex flex-column justify-content-center align-items-center">
                                        <span class="h5 text-white text-uppercase font-weight-normal m-0 d-block">Achievement</span>
                                        <span class="text-white-60 d-block mb-24pt">Jun 5, 2018</span>
                                    </span>
                                    <span class="col d-flex flex-column">
                                        <span class="text-right flex mb-16pt">
                                            <img src="{{ asset('backend/images/paths/flinto_40x40@2x.png') }}"
                                                 width="64"
                                                 alt="Flinto"
                                                 class="rounded">
                                        </span>
                                    </span>
                                </span>
                                <span class="row flex-nowrap">
                                    <span class="col-auto text-center d-flex flex-column justify-content-center align-items-center">
                                        <img src="{{ asset('backend/images/illustration/achievement/128/white.png') }}"
                                             width="64"
                                             alt="achievement">
                                    </span>
                                    <span class="col d-flex flex-column">
                                        <span>
                                            <span class="card-title text-white mb-4pt d-block">Flinto</span>
                                            <span class="text-white-60">Introduction to The App Design Application</span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>

                    </div>

                    <div class="col-12 col-sm-6">

                        <a class="card border-0 mb-0"
                           href="">
                            <img src="{{ asset('backend/images/achievements/angular.png') }}"
                                 alt="Angular fundamentals"
                                 class="card-img"
                                 style="max-height: 100%; width: initial;">
                            <div class="fullbleed bg-primary"
                                 style="opacity: .5;"></div>
                            <span class="card-body d-flex flex-column align-items-center justify-content-center fullbleed">
                                <span class="row flex-nowrap">
                                    <span class="col-auto text-center d-flex flex-column justify-content-center align-items-center">
                                        <span class="h5 text-white text-uppercase font-weight-normal m-0 d-block">Achievement</span>
                                        <span class="text-white-60 d-block mb-24pt">Jun 5, 2018</span>
                                    </span>
                                    <span class="col d-flex flex-column">
                                        <span class="text-right flex mb-16pt">
                                            <img src="{{ asset('backend/images/paths/angular_64x64.png') }}"
                                                 width="64"
                                                 alt="Angular fundamentals"
                                                 class="rounded">
                                        </span>
                                    </span>
                                </span>
                                <span class="row flex-nowrap">
                                    <span class="col-auto text-center d-flex flex-column justify-content-center align-items-center">
                                        <img src="{{ asset('backend/images/illustration/achievement/128/white.png') }}"
                                             width="64"
                                             alt="achievement">
                                    </span>
                                    <span class="col d-flex flex-column">
                                        <span>
                                            <span class="card-title text-white mb-4pt d-block">Angular fundamentals</span>
                                            <span class="text-white-60">Creating and Communicating Between Angular Components</span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


@endsection
