<div>
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-12 col-md-8 col-12">
                    <!-- Card body -->
                    <div class="card mb-4">
                        <!-- Card header -->
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Gains</h4>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-12 col-12 mb-3 mb-lg-0">
                                    <div>
                                        <i
                                            class="fe fe-shopping-cart icon-shape icon-sm rounded-3 bg-light-success text-dark-success mt-2"></i>
                                        <h3 class="display-4 fw-bold mt-3 mb-0">
                                            {{ number_format(array_sum($monthlyEarnings), 0, ',', ' ') }} F</h3>
                                        <span>Vos gains totaux</span>
                                        <hr class="my-4" />
                                        <div class="row">
                                            <!-- Total earning chart -->
                                            <div class="col ps-0">
                                                <div id="totalEarning" class="apex-charts mt-n4 mb-n3"></div>
                                            </div>
                                            <div class="col-auto">
                                                <span class="badge bg-success">
                                                    <i class="fe fe-trending-up fs-6 me-2"></i>
                                                    32%
                                                </span>
                                            </div>
                                        </div>
                                        <p class="mb-0 lh-1.5">
                                            Update your payout method in settings.
                                        </p>
                                    </div>
                                </div>
                                <!-- Earning chart -->
                                <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                                    <div id="earningFormateur" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="card mb-4">
                                <div class="p-4">
                                    <span class="icon-shape icon-sm bg-light-primary text-dark-primary rounded-3">
                                        <i class="fe fe-folder"></i>
                                    </span>
                                    <h2 class="h1 fw-bold mb-0 mt-4 lh-1">
                                        {{ number_format($earningThisMonth, 0, '.', ' ') }} FCFA
                                    </h2>
                                    <p>Gains ce mois</p>
                                    <div class="progress bg-light-primary" style="height: 2px">
                                        <div class="progress-bar" style="width: 65%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="card mb-4">
                                <div class="p-4">
                                    <span class="icon-shape icon-sm bg-light-danger text-dark-danger rounded-3">
                                        <i class="fe fe-shopping-bag"></i>
                                    </span>
                                    <h2 class="h1 fw-bold mb-0 mt-4 lh-1">
                                        {{ number_format($accountBalance, 0, '.', ' ') }} FCFA
                                    </h2>
                                    <p>Solde total</p>
                                    <div class="progress bg-light-danger" style="height: 2px">
                                        <div class="progress-bar bg-danger" style="width: 45%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="card mb-4">
                                <div class="p-4">
                                    <span class="icon-shape icon-sm bg-light-warning text-dark-warning rounded-3">
                                        <i class="fe fe-send"></i>
                                    </span>
                                    <h2 class="h1 fw-bold mb-0 mt-4 lh-1">
                                        {{ number_format($lifeTimeSales, 0, '.', ' ') }}
                                    </h2>
                                    <p>Ventes totales</p>
                                    <div class="progress bg-light-warning" style="height: 2px">
                                        <div class="progress-bar bg-warning" style="width: 35%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var chartData = {
                series: [{
                    name: "Gains mensuels",
                    data: @json(array_values($monthlyEarnings))
                }],
                labels: [
                    "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
                ],
                chart: {
                    height: 280,
                    type: 'line',
                    toolbar: {
                        show: false
                    }
                },
                stroke: {
                    width: 4,
                    curve: 'smooth'
                },
                colors: ["#754ffe"],
                xaxis: {
                    categories: [
                        "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
                    ]
                },
                yaxis: {
                    labels: {
                        formatter: val => val + " F"
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#earningFormateur"), chartData);
            chart.render();
        });
    </script>
</div>
