<?php

namespace Manager\Libs;

abstract class Error {

    private $_message;
    private $_status;
    
    function __construct( $status, $message )
    {
        
        $this->setErrorMessage( $message );
        $this->setStatus( $status );
    }
    
    protected function setErrorMessage( $message ) {
        
        $this->_message = $message;
    }
    protected function setStatus( $status ) {
        
        $this->_status = $status;
    }
    
    protected function getErrorMessage() {
        
        return $this->_message;
    }
    protected function getStatus() {
        
        return $this->_status;
    }
    
    abstract function showErrorMessage();

}
