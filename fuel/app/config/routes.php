<?php

return array(
    '_root_' => 'customer/index', // The default route
    '_404_' => 'welcome/404', // The main 404 route
    'cliente' => 'customer/index',
    'cliente/:id/editar' => 'customer/edit',
    'cliente/salvar' => 'customer/save',
    'cliente/criar' => 'customer/create',
    'cliente/:id/remover' => 'customer/remove',
    
    'pet/:customer_id/adicionar' => 'pet/create',
    'pet/:id/remover' => 'pet/remove',
    'pet/:id/editar' => 'pet/edit',
    'pet/salvar' => 'pet/save'
);
