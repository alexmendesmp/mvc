<?php

namespace Manager\Models;

class User extends \ActiveRecord\Model {
    /**
     * 
     * @return boolean
     */
    public function saveUser() {
        
        $args = array();
        if( func_num_args() > 0 ) {

            $args = func_get_args();
//            print_r( $args );
            if( ! is_array( $args[0] ) ) {

                return false;
            }
            $args = $args[0];
            // Validate user data
            if( $this->_userValidate( $args['username'] ) && $this->_passValidate( $args['userpass'] ) ) {
                // Verify whether user exists
                if( $this->_userExists( $args['username'] ) ) {
                    
                    $userExists = new \Manager\Libs\ErrorMessage( "user_exists", "User already exists" );
                    return $userExists->showErrorMessage();
                }
                
                $auth = new \Manager\Libs\Auth();
                $hashedPassword = $auth->passwordHash( $args['userpass'] );
                
                $user = new User();
                $user->username     = $args['username'];
                $user->userpass     = $hashedPassword;
                $user->created      = $args['created'];
                $user->modified     = $args['modified'];
                $user->status       = $args['status'];
                $user->save();
                
                return json_encode( [ "userId" => $user->id ] );
            } else {
                // Invalid user's data
                $save = new \Manager\Libs\ErrorMessage( "invalid_user_or_password", "User or password is not valid" );
                return $save->showErrorMessage();
            }
        }
        die( 'Empty args' );
    }
    /**
     * Get all users
     * 
     * @return string Return json string
     */
    public function getUsers() {
        
        $jsonUsers = array();
        
        foreach( User::find( 'all' ) as $user ) {
            
            array_push( $jsonUsers, $user->attributes() );
        }
        return json_encode( $jsonUsers );
    }
    /**
     * Verify whether $username is valid or not. Also verify 
     * whether user already exists.
     * 
     * @param string $username User's username
     * @return array $error Return an array with error message
     */
    private function _userValidate( $username = null ) {
        
        if( is_null( $username ) || empty( $username ) ) {
            // Empty username
            return false;
        }
        return true;
    }
    /**
     * Check database to see whether user exists
     * 
     * @param type $username User's username
     * @return boolean
     */
    private function _userExists( $username ) {
        
        // condition to search for username
        $condition = array( 'conditions' => array( 
            'username = ?', $username 
        ));
        // if username already exists then return true
        if( $user = User::find( $condition ) ) {
            
            return true;
        }
        // Otherwise return false
        return false;
    }
    /**
     * Validate user's password
     * 
     * @param string $password User's userpass
     * @return boolean
     */
    private function _passValidate( $password = null ) {
        
        if( is_null( $password ) ) {
            
            return false;
        }
        
        return true;
    }

}
