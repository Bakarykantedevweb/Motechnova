<div>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-light p-4 text-center rounded-3">
                        <h1 class="m-0">Mon Panier</h1>
                        <!-- Breadcrumb -->
                        {{-- <div class="d-flex justify-content-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dots mb-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Courses</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                </ol>
                            </nav>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
Page Banner END -->

    <!-- =======================
Page content START -->
    <section class="pt-5">
        <div class="container">

            <div class="row g-4 g-sm-5">
                <!-- Main content START -->
                <div class="col-lg-8 mb-4 mb-sm-0">
                    <div class="card card-body p-4 shadow">
                        <!-- Alert -->
                        {{-- <div class="alert alert-danger alert-dismissible d-flex justify-content-between align-items-center fade show py-3 pe-2"
                            role="alert">
                            <div>
                                <span class="fs-5 me-1">🔥</span>
                                These courses are at a limited discount, please checkout within<strong
                                    class="text-danger ms-1">2 days and 18 hours</strong>
                            </div>
                            <button type="button" class="btn btn-link mb-0 text-primary-hover text-end"
                                data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                        </div> --}}



                        <div class="table-responsive border-0 rounded-3">
                            <!-- Table START -->
                            <table class="table align-middle p-4 mb-0">
                                <!-- Table head -->
                                <!-- Table body START -->
                                <tbody class="border-top-0">
                                    @php
                                        $total = 0;
                                        foreach ($carts as $cart) {
                                            $total += $cart->formation->prix_original;
                                        }
                                    @endphp

                                    <!-- Table item -->
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <!-- Course item -->
                                            <td>
                                                <div class="d-lg-flex align-items-center">
                                                    <!-- Image -->
                                                    <div class="w-100px w-md-80px mb-2 mb-md-0">
                                                        <img src="{{ $cart->formation->image }}" width="100"
                                                            class="rounded" alt="">
                                                    </div>
                                                    <!-- Title -->
                                                    <h6 class="mb-0 ms-lg-3 mt-2 mt-lg-0">
                                                        <a href="{{ url('formations/' . $cart->formation->nom) }}">{{ $cart->formation->nom }}</a>
                                                    </h6>
                                                </div>
                                            </td>

                                            <!-- Amount item -->
                                            <td class="text-center">
                                                <h5 class="text-success mb-0">{{ $cart->formation->prix_original }}</h5>
                                            </td>
                                            <!-- Action item -->
                                            <td>
                                                <a href="#"
                                                    class="btn btn-sm btn-success-soft px-2 me-1 mb-1 mb-md-0"><i
                                                        class="far fa-fw fa-edit"></i></a>
                                                <button class="btn btn-sm btn-danger-soft px-2 mb-0"><i
                                                        class="fas fa-fw fa-times"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-4">
                    <!-- Card total START -->
                    <div class="card card-body p-4 shadow">
                        <!-- Title -->
                        <h4 class="mb-3">Total</h4>

                        <!-- Price and detail -->
                        <ul class="list-group list-group-borderless mb-2">
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="h6 fw-light mb-0">Prix d'origine</span>
                                <span class="h6 fw-light mb-0 fw-bold">{{ number_format($total, 0, '.', ',') }} F</span>
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="h5 mb-0">Total</span>
                                <span class="h5 mb-0">{{ number_format($total, 0, '.', ',') }} F</span>
                            </li>
                        </ul>

                        <!-- Button -->
                        <div class="d-grid">
                            <a href="" class="btn btn-lg btn-success">Passer à la caisse</a>
                        </div>

                        <!-- Content -->
                        <p class="small mb-0 mt-2 text-center">En complétant votre achat, vous acceptez ces <a
                                href="#"><strong>Conditions de Service</strong></a></p>

                    </div>
                    <!-- Card total END -->
                </div>
                <!-- Right sidebar END -->

            </div><!-- Row END -->
        </div>
    </section>
</div>
