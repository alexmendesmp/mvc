<?php

namespace Manager\Libs;

class Auth {
    /**
     * Username
     * @var string 
     */
    private $_username;
    /**
     * User ID
     * @var int 
     */
    private $_userid;
    /**
     * User's name
     * @var string 
     */
    private $_name;
    /**
     * User's Role
     * @var string
     */
    private $_role;
    
    /** Constructor */
    function __construct() {
        //..
    }
    /**
     * Set Username
     * 
     * @param string $username
     */
    private function _setUsername( $username ) {
        
        $this->_username = $username;
    }
    /**
     * Set User ID
     * 
     * @param int $userid
     */
    private function _setUserid( $userid ) {
        
        $this->_userid = $userid;
    }
    /**
     * Set User's Name
     * 
     * @param string $name
     */
    private function _setName( $name ) {
        
        $this->_name = $name;
    }
    /**
     * Set User's Role
     * 
     * @param string $role
     */
    private function _setRole( $role ) {
        
        $this->_role = $role;
    }
    
    /**
     * Get Username
     * 
     * @return string
     */
    protected function getUsername() {
        
        return $this->_username;
    }
    /**
     * Get User ID
     * 
     * @return int
     */
    protected function getUserid() {
        
        return $this->_userid;
    }
    /**
     * Get User's Name
     * 
     * @return string
     */
    protected function getName() {
        
        return $this->_name;
    }
    /**
     * 
     * Get User's Role
     * 
     * @return string
     */
    protected function getRole() {
        
        return $this->_role;
    }
    
    /**
     * Hash user's password
     * 
     * @param string $userpass User's password.
     * @return string Hashed password OR False on failure.
     */
    public function passwordHash( $userpass = null ) {
        
        $hashedPassword = '';
        
        if( is_null( $userpass ) ) {
            
            return false;
        }
        if( ! $hashedPassword = password_hash( $userpass, PASSWORD_BCRYPT ) ) { 
            
            return false;
        }
        return $hashedPassword;
    }
    /**
     * Verify whether user's password is correct or not
     * 
     * @param string $userpass
     * @param string $hashedPassword
     * @return boolean
     */
    private function _passwordHashVerifier( $userpass, $hashedPassword ) {
        
        if( password_verify( $userpass, $hashedPassword ) ) {
            
            return true;
        } else {
            
            return false;
        }
    }
    /**
     * Try to authenticate the user
     * 
     * @param string $username User's username
     * @param string $userpass User's password
     * @return boolean
     */
    public function userAuthenticate( $username, $userpass ) {

        // condition to search for username
        $conditions = array( 'conditions' => array( 
            'username = ?', $username 
        ));
        // if username already exists then return true
        if( $user = \Manager\Models\User::find( $conditions ) ) {
            
            $storedUsername  = $user->userpass;

            $hashedPassword = $this->passwordHash( $userpass );
            if( $this->_passwordHashVerifier( $userpass, $storedUsername) ) {
                
                $this->_setUsername( $user->username );
                $this->_setUserid( $user->id );
                // doesn't exists yet
//                $this->_setRole( $user->role );
                
                return true;
            }
            return false;
        }
        // Otherwise return false
        return false;
    }
    /**
     * Authenticate user
     */
    public function authenticate( $username, $userpass ) {
        
        $auth = new \Manager\Libs\Auth();
        if( $auth->userAuthenticate( $username , $userpass ) ) {
            
            return json_encode([ "status" => true ]);
        } else {
            
            return json_encode([ "status" => false ]);
        }
    }
    
    public function isLoggedIn() {
        
    }
    
    public function logout() {
        
        
    }
    

}

