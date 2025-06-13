<div>
    <!--hero Section-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column gap-5">
                        <div class="d-flex flex-column">
                            <h1 class="mb-0">Listes des Formations</h1>
                            <p class="mb-0">
                                Decouvrez des cours dispenses par des experts experimentes et concrets.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero Section-->
    <!--Course List-->
    <section class="py-5">
        <div class="container">
            <div class="row gy-5 gy-lg-0">
                <div class="col-xxl-3 col-lg-4 col-12">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row align-items-center justify-content-between mt-2 mb-3">
                            <div class="d-flex flex-row gap-2 align-items-center">
                                <a class="text-inherit d-none d-lg-flex gap-2" href="#">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sliders text-dark" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z" />
                                        </svg>
                                    </span>
                                    <span class="fw-semibold text-dark">Filters</span>
                                </a>
                                <a class="text-inherit d-lg-none d-flex flex-row gap-2" data-bs-toggle="offcanvas"
                                    href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-sliders text-dark" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z" />
                                        </svg>
                                    </span>
                                    <span class="fw-semibold text-dark">Filters</span>
                                </a>
                            </div>
                            <div>
                                <button id="clearButton" style="display: none" class="btn btn-light border btn-sm">
                                    <span>Clear</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="offcanvas offcanvas-start offcanvas-collapse" tabindex="-1" id="offcanvasExample"
                            aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header d-lg-none">
                                <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                                    Filtres
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body pt-0 p-lg-0">
                                <div class="d-flex flex-column gap-3">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="">
                                                <!-- Toggle -->
                                                <a class="d-flex align-items-center h4 mb-0 justify-content-between"
                                                    data-bs-toggle="collapse" href="#coursTopic" role="button"
                                                    aria-expanded="false" aria-controls="coursTopic">
                                                    <div>Categories</div>
                                                    <!-- Chevron -->
                                                    <span class="chevron-arrow ms-4">
                                                        <i class="fe fe-chevron-down fs-4"></i>
                                                    </span>
                                                </a>
                                                <!-- Row -->
                                                <!-- Collapse -->
                                                <div class="collapse show" id="coursTopic"
                                                    data-bs-parent="#courseAccordion">
                                                    <div class="d-flex flex-column">
                                                        <ul class="list-unstyled mb-1 d-flex flex-column gap-1 mt-3">
                                                            @foreach ($categories as $categorie)
                                                                <li class="d-flex flex-row gap-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input filter-checkbox"
                                                                            type="checkbox" name="flexReact"
                                                                            id="flexReact" />
                                                                        <label class="form-check-label text-secondary"
                                                                            for="flexReact">{{ $categorie->nom }}</label>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div>
                                                <!-- Toggle -->
                                                <a class="d-flex align-items-center h4 mb-0 justify-content-between"
                                                    data-bs-toggle="collapse" href="#coursPrice" role="button"
                                                    aria-expanded="false" aria-controls="coursPrice">
                                                    <div>Prix</div>
                                                    <!-- Chevron -->
                                                    <span class="chevron-arrow ms-4">
                                                        <i class="fe fe-chevron-down fs-4"></i>
                                                    </span>
                                                </a>
                                                <!-- Row -->
                                                <!-- Collapse -->
                                                <div class="collapse show" id="coursPrice"
                                                    data-bs-parent="#courseAccordion">
                                                    <ul class="list-unstyled mb-0 d-flex flex-column gap-1 mt-3">
                                                        <li class="d-flex flex-row gap-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input filter-checkbox"
                                                                    type="radio" name="flexAll" id="flexAll" />
                                                                <label class="form-check-label text-secondary"
                                                                    for="flexAll">Tous</label>
                                                            </div>
                                                        </li>
                                                        <li class="d-flex flex-row gap-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input filter-checkbox"
                                                                    type="radio" name="flexAll" id="flexFree" />
                                                                <label class="form-check-label text-secondary"
                                                                    for="flexFree">Gratuit</label>
                                                            </div>
                                                        </li>
                                                        <li class="d-flex flex-row gap-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input filter-checkbox"
                                                                    type="radio" name="flexAll" id="flexPaid" />
                                                                <label class="form-check-label text-secondary"
                                                                    for="flexPaid">Payé</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div>
                                                <!-- Toggle -->
                                                <a class="d-flex align-items-center h4 mb-0 justify-content-between"
                                                    data-bs-toggle="collapse" href="#coursSkill" role="button"
                                                    aria-expanded="false" aria-controls="coursSkill">
                                                    <div>Niveau de competence</div>
                                                    <!-- Chevron -->
                                                    <span class="chevron-arrow ms-4">
                                                        <i class="fe fe-chevron-down fs-4"></i>
                                                    </span>
                                                </a>
                                                <!-- Row -->
                                                <!-- Collapse -->
                                                <div class="collapse show" id="coursSkill"
                                                    data-bs-parent="#courseAccordion">
                                                    <ul class="list-unstyled mb-0 d-flex flex-column gap-1 mt-3">
                                                        <li class="d-flex flex-row gap-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input filter-checkbox"
                                                                    type="checkbox" value=""
                                                                    id="flexCheckAll" />
                                                                <label class="form-check-label"
                                                                    for="flexCheckAll">Tous niveaux</label>
                                                            </div>
                                                        </li>
                                                        <li class="d-flex flex-row gap-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input filter-checkbox"
                                                                    type="checkbox" value=""
                                                                    id="flexCheckBeginner" />
                                                                <label class="form-check-label"
                                                                    for="flexCheckBeginner">Débutant</label>
                                                            </div>
                                                        </li>
                                                        <li class="d-flex flex-row gap-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input filter-checkbox"
                                                                    type="checkbox" value=""
                                                                    id="flexCheckIntermediate" />
                                                                <label class="form-check-label"
                                                                    for="flexCheckIntermediate">Intermédiaire</label>
                                                            </div>
                                                        </li>
                                                        <li class="d-flex flex-row gap-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input filter-checkbox"
                                                                    type="checkbox" value=""
                                                                    id="flexCheckExpert" />
                                                                <label class="form-check-label"
                                                                    for="flexCheckExpert">Expert</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-lg-8 col-12">
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <span class="fw-semibold text-dark">20 results</span>
                            <div class="col-xl-2 col-md-4 col-6">
                                <div class="">
                                    <label for="single-select" class="visually-hidden">Sorting</label>
                                    <select id="single-select" class="form-select" data-choices>
                                        <option selected>Sorting</option>
                                        <option value="Newest">Newest</option>
                                        <option value="Free">Free</option>
                                        <option value="Most Popular">Most Popular</option>
                                        <option value="Highest Rated">Highest Rated</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-12">
                                @foreach ($formations as $formation)
                                    <div class="row g-0">
                                        <div class="col-lg-4 col-md-12">
                                            @if ($formation->payante == 'Oui')
                                                <a href="{{ url('formations/' . $formation->nom) }}">
                                                    <img src="{{ $formation->image }}" alt="figma"
                                                        class="img-fluid w-100 rounded mb-4 mb-lg-0" />
                                                </a>
                                            @else
                                                <a href="{{ url('formations/' . $formation->nom . '/free') }}">
                                                    <img src="{{ $formation->image }}" alt="figma"
                                                        class="img-fluid w-100 rounded mb-4 mb-lg-0" />
                                                </a>
                                            @endif

                                        </div>
                                        <div class="col-lg-8 col-12 ps-4">
                                            <div class="d-flex flex-column gap-3">
                                                <div class="d-flex flex-column gap-3">
                                                    <div>
                                                        <span
                                                            class="badge text-light-emphasis bg-light-subtle border border-light-subtle rounded-pill">{{ $formation->categorie->nom }}</span>
                                                    </div>

                                                    <div class="d-flex flex-column gap-2">
                                                        <h3 class="mb-0">
                                                            @if ($formation->payante == 'Oui')
                                                                <a href="{{ url('formations/' . $formation->nom) }}"
                                                                    class="text-reset">{{ $formation->nom }}</a>
                                                            @else
                                                                <a href="{{ url('formations/' . $formation->nom.'/free') }}"
                                                                    class="text-reset">{{ $formation->nom }}</a>
                                                            @endif

                                                        </h3>
                                                        <p class="mb-0">
                                                            {{ $formation->description }}.
                                                        </p>

                                                        <span class="text-gray-500">
                                                            Publiee par
                                                            <a
                                                                href="">{{ $formation->formateur->nom . ' ' . $formation->formateur->prenom }}</a>
                                                        </span>
                                                    </div>
                                                </div>
                                                @if ($formation->payante == 'Oui')
                                                    <div class="d-flex flex-row gap-2 align-items-center">
                                                        <span
                                                            class="fw-semibold text-dark">{{ number_format($formation->prix_original, 0, ',', ' ') }}
                                                            FCFA</span>
                                                        <span class="fw-semibold text-gray-400"><del>{{ number_format($formation->prix_promotion, 0, ',', ' ') }}
                                                                FCFA</del></span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                @endforeach
                                <!-- Pagination -->
                                <nav>
                                    {{ $formations->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<!--Course List-->
</div>
