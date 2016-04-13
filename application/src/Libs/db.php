<?php

// Includes
require_once MANAGER_APP_DIR . 'vendor/php-activerecord/php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize( function( $cfg ) {
    $cfg->set_model_directory( MANAGER_MODELS_DIR );
    $cfg->set_connections( array(
        'development'   =>  'mysql://root:root@localhost/manager'
    ));
});

