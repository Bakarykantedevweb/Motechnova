<!-- Modal -->
<div wire:ignore.self class="modal fade" id="unlockTrainerModal" tabindex="-1" aria-labelledby="unlockTrainerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="unlockTrainerModalLabel">Confirmation de déblocage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <div class="modal-body text-center">
                <i class="bi bi-exclamation-triangle-fill text-warning" style="font-size: 2rem;"></i>
                <p class="mt-3">Êtes-vous sûr de vouloir débloquer le formateur :  <strong>{{ $name }}</strong> ?</p>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form wire:submit.prevent="unlockTrainer">
                    <button type="submit" class="btn" style="background-color: #754FFE; color: white;">
                        Débloquer
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
