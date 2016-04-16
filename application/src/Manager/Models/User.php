<?php

namespace Manager\Models;

class User extends \ActiveRecord\Model {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function saveUser() {
        
        $args = array();
        if( func_num_args() > 0 ) {

            $args = func_get_args();
            print_r( $args );
            if( ! is_array( $args[0] ) ) {

                return die( 'Argument is not an array... ' );
            }
            $args = $args[0];
            if( $this->_userValidate( $args['username'] ) && $this->_passValidate( $args['userpass'] ) ) {
                
                $user = new User();
                $user->username     = $args['username'];
                $user->userpass     = $args['userpass'];
                $user->created      = $args['created'];
                $user->modified     = $args['modified'];
                $user->status       = $args['status'];
                $user->save();
            } else {
                
                die( 'User or Pass is not valid' );
            }
        }
        die( '0' );
    }
    
    public function getUsers() {
        phpinfo();exit;
        foreach( User::find( 1 )->attributes() as $user ) {
            print_r( $user );
        }
    }
    
    private function _userValidate( $username = null ) {
        
        if( is_null( $username ) ) {
            
            return false;
        }
        
        return true;
    }

    private function _passValidate( $password = null ) {
        
        if( is_null( $password ) ) {
            
            return false;
        }
        
        return true;
    }

}
