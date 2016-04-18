<?php

namespace Manager\Controllers;

class User extends \Manager\Controllers\Controller {

    public function __construct()
    {
        parent::__construct();
        
    }
    /**
     * Add User
     */
    public function add() {
        
        $user = $this->loadModel( 'User' );
        
        $args = array(
            'username'  => 'alexmendes',
            'userpass'  => 'ams0102..',
            'created'   => date( 'Y-m-d H:i:s' ),
            'modified'  => date( 'Y-m-d H:i:s' ),
            'status'    => 'active',
        );
        $result = $user->saveUser( $args );
        
        die( $result );
    }
    /**
     * List all users
     */
    public function userlist() {
        
        $user = $this->loadModel( 'User' );
        $users = $user->getUsers();
        print_r( $users );
    }
}
