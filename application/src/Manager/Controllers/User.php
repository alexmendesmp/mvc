<?php

namespace Manager\Controllers;

class User extends \Manager\Controllers\Controller {

    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function add() {
        
        $user = $this->loadModel( 'User' );
        
        $args = array(
            'username'  => 'alexmendes',
            'userpass'  => 'mypassword',
            'created'   => date( 'Y-m-d H:i:s' ),
            'modified'  => date( 'Y-m-d H:i:s' ),
            'status'    => 'active',
        );
        $user->saveUser( $args );
    }
    
    public function userlist() {
        
        $user = $this->loadModel( 'User' );
        $users = $user->getUsers();
        print_r( $users );
    }

}
