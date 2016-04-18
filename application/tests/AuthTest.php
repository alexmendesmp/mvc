<?php

use PHPUnit_Framework_TestCase as PHPUnit;

class AuthTest extends PHPUnit {

    public $auth;
    
    public function setUp() {
        $this->auth = new Manager\Libs\Auth();
        //...
    }    
    // Authenticate
    public function testUserAuthenticate() {

        $res = $this->auth->userAuthenticate( "alexmendes", "ams0102.." );
        $this->assertTrue( $res, 'Authenticate has failed' );
    }
    
    public function tearDown() {
        
        //...
    }

}

