<div>
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
                    <div>
                        <h1 class="mb-0 h2 fw-bold">Bonjour, {{ Auth::guard('formateur')->user()->nom }}
                            {{ Auth::guard('formateur')->user()->prenom }}</h1>
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
            <!-- Revenus -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="card mb-4">
                    <div class="p-4">
                        <span class="fs-6 text-uppercase fw-semibold">Revenus</span>
                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                            {{ number_format($revenuTotal) }}F
                        </h2>
                        <span class="d-flex justify-content-between align-items-center">
                            <span>Ce mois</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Étudiants -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="card mb-4">
                    <div class="p-4">
                        <span class="fs-6 text-uppercase fw-semibold">Inscriptions</span>
                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                            {{ $etudiantsTotal }}
                        </h2>
                        <span class="d-flex justify-content-between align-items-center">
                            <span>Ce mois</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Formations -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="card mb-4">
                    <div class="p-4">
                        <span class="fs-6 text-uppercase fw-semibold">Formations</span>
                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                            {{ $formationsTotal }}
                        </h2>
                        <span class="d-flex justify-content-between align-items-center">
                            <span>Ce mois</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-4 mb-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Card body -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="h4 mb-0">Statistiques de ventes</h3>
                    </div>
                    <div class="card-body">
                        <div id="orderColumn" wire:ignore></div>
                    </div>
                </div>
                <div class="card mb-4">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="h4 mb-0">Cours les plus vendus</h3>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-centered text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Formation</th>
                                    <th>Ventes</th>
                                    <th>Revenu</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($formations as $index => $formation)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset($formation->image) }}" alt="img" class="rounded"
                                                    width="60" height="45" style="object-fit: cover;">
                                                <span class="ms-3 fw-semibold">{{ $formation->nom }}</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">{{ $formation->orders_count }} ventes</span>
                                        </td>
                                        <td>{{ number_format($formation->total_montant, 0, ',', ' ') }} FCFA</td>
                                        {{-- <td>
                                            <a href="{{ route('formations.show', $formation->id) }}"
                                                class="btn btn-sm btn-outline-primary">Voir</a>
                                        </td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Aucune vente enregistrée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        @push('scripts')
            <script>
                document.addEventListener('livewire:load', function() {
                    const mois = @json($mois);
                    const ventes = @json($ventes);

                    if (document.getElementById("orderColumn")) {
                        const options = {
                            series: [{
                                name: "Ventes",
                                data: ventes
                            }],
                            chart: {
                                type: "bar",
                                height: 272,
                                toolbar: {
                                    show: false
                                }
                            },
                            colors: ["#4f46e5"], // couleur personnalisée
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: "50%",
                                    endingShape: "rounded"
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            xaxis: {
                                categories: mois
                            },
                            yaxis: {
                                labels: {
                                    style: {
                                        colors: "#6b7280"
                                    }
                                }
                            },
                            fill: {
                                opacity: 1
                            },
                            tooltip: {
                                y: {
                                    formatter: function(val) {
                                        return val + " ventes";
                                    }
                                }
                            }
                        };

                        new ApexCharts(document.querySelector("#orderColumn"), options).render();
                    }
                });
            </script>
        @endpush
    </section>
</div>
