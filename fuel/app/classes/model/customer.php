<?php

class Model_Customer extends Orm\Model {

    protected static $_table_name = 'customer';

    /**
     * @var  array
     */
    protected static $_properties = array(
        'id',
        'name',
        'phone',
    );

    /**
     * @var  array
     */
    protected static $_has_many = array(
        'pets',
    );

}
