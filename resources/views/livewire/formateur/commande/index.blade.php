<div>
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-12 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card mb-4">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0">
                            <h3 class="mb-0">Commandes</h3>
                            <span>Le tableau de bord des commandes est un aperçu rapide de toutes les informations
                                actuelles.</span>
                        </div>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table mb-0 text-nowrap table-hover table-centered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Formation</th>
                                        <th>Montant</th>
                                        <th>Date</th>
                                        <th>Méthode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        @foreach ($transaction->order->orderItems as $item)
                                            <tr>
                                                <td>
                                                    <h5 class="mb-0">
                                                        <a href="#" class="text-inherit">
                                                            {{ $item->formation->nom }}
                                                        </a>
                                                    </h5>
                                                </td>
                                                <td>{{ number_format($item->prix, 0, ',', ' ') }} F</td>
                                                <td>{{ \Carbon\Carbon::parse($transaction->paye_a)->format('d M Y') }}
                                                </td>
                                                <td>{{ ucfirst($transaction->moyen_paiement) }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
