<?php

namespace Manager\Libs;

class Session extends \Manager\Controllers\Controller {
    
    /**
     * Constructor
     */
    public function __construct() {
        
        parent::__construct();
    }
    /**
     * Set session var
     * 
     * @param string $varName Session var name
     * @param string $var Var content
     */
    public function setVar( $varName, $var ) {
        
        $_SESSION['MANAGER']['USERDATA'][$varName] = $var;
    }
    /**
     * Get session var content
     * 
     * @param string $varName Var name to be retrieved
     * @return string
     */
    public function getVar( $varName ) {
        
        return $_SESSION['MANAGER']['USERDATA'][$varName];
    }
}

