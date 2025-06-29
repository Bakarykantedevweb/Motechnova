<div>
    <section class="py-lg-8 py-5">
        <!-- container -->
        <div class="container my-lg-8">
            <!-- row -->
            <div class="row align-items-center">
                <!-- col -->
                <div class="col-lg-6 mb-6 mb-lg-0">
                    <div>
                        <!-- heading -->
                        <h5 class="text-dark mb-4">
                            <i
                                class="fe fe-check icon-xxs icon-shape bg-light-success text-success rounded-circle me-2"></i>
                            La plateforme éducative la plus fiable
                        </h5>
                        <!-- heading -->
                        <h1 class="display-3 fw-bold mb-3">Développez vos compétences et faites progresser votre carrière
                        </h1>
                        <!-- para -->
                        <p class="pe-lg-10 mb-5">
                            Démarrez, changez ou faites progresser votre carrière avec plus de 5 000 cours, certificats
                            professionnels et diplômes d'universités et d'entreprises de renommée mondiale.
                        </p>
                        <!-- btn -->
                        <a href="#" class="btn btn-primary">Rejoignez-nous gratuitement maintenant</a>
                        {{-- <a href="https://www.youtube.com/watch?v=Nfzi7034Kbg" class="glightbox fs-4 text-inherit ms-3">
                            <img src="assets/images/svg/play-btn.svg" alt="play" class="me-2" />
                            Watch Demo
                        </a> --}}
                    </div>
                </div>
                <!-- col -->
                <div class="col-lg-6 d-flex justify-content-center">
                    <!-- images -->
                    <div class="position-relative">
                        <img src="assets/images/background/acedamy-img/bg-thumb.svg" alt="img" />
                        <img src="assets/images/background/acedamy-img/girl-image.png" alt="girl"
                            class="w-100 w-md-auto position-absolute end-0 bottom-0" />
                        <img src="assets/images/background/acedamy-img/frame-1.svg" alt="frame"
                            class="position-absolute top-0 ms-n8 d-none d-md-inline-block" />
                        <img src="assets/images/background/acedamy-img/frame-2.svg" alt="frame"
                            class="position-absolute bottom-0 start-0 ms-lg-n8 ms-n6 mb-n7 d-none d-md-inline-block" />
                        <img src="assets/images/background/acedamy-img/target.svg" alt="target"
                            class="position-absolute bottom-0 mb-8 ms-n8 ms-lg-n1 d-none d-md-inline-block" />
                        <img src="assets/images/background/acedamy-img/sound.svg" alt="sound"
                            class="position-absolute top-50 mt-n8 ms-n8 d-none d-md-inline-block"
                            style="left: -100px" />
                        <img src="assets/images/background/acedamy-img/trophy.svg" alt="trophy"
                            class="position-absolute top-0 start-0 ms-n8 d-none d-md-inline-block" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- container -->
    <section class="pb-8">
        <div class="container mb-lg-8">
            <!-- row -->
            <div class="row">
                <div class="col-md-6 col-lg-3 border-top-md border-bottom border-end-md">
                    <!-- text -->
                    <div class="py-7 text-center">
                        <div class="mb-3">
                            <i class="fe fe-award fs-2 text-info"></i>
                        </div>
                        <div class="lh-1">
                            <h2 class="mb-1">316,000+</h2>
                            <span>Qualified Instructor</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 border-top-md border-bottom border-end-lg">
                    <!-- icon -->
                    <div class="py-7 text-center">
                        <div class="mb-3">
                            <i class="fe fe-users fs-2 text-warning"></i>
                        </div>
                        <!-- text -->
                        <div class="lh-1">
                            <h2 class="mb-1">1.8 Billion+</h2>
                            <span>Course enrolments</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 border-top-lg border-bottom border-end-md">
                    <!-- icon -->
                    <div class="py-7 text-center">
                        <div class="mb-3">
                            <i class="fe fe-tv fs-2 text-primary"></i>
                        </div>
                        <!-- text -->
                        <div class="lh-1">
                            <h2 class="mb-1">41,000+</h2>
                            <span>Courses in 42 languages</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 border-top-lg border-bottom">
                    <!-- icon -->
                    <div class="py-7 text-center">
                        <div class="mb-3">
                            <i class="fe fe-film fs-2 text-success"></i>
                        </div>
                        <!-- text -->
                        <div class="lh-1">
                            <h2 class="mb-1">179,000+</h2>
                            <span>Online Videos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <!-- row -->
        <div class="container mb-lg-8">
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <div class="mb-6">
                        <h2 class="mb-1 h1">Cours les plus populaires</h2>
                        <p>Voici les cours les plus populaires parmi les apprenants de LearnX Cours dans le monde entier
                            en
                            2025
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Tab content -->
                    <div class="tab-content" id="pills-tabContent">
                        <!-- tab content -->
                        <div class="tab-pane fade show active" id="pills-development" role="tabpanel"
                            aria-labelledby="pills-development-tab">
                            <!-- row -->

                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                                @forelse ($formations as $formation)
                                    <div class="col">
                                        <!-- Card -->
                                        <div class="card card-hover">
                                            @if ($formation->payante == 'Oui')
                                                <a href="{{ url('formations/' . $formation->nom) }}"><img
                                                        src="{{ asset($formation->image) }}" alt="course"
                                                        class="card-img-top" />
                                                </a>
                                            @else
                                                <a href="{{ url('formations/' . $formation->nom.'/free') }}"><img
                                                        src="{{ asset($formation->image) }}" alt="course"
                                                        class="card-img-top" />
                                                </a>
                                            @endif
                                            <!-- Card Body -->
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <span
                                                        class="badge bg-info-soft">{{ $formation->categorie->nom }}</span>
                                                    <a href="#" class="fs-5"><i
                                                            class="fe fe-heart align-middle"></i></a>
                                                </div>
                                                <h4 class="mb-2 text-truncate-line-2">
                                                    @if ($formation->payante == 'Oui')
                                                        <a href="{{ url('formations/' . $formation->nom) }}" class="text-inherit">{{ $formation->nom }}</a>
                                                    @else
                                                        <a href="{{ url('formations/' . $formation->nom.'/free') }}" class="text-inherit">{{ $formation->nom }}</a>
                                                    @endif
                                                </h4>

                                                <small>Publiée par :
                                                    {{ $formation->formateur->nom . ' ' . $formation->formateur->prenom }}</small>
                                            </div>
                                            <!-- Card Footer -->
                                            @if ($formation->payante == 'Oui')
                                                <div class="card-footer">
                                                    <div class="row align-items-center g-0">
                                                        <div class="col">
                                                            <h5 class="mb-0">
                                                                {{ number_format($formation->prix_original, 0, ',', ' ') }}
                                                                FCFA</h5>
                                                        </div>

                                                        <div class="col-auto">
                                                            <s>{{ number_format($formation->prix_promotion, 0, ',', ' ') }}
                                                                FCFA</s>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <h1>Pas de formations disponible</h1>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section -->
    <section class="my-8 py-lg-8">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row align-items-center bg-primary gx-0 rounded-3">
                <!-- col -->
                <div class="col-lg-6 col-12 d-none d-lg-block">
                    <div class="d-flex justify-content-center">
                        <!-- img -->
                        <div class="position-relative">
                            <img src="assets/images/png/cta-instructor-1.png" alt="image"
                                class="img-fluid mt-n8" />
                            <div class="ms-n8 position-absolute bottom-0 start-0 mb-6">
                                <img src="assets/images/svg/dollor.svg" alt="dollor" />
                            </div>
                            <!-- img -->
                            <div class="me-n4 position-absolute top-0 end-0">
                                <img src="assets/images/svg/graph.svg" alt="graph" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="text-white p-5 p-lg-0">
                        <!-- text -->
                        <h2 class="h1 text-white">Become an instructor today</h2>
                        <p class="mb-0">Instructors from around the world teach millions of students on Geeks.
                            We provide the tools and skills to teach what you love.</p>
                        <a href="#" class="btn btn-white mt-4">Start Teaching Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section -->
    <section class="bg-gray-200 pt-8 pb-8">
        <div class="container pb-8">
            <!-- row -->
            <div class="row mb-lg-8 mb-5">
                <div class="offset-lg-1 col-lg-10 col-12">
                    <div class="row align-items-center">
                        <!-- col -->
                        <div class="col-lg-6 col-md-8">
                            <!-- rating -->
                            <div>
                                <div class="mb-3">
                                    <span class="lh-1">
                                        <span class="text-dark fw-semibold">4.5/5.0</span>
                                        <span class="align-text-top ms-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="text-warning">5</span>
                                    <span class="ms-2">(Based on 3265 ratings)</span>
                                </div>
                                <!-- heading -->
                                <h2 class="h1">What our customers say</h2>
                                <p class="mb-0">
                                    Hear from
                                    <span class="text-dark">teachers</span>
                                    ,
                                    <span class="text-dark">trainers</span>
                                    , and
                                    <span class="text-dark">leaders</span>
                                    in the learning space about how Geeks empowers them to provide quality online
                                    learning experiences.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 text-md-end mt-4 mt-md-0">
                            <!-- btn -->
                            <a href="#" class="btn btn-primary">View Reviews</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-12">
                    <div class="position-relative">
                        <!-- controls -->

                        <!-- slider -->
                        <div class="sliderTestimonial">
                            <!-- item -->
                            <div class="item">
                                <div class="card">
                                    <div class="card-body text-center p-6">
                                        <!-- img -->
                                        <img src="assets/images/avatar/avatar-1.jpg" alt="avatar"
                                            class="avatar avatar-lg rounded-circle" />
                                        <p class="mb-0 mt-3">
                                            “The generated lorem Ipsum is therefore always free from repetition,
                                            injected humour, or words etc generate lorem Ipsum which looks
                                            racteristic
                                            reasonable.”
                                        </p>
                                        <!-- rating -->
                                        <div class="lh-1 mb-3 mt-4">
                                            <span class="fs-6 align-top">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="text-warning">5</span>
                                            <!-- text -->
                                        </div>
                                        <h3 class="mb-0 h4">Gladys Colbert</h3>
                                        <span>Software Engineer at Palantir</span>
                                    </div>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="item">
                                <div class="card">
                                    <div class="card-body text-center p-6">
                                        <!-- img -->
                                        <img src="assets/images/avatar/avatar-2.jpg" alt="avatar"
                                            class="avatar avatar-lg rounded-circle" />
                                        <p class="mb-0 mt-3">
                                            “Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                            posuere cubilia curae; Proin nec justo risus. Quisque ornare nisl eu mi
                                            fermentum”
                                        </p>
                                        <!-- rating -->
                                        <div class="lh-1 mb-3 mt-4">
                                            <span class="fs-6 align-top">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="text-warning">3.5</span>
                                        </div>
                                        <!-- text -->
                                        <h3 class="mb-0 h4">Lisa D. Roloff</h3>
                                        <span>Web Developer at Codescandy</span>
                                    </div>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="item">
                                <div class="card">
                                    <div class="card-body text-center p-6">
                                        <!-- img -->
                                        <img src="assets/images/avatar/avatar-3.jpg" alt="avatar"
                                            class="avatar avatar-lg rounded-circle" />
                                        <p class="mb-0 mt-3">
                                            “Praesent aliquet diam a ligula imperdiet commodo. Donec eleifend, orci
                                            et accumsan interdum, ipsum leo porta velit, a placerat neque ex id
                                            est.”
                                        </p>
                                        <!-- rating -->
                                        <div class="lh-1 mb-3 mt-4">
                                            <span class="fs-6 align-top">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="text-warning">4.0</span>
                                        </div>
                                        <!-- text -->
                                        <h3 class="mb-0 h4">Leigh F. Keller</h3>
                                        <span>Marketing Manager at EaseTemplate</span>
                                    </div>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="item">
                                <div class="card">
                                    <div class="card-body text-center p-6">
                                        <!-- img -->
                                        <img src="assets/images/avatar/avatar-4.jpg" alt="avatar"
                                            class="avatar avatar-lg rounded-circle" />
                                        <p class="mb-0 mt-3">
                                            “The generated lorem Ipsum is therefore always free from repetition,
                                            injected humour, or words etc generate lorem Ipsum which looks
                                            racteristic
                                            reasonable.”
                                        </p>
                                        <!-- rating -->
                                        <div class="lh-1 mb-3 mt-4">
                                            <span class="fs-6 align-top">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="text-warning">5.0</span>
                                        </div>
                                        <!-- text -->
                                        <h3 class="mb-0 h4">Gladys Colbert</h3>
                                        <span>Software Engineer at Palantir</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body text-center p-6">
                                        <!-- img -->
                                        <img src="assets/images/avatar/avatar-5.jpg" alt="avatar"
                                            class="avatar avatar-lg rounded-circle" />
                                        <p class="mb-0 mt-3">
                                            “Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                            posuere cubilia curae; Proin nec justo risus. Quisque ornare nisl eu mi
                                            fermentum”
                                        </p>
                                        <div class="lh-1 mb-3 mt-4">
                                            <!-- rating -->
                                            <span class="fs-6 align-top">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="text-warning">3.5</span>
                                        </div>
                                        <!-- text -->
                                        <h3 class="mb-0 h4">Lisa D. Roloff</h3>
                                        <span>Web Developer at Codescandy</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body text-center p-6">
                                        <!-- img -->
                                        <img src="assets/images/avatar/avatar-6.jpg" alt="avatar"
                                            class="avatar avatar-lg rounded-circle" />
                                        <p class="mb-0 mt-3">
                                            “Praesent aliquet diam a ligula imperdiet commodo. Donec eleifend, orci
                                            et accumsan interdum, ipsum leo porta velit, a placerat neque ex id
                                            est.”
                                        </p>
                                        <!-- rating -->
                                        <div class="lh-1 mb-3 mt-4">
                                            <span class="fs-6 align-top">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="text-warning">4.5</span>
                                        </div>
                                        <!-- text -->
                                        <h3 class="mb-0 h4">Leigh F. Keller</h3>
                                        <span>Marketing Manager at EaseTemplate</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="controls-testimonial controls" id="sliderTestimonialControls">
                            <li class="prev">
                                <i class="fe fe-chevron-left"></i>
                            </li>
                            <li class="next ms-2">
                                <i class="fe fe-chevron-right"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
