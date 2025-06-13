<div wire:ignore.self class="modal fade" id="formationModal" tabindex="-1" aria-labelledby="formationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formationModalLabel">Validation de la Formation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <p>Voulez-vous approuver ou rejeter cette formation ?</p>
                <!-- Tu peux afficher ici le nom de la formation ou autres infos -->
            </div>
            <div class="modal-footer">
                <form wire:submit.prevent="approuver" style="display: inline;">
                    <button type="submit" class="btn btn-success">Approuver</button>
                </form>

                <form wire:submit.prevent="rejeter" style="display: inline;">
                    <button type="submit" class="btn btn-danger">Rejeter</button>
                </form>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
