<h1>Cliente</h1>
<?php if (Session::get_flash('alert', false)): ?>
    <div class="alert alert-success">
        <?php echo Session::get_flash('alert'); ?>
    </div>
<?php endif; ?>
<div class="jumbotron">
    <div class="bd-example" data-example-id="">
        <form method="post" action="<?php echo Uri::create('cliente/salvar'); ?>">
            <?php if (!is_null($oCustomer->id)): ?>
                <input type="hidden" name="id" value="<?php echo $oCustomer->id; ?>">
            <?php endif; ?>
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $oCustomer->name; ?>" placeholder="Digite o nome">
            </div>
            <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="text" name="phone" value="<?php echo $oCustomer->phone; ?>"class="form-control" placeholder="Telefone">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <?php if (!is_null($oCustomer->id)): ?>
                <button type="button" class="btn btn-primary" data-pet="true" data-id='<?php echo $oCustomer->id; ?>' data-method='adicionar'>
                    <span class="glyphicon glyphicon-plus"></span>Add Pet
                </button>
            <?php endif; ?>
        </form>
    </div>
</div>

<div class="modal fade" id="actionPet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content"></div>

    </div>
</div>


<?php if ($oCustomer->pets): ?>
    <h2>Lista dos Pets</h2>
    <div class="jumbotron">
        <table class="table">
            <thead class="thead-inverse">
                <tr>
                    <th>Nome do pet</th>
                    <th>Raça</th>
                    <th>Peso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($oCustomer->pets as $oPet): ?>
                    <tr>
                        <td><?php echo $oPet->name; ?></td>
                        <td><?php echo $oPet->race; ?></td>
                        <td><?php echo $oPet->weight; ?></td>
                        <td>
                            <button data-pet="true" data-method='editar' data-id="<?php echo $oPet->id; ?>" type="button" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                            <button data-action="remove" data-id="<?php echo $oPet->id; ?>" type="button" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
endif;

Asset::js('pet.js', array(), 'js_bottom');



