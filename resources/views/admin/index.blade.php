@extends('layouts.admin')
@section('content')
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
                    <div>
                        <h1 class="mb-0 h2 fw-bold">Tableau de Bord</h1>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="input-group">
                            <input class="form-control flatpickr" type="text" placeholder="Select Date"
                                aria-describedby="basic-addon2" />

                            <span class="input-group-text" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                        </div>
                        <a href="#" class="btn btn-primary">Parametre</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-4">
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body d-flex flex-column gap-3">
                        <div class="d-flex align-items-center justify-content-between lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold ls-md">Ventes</span>
                            </div>
                            <div>
                                <span class="fe fe-shopping-bag fs-3 text-primary"></span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <h2 class="fw-bold mb-0">$10,800</h2>
                            {{-- <div class="d-flex flex-row gap-2">
                                <span class="text-success fw-semibold">
                                    <i class="fe fe-trending-up me-1"></i>
                                    +20.9$
                                </span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body d-flex flex-column gap-3">
                        <div class="d-flex align-items-center justify-content-between lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold ls-md">Cours</span>
                            </div>
                            <div>
                                <span class="fe fe-book-open fs-3 text-primary"></span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <h2 class="fw-bold mb-0">2,456</h2>
                            {{-- <div class="d-flex flex-row gap-2">
                                <span class="text-danger fw-semibold">120+</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body d-flex flex-column gap-3">
                        <div class="d-flex align-items-center justify-content-between lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold ls-md">Etudiants</span>
                            </div>
                            <div>
                                <span class="fe fe-users fs-3 text-primary"></span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <h2 class="fw-bold mb-0">1,22,456</h2>
                            {{-- <div class="d-flex flex-row gap-2">
                                <span class="text-success fw-semibold">
                                    <i class="fe fe-trending-up me-1"></i>
                                    +1200
                                </span>
                                <span class="fw-medium">Students</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body d-flex flex-column gap-3">
                        <div class="d-flex align-items-center justify-content-between lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold ls-md">Professeurs</span>
                            </div>
                            <div>
                                <span class="fe fe-user-check fs-3 text-primary"></span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <h2 class="fw-bold mb-0">22,786</h2>
                            {{-- <div class="d-flex flex-row gap-1">
                                <span class="text-success fw-semibold">
                                    <i class="fe fe-trending-up me-1"></i>
                                    +200
                                </span>
                                <span class="ms-1 fw-medium">Instructor</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-4">
            <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card">
                    <!-- Card header -->
                    <div
                        class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">Earnings</h4>
                        </div>
                        <div>
                            <div class="dropdown dropstart">
                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                    id="courseDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fe fe-more-vertical"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="courseDropdown1">
                                    <span class="dropdown-header">Settings</span>
                                    <a class="dropdown-item" href="#">
                                        <i class="fe fe-external-link dropdown-item-icon"></i>
                                        Export
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fe fe-mail dropdown-item-icon"></i>
                                        Email Report
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fe fe-download dropdown-item-icon"></i>
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Earning chart -->
                        <div id="earning" class="apex-charts"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card">
                    <!-- Card header -->
                    <div
                        class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">Traffic</h4>
                        </div>
                        <div>
                            <div class="dropdown dropstart">
                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                    id="courseDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fe fe-more-vertical"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="courseDropdown2">
                                    <span class="dropdown-header">Settings</span>
                                    <a class="dropdown-item" href="#">
                                        <i class="fe fe-external-link dropdown-item-icon"></i>
                                        Export
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fe fe-mail dropdown-item-icon"></i>
                                        Email Report
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fe fe-download dropdown-item-icon"></i>
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div id="traffic" class="apex-charts d-flex justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-4">
            <div class="col-xl-6 col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Card header -->
                    <div class="card-header d-flex align-items-center justify-content-between card-header-height">
                        <h4 class="mb-0">Cours récents</h4>
                        <a href="#" class="btn btn-outline-secondary btn-sm">Tout Voir</a>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- List group flush -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 pt-0">
                                <div class="row flex-column flex-md-row gap-3 gap-md-0">
                                    <!-- Col -->
                                    <div class="col-md-3 col-12">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/course/course-laravel.jpg') }}" alt=""
                                                class="img-fluid rounded" />
                                        </a>
                                    </div>
                                    <!-- Col -->
                                    <div class="col-md-8 col-10">
                                        <div class="d-flex flex-column gap-2">
                                            <a href="#">
                                                <h5 class="text-primary-hover mb-0">Revolutionize how you
                                                    build the web...</h5>
                                            </a>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('assets/images/avatar/avatar-7.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs" />
                                                <span class="fs-6">Brooklyn Simmons</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Col auto -->
                                    <div class="col-1 col-auto d-flex justify-content-center">
                                        <span class="dropdown dropstart">
                                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                role="button" id="courseDropdown3" data-bs-toggle="dropdown"
                                                data-bs-offset="-20,20" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                                                <span class="dropdown-header">Settings</span>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fe fe-edit dropdown-item-icon"></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fe fe-trash dropdown-item-icon"></i>
                                                    Remove
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <!-- List group -->
                            <li class="list-group-item px-0">
                                <div class="row flex-column flex-md-row gap-3 gap-md-0">
                                    <div class="col-md-3 col-12">
                                        <a href="#"><img src="{{ asset('assets/images/course/course-gatsby.jpg') }}"
                                                alt="" class="img-fluid rounded" /></a>
                                    </div>
                                    <div class="col-md-8 col-10">
                                        <div class="d-flex flex-column gap-2">
                                            <a href="#">
                                                <h5 class="text-primary-hover mb-0">Guide to Static Sites with
                                                    Gatsby.js</h5>
                                            </a>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('assets/images/avatar/avatar-8.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs" />
                                                <span class="fs-6">Jenny Wilson</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 col-auto d-flex justify-content-center">
                                        <span class="dropdown dropstart">
                                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                role="button" id="courseDropdown4" data-bs-toggle="dropdown"
                                                data-bs-offset="-20,20" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <span class="dropdown-menu" aria-labelledby="courseDropdown4">
                                                <span class="dropdown-header">Settings</span>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fe fe-edit dropdown-item-icon"></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fe fe-trash dropdown-item-icon"></i>
                                                    Remove
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <!-- List group -->
                            <li class="list-group-item px-0">
                                <div class="row flex-column flex-md-row gap-3 gap-md-0">
                                    <div class="col-md-3 col-12">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/course/course-javascript.jpg') }}" alt=""
                                                class="img-fluid rounded" />
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-10">
                                        <div class="d-flex flex-column gap-2">
                                            <a href="#">
                                                <h5 class="text-primary-hover mb-0">The Modern JavaScript
                                                    Courses</h5>
                                            </a>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs" />
                                                <span class="fs-6">Guy Hawkins</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 col-auto d-flex justify-content-center">
                                        <span class="dropdown dropstart">
                                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                role="button" id="courseDropdown5" data-bs-toggle="dropdown"
                                                data-bs-offset="-20,20" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <span class="dropdown-menu" aria-labelledby="courseDropdown5">
                                                <span class="dropdown-header">Settings</span>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fe fe-edit dropdown-item-icon"></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fe fe-trash dropdown-item-icon"></i>
                                                    Remove
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <!-- List group -->
                            <li class="list-group-item px-0">
                                <div class="row flex-column flex-md-row gap-3 gap-md-0">
                                    <div class="col-md-3 col-12">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/course/course-wordpress.jpg') }}" alt=""
                                                class="img-fluid rounded" />
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-10">
                                        <div class="d-flex flex-column gap-2">
                                            <a href="#">
                                                <h5 class="text-primary-hover mb-0">Online WordPress Courses
                                                    Become an Expert Today‎</h5>
                                            </a>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('assets/images/avatar/avatar-5.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs" />
                                                <span class="fs-6">Robert Fox</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 col-auto d-flex justify-content-center">
                                        <span class="dropdown dropstart">
                                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                role="button" id="courseDropdown6" data-bs-toggle="dropdown"
                                                data-bs-offset="-20,20" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <span class="dropdown-menu" aria-labelledby="courseDropdown6">
                                                <span class="dropdown-header">Settings</span>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fe fe-edit dropdown-item-icon"></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fe fe-trash dropdown-item-icon"></i>
                                                    Remove
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Card header -->
                    <div class="card-header card-header-height d-flex align-items-center">
                        <h4 class="mb-0">Activites</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- List group -->
                        <ul class="list-group list-group-flush list-timeline-activity">
                            <li class="list-group-item px-0 pt-0 border-0 mb-2">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-md avatar-indicators avatar-online">
                                            <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-6.jpg') }}"
                                                class="rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="col ms-n2">
                                        <div class="d-flex flex-column gap-1">
                                            <div>
                                                <h4 class="mb-0 h5">Dianna Smiley</h4>
                                                <p class="mb-0">Just buy the courses”Build React Application
                                                    Tutorial”</p>
                                            </div>
                                            <div>
                                                <span class="fs-6">2m ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- List group -->
                            <li class="list-group-item px-0 pt-0 border-0 mb-2">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-md avatar-indicators avatar-offline">
                                            <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-7.jpg') }}"
                                                class="rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="col ms-n2">
                                        <div class="d-flex flex-column gap-1">
                                            <div>
                                                <h4 class="mb-0 h5">Irene Hargrove</h4>
                                                <p class="mb-0">Comment on “Bootstrap Tutorial” Says “Hi,I m
                                                    irene...</p>
                                            </div>
                                            <div>
                                                <span class="fs-6">1 hour ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- List group -->
                            <li class="list-group-item px-0 pt-0 border-0 mb-2">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-md avatar-indicators avatar-busy">
                                            <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-4.jpg') }}"
                                                class="rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="col ms-n2">
                                        <div class="d-flex flex-column gap-1">
                                            <div>
                                                <h4 class="mb-0 h5">Trevor Bradle</h4>
                                                <p class="mb-0">Just share your article on Social Media..
                                                </p>
                                            </div>
                                            <div>
                                                <span class="fs-6">2 month ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0 pt-0 border-0">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-md avatar-indicators avatar-away">
                                            <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-1.jpg') }}"
                                                class="rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="col ms-n2">
                                        <div class="d-flex flex-column gap-1">
                                            <div>
                                                <h4 class="mb-0 h5">John Deo</h4>
                                                <p class="mb-0">Just buy the courses”Build React Application
                                                    Tutorial”</p>
                                            </div>
                                            <div>
                                                <span class="fs-6">2m ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
