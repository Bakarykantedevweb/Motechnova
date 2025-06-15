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
                        <iframe src="{{ $videoUrl }}" frameborder="0" allowfullscreen
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                        </iframe>
                    </div>
                    <!-- Comments Section -->
                    <div class="comments-section">
                        <h4>Comments</h4>

                        <!-- Comment Form -->
                        <div class="comment-form mb-4">
                            <textarea class="form-control mb-3" rows="4" placeholder="Add a comment..."></textarea>
                            <button class="btn btn-primary">Submit Comment</button>
                        </div>

                        <!-- Example Comments -->
                        <div class="comment-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="comment-author">John Smith</div>
                                <div class="comment-date">2 days ago</div>
                            </div>
                            <div class="comment-text">
                                Great tutorial! The explanation of JavaScript fundamentals is very clear and easy to
                                follow.
                                I especially liked the practical examples. Looking forward to the next lesson.
                            </div>
                        </div>

                        <div class="comment-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="comment-author">Sarah Johnson</div>
                                <div class="comment-date">5 days ago</div>
                            </div>
                            <div class="comment-text">
                                This course has been incredibly helpful for understanding JavaScript from scratch.
                                The instructor explains complex concepts in a simple way. Highly recommend!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
