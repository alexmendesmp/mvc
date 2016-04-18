<?php

use Manager\Controllers\Controller as Controller;

namespace Manager\Controllers;
/**
 * Call Login page
 * 
 */
class Login extends Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $this->view->render( 'login/index' );
    }
    /**
     * Authenticate user
     */
    public function authenticate() {
        
        $username = \Manager\Libs\Manager::app()->getParam( 'username' );
        $userpass = \Manager\Libs\Manager::app()->getParam( 'userpass' );
        $auth = new \Manager\Libs\Auth();
        $res = $auth->authenticate( $username, $userpass );
        
        echo $res;
    }
}
