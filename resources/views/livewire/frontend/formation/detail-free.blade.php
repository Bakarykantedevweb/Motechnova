<div>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 p-0">
                <div class="sidebar" id="sidebar">
                    <h6>Chapitres</h6>
                    <div class="accordion" id="modulesAccordion">
                        @foreach ($formation->modules as $index => $module)
                            <div class="chapter-group">
                                <button class="chapter-item" data-bs-toggle="collapse"
                                    data-bs-target="#module-{{ $index }}"
                                    aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                    aria-controls="module-{{ $index }}">
                                    <span>{{ $module->titre }}</span>
                                    <i class="fe fe-chevron-down fs-4"></i>
                                </button>

                                <div id="module-{{ $index }}" class="collapse {{ $index == 0 ? 'show' : '' }}"
                                    data-bs-parent="#modulesAccordion">
                                    @foreach ($module->chapitres as $chapitre)
                                        <button class="lesson-item"
                                            wire:click="changeVideo('{{ $chapitre->url_video }}')">
                                            <span>{{ $chapitre->nom }}</span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <div class="main-content">
                    <!-- Video Section -->
                    <h2>{{ $formation->nom }}</h2>
                    <div class="video-container">
                        @if(Str::contains($videoUrl, ['youtube.com', 'youtu.be']))
                            <iframe width="100%" height="480"
                                src="{{ $videoUrl }}"
                                frameborder="0"
                                allowfullscreen
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                            </iframe>

                        @elseif(Str::contains($videoUrl, 'vimeo.com'))
                            <iframe src="{{ $videoUrl }}"
                                width="100%" height="480"
                                frameborder="0"
                                allowfullscreen>
                            </iframe>

                        @elseif(Str::contains($videoUrl, ['.m3u8', 'bunnycdn.net', 'b-cdn.net']))
                            <video id="bunny-player"
                                class="video-js vjs-default-skin"
                                controls
                                preload="auto"
                                width="100%" height="480">
                                <source src="{{ $videoUrl }}" type="application/x-mpegURL">
                                Votre navigateur ne supporte pas la lecture de cette vidéo.
                            </video>

                        @else
                            <p class="text-danger">Vidéo non reconnue ou non supportée.</p>
                        @endif
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-section mt-5">
                        <h4>Commentaires</h4>

                        <!-- Comment Form -->
                        <div class="comment-form mb-4">
                            <textarea class="form-control mb-3" rows="4" placeholder="Ajouter un commentaire..."></textarea>
                            <button class="btn btn-primary">Envoyer</button>
                        </div>

                        <!-- Exemple de commentaires -->
                        <div class="comment-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="comment-author">John Smith</div>
                                <div class="comment-date">il y a 2 jours</div>
                            </div>
                            <div class="comment-text">
                                Très bon tutoriel ! Explication claire et pratique. J’attends la suite avec impatience.
                            </div>
                        </div>

                        <div class="comment-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="comment-author">Sarah Johnson</div>
                                <div class="comment-date">il y a 5 jours</div>
                            </div>
                            <div class="comment-text">
                                Le cours est très complet, j’ai tout compris même en partant de zéro. Merci !
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Video.js uniquement pour Bunny --}}
    @if(Str::contains($videoUrl, ['.m3u8', 'bunnycdn.net', 'b-cdn.net']))
        <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
        <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>

        <script>
            document.addEventListener('livewire:load', () => {
                Livewire.hook('message.processed', () => {
                    const video = document.getElementById('bunny-player');
                    if (video && !video.classList.contains('vjs-has-started')) {
                        videojs(video);
                    }
                });
            });
        </script>
    @endif
</div>