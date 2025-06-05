<div>
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
                    <div>
                        <h1 class="mb-0 h2 fw-bold">Bonjour, {{ Auth::guard('formateur')->user()->nom }} {{ Auth::guard('formateur')->user()->prenom }}</h1>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="input-group">
                            <input class="form-control flatpickr" type="text" placeholder="Select Date"
                                aria-describedby="basic-addon2" />

                            <span class="input-group-text" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                        </div>
                        <a href="#" class="btn btn-primary">Setting</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-4">
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <div class="p-4">
                        <span class="fs-6 text-uppercase fw-semibold">Revenue</span>
                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                            $467.34
                        </h2>
                        <span class="d-flex justify-content-between align-items-center">
                            <span>Earning this month</span>
                            <span class="badge bg-success ms-2">$203.23</span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <div class="p-4">
                        <span class="fs-6 text-uppercase fw-semibold">students Enrollments</span>
                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                            12,000
                        </h2>
                        <span class="d-flex justify-content-between align-items-center">
                            <span>New this month</span>
                            <span class="badge bg-info ms-2">120+</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <div class="p-4">
                        <span class="fs-6 text-uppercase fw-semibold">Courses Rating</span>
                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                            4.80
                        </h2>
                        <span class="d-flex justify-content-between align-items-center">
                            <span>Rating this month</span>
                            <span class="badge bg-warning ms-2">10+</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
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
        </div>
        {{-- <div class="row gy-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Card header -->
                    <div class="card-header d-flex align-items-center justify-content-between card-header-height">
                        <h4 class="mb-0">Recent Courses</h4>
                        <a href="#" class="btn btn-outline-secondary btn-sm">View all</a>
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
                                            <img src="../../assets/images/course/course-laravel.jpg" alt=""
                                                class="img-fluid rounded" />
                                        </a>
                                    </div>
                                    <!-- Col -->
                                    <div class="col-md-8 col-10">
                                        <div class="d-flex flex-column gap-2">
                                            <a href="#">
                                                <h5 class="text-primary-hover mb-0">
                                                    Revolutionize how you build the web...
                                                </h5>
                                            </a>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="../../assets/images/avatar/avatar-7.jpg" alt=""
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
                                        <a href="#"><img src="../../assets/images/course/course-gatsby.jpg"
                                                alt="" class="img-fluid rounded" /></a>
                                    </div>
                                    <div class="col-md-8 col-10">
                                        <div class="d-flex flex-column gap-2">
                                            <a href="#">
                                                <h5 class="text-primary-hover mb-0">
                                                    Guide to Static Sites with Gatsby.js
                                                </h5>
                                            </a>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="../../assets/images/avatar/avatar-8.jpg" alt=""
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
                                            <img src="../../assets/images/course/course-javascript.jpg" alt=""
                                                class="img-fluid rounded" />
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-10">
                                        <div class="d-flex flex-column gap-2">
                                            <a href="#">
                                                <h5 class="text-primary-hover mb-0">
                                                    The Modern JavaScript Courses
                                                </h5>
                                            </a>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="../../assets/images/avatar/avatar-1.jpg" alt=""
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
                                            <img src="../../assets/images/course/course-wordpress.jpg" alt=""
                                                class="img-fluid rounded" />
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-10">
                                        <div class="d-flex flex-column gap-2">
                                            <a href="#">
                                                <h5 class="text-primary-hover mb-0">
                                                    Online WordPress Courses Become an Expert Today‎
                                                </h5>
                                            </a>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="../../assets/images/avatar/avatar-5.jpg" alt=""
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
        </div> --}}
    </section>
</div>
