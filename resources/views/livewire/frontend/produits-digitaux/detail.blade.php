<div>
    <section class="pt-5">
        <div class="container" data-sticky-container>
            <div class="row g-4 g-sm-5">

                <!-- Left sidebar START -->
                <div class="col-xl-4">
                    <div data-sticky data-margin-top="80" data-sticky-for="992">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-xl-12">

                                <!-- Card START -->
                                <div class="card shadow">
                                    <!-- Image -->
                                    <div class="rounded-3">
                                        <img src="{{ asset($produit->image) }}" class="card-img-top" alt="book image">
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body pb-3">
                                        <!-- Buttons and price -->
                                        <div class="text-center">
                                            @if (Auth::guard('etudiant')->check())
                                                <!-- Buttons -->
                                                <button type="button" wire:click="ajouterPanier({{ $produit->id }})"
                                                    class="btn btn-primary-soft mb-2 mb-sm-0 me-00 me-sm-3"><i
                                                        class="bi bi-cart3 me-2"></i>Ajouter au panier</button>
                                            @else
                                                <!-- Buttons -->
                                                <a href="{{ url('etudiant/login') }}"
                                                    class="btn btn-primary-soft mb-2 mb-sm-0 me-00 me-sm-3"><i
                                                        class="bi bi-box-arrow-in-right me-2"></i>Se Connecter</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Card END -->

                            </div>
                        </div> <!-- Row End -->
                    </div>
                </div>
                <!-- Left sidebar END -->

                <!-- Main content START -->
                <div class="col-xl-8">

                    <!-- Title -->
                    <h1 class="mb-4">{{ $produit->titre }}</h1>
                    <!-- Price Item START -->
                    <ul class="list-inline mb-4">
                        <!-- Price -->
                        <li class="list-inline-item">
                            <input type="radio" class="btn-check" name="options" id="option1" checked>
                            <label class="btn btn-success-soft-check" for="option1">
                                <span class="mb-2 h6 fw-light">Prix</span>
                                <!-- Price and discount -->
                                <span class="d-flex align-items-center">
                                    <span class="mb-0 h5 me-2 text-success">
                                        {{ number_format($produit->prix, 0, ',', ' ') }} F</span>
                                </span>
                            </label>
                        </li>

                    </ul>
                    <!-- Price Item END -->

                    <!-- Content -->
                    <h4>Description</h4>
                    <p>
                        {{ $produit->description }}
                    </p>

                    <!-- Book detail START -->
                    <div class="col-12">
                        <!-- Tabs START -->
                        <ul class="nav nav-pills nav-pills-bg-soft px-3" id="book-pills-tab" role="tablist">
                            <!-- Tab item -->
                            <li class="nav-item me-2 me-sm-4" role="presentation">
                                <button class="nav-link mb-0 active" id="book-pills-tab-1" data-bs-toggle="pill"
                                    data-bs-target="#book-pills-1" type="button" role="tab"
                                    aria-controls="book-pills-1" aria-selected="true">Createur</button>
                            </li>
                            <!-- Tab item -->
                            <li class="nav-item me-2 me-sm-4" role="presentation">
                                <button class="nav-link mb-0" id="book-pills-tab-2" data-bs-toggle="pill"
                                    data-bs-target="#book-pills-2" type="button" role="tab"
                                    aria-controls="book-pills-2" aria-selected="false">Avis</button>
                            </li>
                        </ul>
                        <!-- Tabs END -->

                        <!-- Tab contents START -->
                        <div class="tab-content pt-4 px-3" id="book-pills-tabContent">
                            <!-- Content START -->
                            <div class="tab-pane fade show active" id="book-pills-1" role="tabpanel"
                                aria-labelledby="book-pills-tab-1">
                                <div class="row g-4">
                                    <div class="col-md-3">
                                        <img src="{{ asset('uploads/formateur/' . $produit->formateur->photo) }}"
                                            class="rounded-3" alt>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-sm-flex justify-content-sm-between">

                                            <!-- Title -->
                                            <div class="mb-3">
                                                <h3 class="mb-0">
                                                    {{ $produit->formateur->prenom . ' ' . $produit->formateur->nom }}
                                                </h3>
                                            </div>

                                            <!-- Social icon -->
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a class="mb-0 me-1 text-facebook" href="#"><i
                                                            class="fab fa-fw fa-facebook-f"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="mb-0 me-1 text-instagram-gradient" href="#"><i
                                                            class="fab fa-fw fa-instagram"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="mb-0 me-1 text-twitter" href="#"><i
                                                            class="fab fa-fw fa-twitter"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="mb-0 text-linkedin" href="#"><i
                                                            class="fab fa-fw fa-linkedin-in"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Content -->
                                        <p class="mt-3 mt-sm-0 mb-0">
                                            {{ \Illuminate\Support\Str::limit($produit->description, 100) }}</p>
                                        <br>
                                        <a href="{{ url('formateur/' . $produit->formateur->nom . '/detail/' . encrypt($produit->formateur->id)) }}"
                                            class="btn btn-outline-primary btn-sm">Detail</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Content END -->

                            <!-- Content START -->
                            <div class="tab-pane fade" id="book-pills-2" role="tabpanel"
                                aria-labelledby="book-pills-tab-2">
                                <!-- Review START -->
                                <div class="row mb-4">
                                    <h4 class="mb-4">Tous les avis</h4>
                                    <!-- Progress-bar and star -->
                                </div>
                                <!-- Review END -->

                                <!-- Student review START -->
                                <div class="row">
                                    <!-- Review item START -->
                                    <div class="d-md-flex my-4">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-xl me-4 flex-shrink-0">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" alt="avatar">
                                        </div>
                                        <!-- Text -->
                                        <div>
                                            <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                                <h5 class="me-3 mb-0">Jacqueline Miller</h5>
                                                <!-- Review star -->
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="far fa-star text-warning"></i></li>
                                                </ul>
                                            </div>
                                            <!-- Info -->
                                            <p class="small mb-2">2 days ago</p>
                                            <p class="mb-2">Perceived end knowledge certainly day sweetness why
                                                cordially. Ask a quick six seven offer see among. Handsome met
                                                debating sir dwelling age material. As style lived he worse dried.
                                                Offered related so visitors we private removed. Moderate do
                                                subjects to distance. </p>
                                        </div>
                                    </div>
                                    <!-- Divider -->
                                    <hr>
                                    <!-- Review item END -->

                                </div>
                                <!-- Student review END -->

                                <!-- Leave Review START -->
                                <div class="mt-2">
                                    <h5 class="mb-4">Leave a Review</h5>
                                    <form class="row g-3">
                                        <!-- Name -->
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="inputtext"
                                                placeholder="Name" aria-label="First name">
                                        </div>
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" placeholder="Email"
                                                id="inputEmail4">
                                        </div>
                                        <!-- Rating -->
                                        <div class="col-12">
                                            <select id="inputState2" class="form-select  js-choice">
                                                <option selected>★★★★★ (5/5)</option>
                                                <option>★★★★☆ (4/5)</option>
                                                <option>★★★☆☆ (3/5)</option>
                                                <option>★★☆☆☆ (2/5)</option>
                                                <option>★☆☆☆☆ (1/5)</option>
                                            </select>
                                        </div>
                                        <!-- Message -->
                                        <div class="col-12">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Your review" rows="3"></textarea>
                                        </div>
                                        <!-- Button -->
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mb-0">Post
                                                Review</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Leave Review END -->

                            </div>
                            <!-- Content END -->
                        </div>
                        <!-- Tab contents END -->
                    </div>
                    <!-- Book detail END -->
                </div>
                <!-- Main content END -->
            </div> <!-- Row END -->
        </div>
    </section>
</div>
