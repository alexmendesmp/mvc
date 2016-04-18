<?php

use PHPUnit_Framework_TestCase as PHPUnit;

class SessionTest extends PHPUnit {

    public $session;
    
    public function setUp() {
        $this->session = new Manager\Libs\Session();
        $this->session->setVar( 'name', 'Alex' );
        //...
    }    
    /**
     * @dataProvider dataProvider
     */
    public function testSetVars() {

        $res = $this->session->getVar( 'name' );
        $this->assertEquals( 'Alex', $res, 'Session value is wrong' );
    }
    
    public function dataProvider() {
        
        return array(
            array( 'nome' => 'Alex' )
        );
    }
    
    public function tearDown() {
        
        //...
    }

}

