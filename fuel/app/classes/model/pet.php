<?php

/**
 * @package  app
 * @extends  Orm\Model
 */
class Model_Pet extends Orm\Model {

    protected static $_table_name = 'pet';

    /**
     * @var  array
     */
    protected static $_properties = array(
        'id',
        'name',
        'race',
        'weight',
        'customer_id'
    );

    /**
     * @var  array
     */
    protected static $_belongs_to = array(
        'customer' => array(
            'key_from' => 'customer_id',
            'model_to' => 'Model_Customer',
            'key_to' => 'id',
        ),
    );

}
