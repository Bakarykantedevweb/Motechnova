<!-- Modal de validation -->
<div class="modal fade" id="validerProduitModal" tabindex="-1" aria-labelledby="validerProduitModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="validerProduitModalLabel">Validation du Produit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <p>Es-tu sûr de vouloir <strong>valider</strong> ce produit digital ?</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger" wire:click="rejeterProduit" data-bs-dismiss="modal">Non, Rejeter</button>
        <button type="button" class="btn btn-primary" wire:click="validerProduit" data-bs-dismiss="modal">
          Oui, Valider
        </button>
      </div>

    </div>
  </div>
</div>
