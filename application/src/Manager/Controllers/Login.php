<?php

use Manager\Controllers\Controller as Controller;

namespace Manager\Controllers;

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
        
        $username = $this->getParam( 'username' );
        $userpass = $this->getParam( 'userpass' );
        $auth = new \Manager\Libs\Auth();
        $res = $auth->authenticate( $username, $userpass );
        
        echo $res;
    }

}
