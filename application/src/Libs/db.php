<?php

// Includes
require_once MANAGER_APP_DIR . 'vendor'.DS.'php-activerecord'.DS.'php-activerecord'.DS.'ActiveRecord.php';

ActiveRecord\Config::initialize( function( $cfg ) {
    
    $CONFIG = require_once MANAGER_APP_DIR . 'config/db.config.php';
    
    $cfg->set_model_directory( MANAGER_MODELS_DIR );
    $cfg->set_connections( array(
        'development'   =>  'mysql://'.$CONFIG['db']['USERNAME'].
                                    ':'.$CONFIG['db']['PASSWORD'].
                                    '@'.$CONFIG['db']['HOST_NAME'].
                                    '/'.$CONFIG['db']['DATABASE'].
                                    '?charset='.$CONFIG['db']['CHARSET'].''
    ));
});
