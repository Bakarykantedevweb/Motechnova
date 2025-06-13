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
                                </button>

                                <div id="module-{{ $index }}" class="collapse {{ $index == 0 ? 'show' : '' }}"
                                    data-bs-parent="#modulesAccordion">
                                    @foreach ($module->chapitres as $chapitre)
                                        <button class="lesson-item" wire:click="setVideo('{{ $chapitre->url_video }}')">
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
                    <div class="video-container" wire:ignore>
                        <iframe id="video-iframe" src="{{ $videoEmbedUrl }}" title="Video Player" allowfullscreen
                            width="100%" height="400px" frameborder="0">
                        </iframe>
                    </div>

                    <!-- Resources Section -->
                    <div class="resources-section">
                        <h4>Resources</h4>
                        <p>Download the course materials and additional resources to enhance your learning experience.
                            These files complement the video content and provide hands-on practice opportunities.</p>

                        <div class="resource-links">
                            <a href="#" class="resource-link">
                                <i class="fas fa-file-pdf"></i>
                                <span>JavaScript Fundamentals - Course Notes.pdf</span>
                            </a>
                            <a href="#" class="resource-link">
                                <i class="fas fa-file-code"></i>
                                <span>Sample Code - Hello World Project.zip</span>
                            </a>
                            <a href="#" class="resource-link">
                                <i class="fas fa-file-alt"></i>
                                <span>JavaScript Cheat Sheet.pdf</span>
                            </a>
                            <a href="#" class="resource-link">
                                <i class="fas fa-link"></i>
                                <span>Recommended Reading - MDN JavaScript Guide</span>
                            </a>
                        </div>

                        <div class="alert alert-info mt-4" role="alert">
                            <i class="fas fa-lightbulb me-2"></i>
                            <strong>Pro Tip:</strong> Make sure to download and review the course notes before starting
                            each lesson. The sample code files contain working examples that you can run and modify on
                            your local machine.
                        </div>
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
