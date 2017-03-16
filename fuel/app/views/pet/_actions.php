<form id="formPet">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Adicionar Pet</h4>
    </div>
    <div class="modal-body">
        <input type="hidden" name="customer_id" value="<?php echo $iCustomerId; ?>">
        <?php if (!is_null($oPet->id)): ?>
            <input type="hidden" name="id" value="<?php echo $oPet->id; ?>">
        <?php endif; ?>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $oPet->name; ?>" placeholder="Digite o nome do pet">
        </div>
        <div class="form-group">
            <label for="race">Raça:</label>
            <input type="text" name="race" id="race" value="<?php echo $oPet->race; ?>" class="form-control" placeholder="Digite a raça do pet">
        </div>
        <div class="form-group">
            <label for="weight">Peso:</label>
            <input type="text" name="weight" id="weight" value="<?php echo $oPet->weight; ?>" class="form-control" placeholder="Digite o peso do pet">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" id='savePet' class="btn btn-primary">Salvar</button>
    </div>
</form>