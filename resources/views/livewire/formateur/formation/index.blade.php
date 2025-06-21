<div>
    <section class="container-fluid py-4">
        <!-- En-tête -->
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold">📚 Gestion des Formations</h2>
                    <p class="text-muted">Liste des formations disponibles et leurs détails</p>
                </div>
                <a href="{{ url('formateur/formations/create') }}" class="btn btn-primary">
                    + Nouvelle Formation
                </a>
            </div>
        </div>

        @if (!$selectedFormation)
            <!-- Barre de recherche -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <input type="text" wire:model.debounce.300ms="search" class="form-control"
                        placeholder="🔍 Rechercher une formation...">
                </div>
            </div>

            <!-- Liste des formations -->
            <div class="row">
                @forelse ($formations as $formation)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <img src="{{ asset($formation->image) }}" class="card-img-top rounded-top" height="180"
                                style="object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $formation->nom }}</h5>
                                <p class="text-muted mb-2">Ajoutée le
                                    {{ \Carbon\Carbon::parse($formation->date_creation)->format('d M Y') }}</p>
                                <span class="badge bg-{{ $formation->status == 1 ? 'success' : 'warning' }}">
                                    {{ $formation->status == 1 ? 'Approuvée' : 'En attente' }}
                                </span>
                            </div>
                            <div class="card-footer bg-white d-flex justify-content-between">
                                <button wire:click="showDetail({{ $formation->id }})"
                                    class="btn btn-sm btn-outline-primary">
                                    👁️ Voir Détail
                                </button>
                                <a href="#" class="btn btn-sm btn-outline-secondary">✏️ Modifier</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Aucune formation trouvée.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $formations->links() }}
            </div>
        @else
            <!-- Détail de la formation -->
            <div class="row">
                <!-- Détails généraux -->
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center bg-light">
                            <h4 class="fw-bold text-primary">📘 Détail de la Formation : {{ $selectedFormation->nom }}
                            </h4>
                            <button wire:click="backToList" class="btn btn-outline-secondary btn-sm">← Retour</button>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-4">
                                <img src="{{ asset($selectedFormation->image) }}" class="img-fluid rounded shadow-sm"
                                    style="object-fit: cover;">
                            </div>
                            <div class="col-md-8">
                                <p><strong>Description :</strong> {{ $selectedFormation->description }}</p>
                                <p><strong>Prix Original :</strong>
                                    {{ number_format($selectedFormation->prix_original, 0, ',', ' ') }} FCFA
                                </p>
                                <p><strong>Prix Promo :</strong>
                                    {{ $selectedFormation->prix_promotion ? number_format($selectedFormation->prix_promotion, 0, ',', ' ') . ' FCFA' : 'Aucun' }}
                                </p>
                                <p><strong>Niveau :</strong> {{ ucfirst($selectedFormation->niveau) }}</p>
                                <p><strong>Type :</strong> {{ ucfirst($selectedFormation->payante) }}</p>
                                <p><strong>Date Création :</strong>
                                    {{ \Carbon\Carbon::parse($selectedFormation->date_creation)->format('d M Y') }}</p>
                                <p><strong>Catégorie :</strong> {{ $selectedFormation->categorie->nom ?? 'N/A' }}</p>
                                <p><strong>Status :</strong>
                                    <span
                                        class="badge bg-{{ $selectedFormation->status == 1 ? 'success' : ($selectedFormation->status == 2 ? 'danger' : 'warning') }}">
                                        {{ $selectedFormation->status == 1 ? 'Approuvée' : ($selectedFormation->status == 2 ? 'Rejetée' : 'En attente') }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modules & Chapitres -->
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="fw-bold text-dark">📦 Modules & 🎬 Chapitres</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($selectedFormation->modules as $index => $module)
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h4 class="text-primary fw-bold">📘 Module : {{ $module->titre }}</h4>
                                        <button class="btn btn-sm btn-outline-secondary"
                                            wire:click="toggleModule({{ $index }})">
                                            {{ $modulesOuverts[$index] ?? false ? 'Replier 🔼' : 'Déplier 🔽' }}
                                        </button>
                                    </div>

                                    @if ($modulesOuverts[$index] ?? false)
                                        @forelse ($module->chapitres as $chapitre)
                                            <div class="card mb-4 border-start border-4 border-primary shadow">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3 text-secondary">📄 {{ $chapitre->nom }}
                                                    </h5>

                                                    {{-- Gestion vidéo --}}
                                                    @php
                                                        $url = $chapitre->url_video;
                                                        $isYoutube = Str::contains($url, ['youtube.com', 'youtu.be']);
                                                        $isVimeo = Str::contains($url, 'vimeo.com');
                                                        $isBunny = Str::contains($url, 'bunnycdn.com');
                                                        $videoId = null;

                                                        if ($isYoutube) {
                                                            preg_match(
                                                                '/(?:v=|\/)([0-9A-Za-z_-]{11})/',
                                                                $url,
                                                                $matches,
                                                            );
                                                            $videoId = $matches[1] ?? null;
                                                        } elseif ($isVimeo) {
                                                            preg_match('/vimeo\.com\/(\d+)/', $url, $matches);
                                                            $videoId = $matches[1] ?? null;
                                                        }
                                                    @endphp

                                                    <div class="video-container mt-3"
                                                        style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.2);">
                                                        @if ($isYoutube && $videoId)
                                                            <iframe
                                                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                                                frameborder="0"
                                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen></iframe>
                                                        @elseif ($isVimeo && $videoId)
                                                            <iframe
                                                                src="https://player.vimeo.com/video/{{ $videoId }}"
                                                                frameborder="0"
                                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                                                allow="autoplay; fullscreen; picture-in-picture"
                                                                allowfullscreen></iframe>
                                                        @elseif ($isBunny)
                                                            <iframe src="{{ $url }}" frameborder="0"
                                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                                                allow="autoplay; fullscreen" allowfullscreen></iframe>
                                                        @else
                                                            <p class="text-danger">Lien vidéo non reconnu ou invalide
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-muted">Aucun chapitre pour ce module.</p>
                                        @endforelse
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
</div>
