<h1>Cliente</h1>
<?php if (Session::get_flash('alert', false)): ?>
    <div class="alert alert-success">
        <?php echo Session::get_flash('alert'); ?>
    </div>
<?php endif; ?>
<div class="jumbotron">
    <table class="table">
        <thead class="thead-inverse">
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Qnt Pets</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($oCustomers as $oCustomer): ?>
                <tr>

                    <td><?php echo $oCustomer->name; ?></td>
                    <td><?php echo $oCustomer->phone; ?></td>
                    <td><?php echo count($oCustomer->pets); ?></td>
                    <td>
                        <button type="button" data-link='<?php echo Uri::create('cliente/:id/editar', array('id' => $oCustomer->id)); ?>' class="editCustomer btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                        <button data-action="remove" data-id="<?php echo $oCustomer->id; ?>" type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="button" class="addCustomer btn btn-primary" data-link='<?php echo Uri::create('cliente/criar'); ?>'>
        <span class="glyphicon glyphicon-plus"></span>Adicionar cliente
    </button>
</div>
<?php
Asset::js('customer.js', array(), 'js_bottom');
