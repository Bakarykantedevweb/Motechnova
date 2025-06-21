<div>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-light p-4 text-center rounded-3">
                        <h1 class="m-0">Caisse</h1>
                        <!-- Breadcrumb -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-5">
        <div class="container">

            <div class="row g-4 g-sm-5">
                <!-- Main content START -->
                <div class="col-xl-8 mb-4 mb-sm-0">
                    <!-- Personal info START -->
                    <div class="card card-body shadow p-4">
                        <!-- Title -->
                        <h5 class="mb-0">Détails Personnels</h5>

                        <!-- Form START -->
                        <form class="row g-3 mt-0">
                            <!-- Name -->
                            <div class="col-md-6 bg-light-input">
                                <label for="yourName" class="form-label">Nom Complet *</label>
                                <input type="text" disabled
                                    value="{{ Auth::guard('etudiant')->user()->nom }} {{ Auth::guard('etudiant')->user()->prenom }}"
                                    class="form-control" id="yourName" placeholder="Name">
                            </div>
                            <!-- Email -->
                            <div class="col-md-6 bg-light-input">
                                <label for="emailInput" class="form-label">Email *</label>
                                <input type="email" disabled value="{{ Auth::guard('etudiant')->user()->email }}"
                                    class="form-control" id="emailInput" placeholder="Email">
                            </div>
                            <!-- Number -->
                            <div class="col-md-6 bg-light-input">
                                <label for="mobileNumber" class="form-label">Mobile number *</label>
                                <input type="text" disabled value="{{ Auth::guard('etudiant')->user()->telephone }}"
                                    class="form-control" id="mobileNumber" placeholder="Mobile number">
                            </div>
                            <!-- Country option -->
                            <div class="col-md-6 bg-light-input">
                                <label for="mobileNumber" class="form-label">Pays *</label>
                                <select wire:model="pays" class="form-select js-choice" aria-label=".form-select-lg">
                                    <option value="">-- Sélectionnez un pays --</option>
                                    @foreach ($paysDisponible as $p)
                                        <option value="{{ $p }}">{{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- State option -->
                            @if (!empty($villesDisponible))
                                <div class="col-md-6 bg-light-input">
                                    <label for="mobileNumber" class="form-label">Ville *</label>
                                    <select wire:model="ville" class="form-select js-choice"
                                        aria-label=".form-select-lg">
                                        <option value="">-- Sélectionnez une ville --</option>
                                        @foreach ($villesDisponible as $v)
                                            <option value="{{ $v }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <!-- Address -->
                            <div class="col-md-6 bg-light-input">
                                <label for="address" class="form-label">Adresse *</label>
                                <input type="text" class="form-control" id="address" placeholder="Address">
                            </div>
                            <!-- Cards -->
                            <div class="col-12">
                                <label class="form-label">Your saved cards *</label>
                                <div class="row g-2">
                                    <div class="col-2 col-sm-1 border rounded me-2">
                                        <a href="#"><img src="{{ asset('assets/images/client/mastercard.svg') }}"
                                                alt="" width="50"></a>
                                    </div>
                                    <div class="col-2 col-sm-1 border rounded me-2">
                                        <a href="#"><img src="{{ asset('assets/images/client/visa.svg') }}"
                                                alt="" width="50"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 mt-4">
                                <!-- Title -->
                                <h5 class="">Payment method</h5>
                                <div class="col-12">
                                    <div class="accordion accordion-circle" id="accordioncircle">
                                        <!-- Credit or debit card START -->
                                        <div class="accordion-item mb-3">
                                            <h6 class="accordion-header" id="heading-1">
                                                <button class="accordion-button rounded collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse-1"
                                                    aria-expanded="true" aria-controls="collapse-1">
                                                    Credit or Debit Card
                                                </button>
                                            </h6>
                                            <div id="collapse-1" class="accordion-collapse collapse show"
                                                aria-labelledby="heading-1" data-bs-parent="#accordioncircle">
                                                <!-- Accordion body -->
                                                <div class="accordion-body">
                                                    <!-- Form START -->
                                                    <form class="row g-3">

                                                        <!-- Card number -->
                                                        <div class="col-12">
                                                            <label class="form-label">Card Number <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="xxxx xxxx xxxx xxxx">
                                                                <img src="{{ asset('assets/images/client/visa.svg') }}"
                                                                    width="50"
                                                                    class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <!-- Expiration Date -->
                                                        <div class="col-md-6">
                                                            <label class="form-label">Expiration date <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    maxlength="2" placeholder="Month">
                                                                <input type="text" class="form-control"
                                                                    maxlength="4" placeholder="Year">
                                                            </div>
                                                        </div>
                                                        <!--Cvv code  -->
                                                        <div class="col-md-6">
                                                            <label class="form-label">CVV / CVC <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" maxlength="3"
                                                                placeholder="xxx">
                                                        </div>
                                                        <!-- Card name -->
                                                        <div class="col-12">
                                                            <label class="form-label">Name on Card <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                aria-label="name of card holder"
                                                                placeholder="Enter card holder name">
                                                        </div>
                                                    </form>
                                                    <!-- Form END -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Credit or debit card END -->
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="col-12 text-start">
                                <button type="submit" class="btn btn-primary mb-0" disabled>Save changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- Personal info END -->
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-xl-4">
                    <div class="row mb-0">
                        <div class="col-md-6 col-xl-12">
                            <!-- Order summary START -->
                            <div class="card card-body shadow p-4 mb-4">
                                <!-- Title -->
                                @php
                                    $total = 0;
                                    foreach ($carts as $cart) {
                                        $total += $cart->formation->prix_original;
                                    }
                                @endphp
                                <h4 class="mb-4">Résumé de Commande</h4>
                                @foreach ($carts as $cart)
                                    <div class="row g-3">
                                        <!-- Image -->
                                        <div class="col-sm-4">
                                            <img class="rounded" src="{{ asset($cart->formation->image) }}"
                                                width="100" alt="">
                                        </div>
                                        <!-- Info -->
                                        <div class="col-sm-8">
                                            <h6 class="mb-0"><a href="#">{{ $cart->formation->nom }}</a></h6>
                                            <!-- Info -->
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <!-- Price -->
                                                <span
                                                    class="text-success">{{ number_format($cart->formation->prix_original, 0, '.', ',') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course item END -->
                                    <hr> <!-- Divider -->
                                @endforeach
                                <!-- Price and detail -->
                                <ul class="list-group list-group-borderless mb-2">
                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span class="h6 fw-light mb-0">Prix Original</span>
                                        <span
                                            class="h6 fw-light mb-0 fw-bold">{{ number_format($total, 0, '.', ',') }}</span>
                                    </li>
                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span class="h5 mb-0">Total</span>
                                        <span class="h5 mb-0">{{ number_format($total, 0, '.', ',') }}</span>
                                    </li>
                                </ul>

                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="button" class="btn btn-lg btn-success">Passer la Commande</button>
                                </div>
                            </div>
                            <!-- Order summary END -->
                        </div>
                    </div><!-- Row End -->
                </div>
                <!-- Right sidebar END -->

            </div><!-- Row END -->
        </div>
    </section>
</div>
