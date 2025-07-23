<div>
    @php
        $playerContainerId = 'video-player-' . uniqid();
        $isBunny = Str::contains($videoUrl, ['.m3u8', 'bunnycdn.net', 'b-cdn.net']);
    @endphp

    <section class="mt-1 course-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Tab content -->
                    <div class="tab-content content" id="course-tabContent">
                        <div class="tab-pane fade show active" id="course-intro" role="tabpanel"
                            aria-labelledby="course-intro-tab">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="mb-3">
                                    <h3 class="mb-0 text-truncate-line-2 text-center"><h3 class="mb-0 text-truncate-line-2 ">{{ $currentChapterName }}</h3>
</h3>
                                </div>
                            </div>
                            <!-- Player dynamique -->
                            @php
                                $playerContainerId = 'video-player-' . uniqid();
                                $isBunny = Str::contains($videoUrl, ['.m3u8', 'bunnycdn.net', 'b-cdn.net']);
                            @endphp

                            <div id="{{ $playerContainerId }}"
                                class="embed-responsive position-relative w-100 d-block overflow-hidden p-0"
                                style="height: 600px" wire:ignore>
                                <div id="video-container" class="position-absolute top-0 start-0 w-100 h-100">
                                    @if (Str::contains($videoUrl, ['youtube.com', 'youtu.be']))
                                        <iframe src="{{ $videoUrl }}" allowfullscreen
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            class="w-100 h-100 border-0"></iframe>
                                    @elseif(Str::contains($videoUrl, 'vimeo.com'))
                                        <iframe src="{{ $videoUrl }}" allowfullscreen
                                            class="w-100 h-100 border-0"></iframe>
                                    @elseif($isBunny)
                                        <video id="bunny-player" controls autoplay class="w-100 h-100"
                                            style="background: black;"></video>
                                    @else
                                        <div style="color:white;text-align:center;">Sélectionnez une vidéo</div>
                                    @endif
                                </div>
                            </div>

                            {{-- HLS script --}}
                            <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
                            <script>
                                document.addEventListener('livewire:load', () => {
                                    let hlsInstance = null;
                                    const isBunny = @json($isBunny);
                                    const videoUrl = @json($videoUrl);

                                    function initializeBunnyPlayer(url) {
                                        const video = document.getElementById('bunny-player');
                                        if (!video) return;

                                        if (hlsInstance) {
                                            hlsInstance.destroy();
                                            hlsInstance = null;
                                        }

                                        if (Hls.isSupported()) {
                                            hlsInstance = new Hls();
                                            hlsInstance.loadSource(url);
                                            hlsInstance.attachMedia(video);
                                        } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                                            video.src = url;
                                        }
                                    }

                                    setTimeout(() => {
                                        if (isBunny) {
                                            initializeBunnyPlayer(videoUrl);
                                        }
                                    }, 300);

                                    window.addEventListener('videoChanged', (e) => {
                                        const {
                                            url,
                                            isBunny
                                        } = e.detail;
                                        const container = document.getElementById('video-container');

                                        if (isBunny) {
                                            container.innerHTML =
                                                '<video id="bunny-player" controls autoplay class="w-100 h-100" style="background: black;"></video>';
                                            setTimeout(() => initializeBunnyPlayer(url), 200);
                                        } else {
                                            container.innerHTML = `<iframe src="${url}" allowfullscreen
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            class="w-100 h-100 border-0"></iframe>`;
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5" />

        <!-- Commentaires -->
        <div class="card-header border-bottom-0 p-0">
            <ul class="nav nav-lb-tab" id="tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-bs-toggle="pill" href="#review" role="tab"
                        aria-controls="review" aria-selected="false">Commentaires</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content" id="tabContent">
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="mt-3">
                        <div class="d-lg-flex align-items-center justify-content-between mb-5">
                            <h3 class="mb-0">Les Commentaires</h3>
                        </div>

                        <!-- Exemple de commentaire -->
                        <div class="d-flex align-items-start border-bottom pb-4 mb-4">
                            <img src="{{ asset('assets/images/avatar/avatar-2.jpg') }}" alt=""
                                class="rounded-circle avatar-lg" />
                            <div class="ms-3">
                                <h4 class="mb-1">
                                    Max Hawkins
                                    <span class="ms-1 fs-6">il y a 2 jours</span>
                                </h4>
                                <p>Très bonne vidéo, explications claires et bien rythmées !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="card course-sidebar" id="courseAccordion">
        <ul class="list-group list-group-flush" style="height: 850px" data-simplebar>
            <li class="list-group-item">
                <h4 class="mb-0">Chapitres</h4>
            </li>

            @foreach ($formation->formation->modules as $index => $module)
                <li class="list-group-item">
                    <!-- Toggle Module -->
                    <a class="d-flex align-items-center h4 mb-0" data-bs-toggle="collapse"
                        href="#module-{{ $index }}" role="button"
                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="module-{{ $index }}">
                        <div class="me-auto">{{ $module->titre }}</div>
                        <span class="chevron-arrow ms-4">
                            <i class="fe fe-chevron-down fs-4"></i>
                        </span>
                    </a>

                    <!-- Collapse Chapitres -->
                    <div class="collapse {{ $activeModuleIndex === $index ? 'show' : '' }}" id="module-{{ $index }}" data-bs-parent="#courseAccordion">
                        <div class="py-4 nav" role="tablist" aria-orientation="vertical" style="display: inherit">
                            @foreach ($module->chapitres as $chapitre)
                                <a class="mb-2 d-flex justify-content-between align-items-center text-inherit"
                                   wire:click="changeVideo('{{ $chapitre->url_video }}', '{{ addslashes($chapitre->nom) }}', {{ $index }})"

 href="javascript:void(0)">
                                    <div class="text-truncate">
                                        <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2">
                                            <i class="fe fe-play fs-6"></i>
                                        </span>
                                        <span class="chapter-title" title="{{ $chapitre->nom }}">{{ \Illuminate\Support\Str::limit($chapitre->nom, 30) }}</span>

                                    </div>
                                    <div class="text-truncate">
                                        {{-- Optionnel : durée du chapitre --}}
                                        {{-- <span>{{ $chapitre->duree }}</span> --}}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

</div>
