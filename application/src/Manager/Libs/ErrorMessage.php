<?php

use Manager\Libs\Error as Error;

namespace Manager\Libs;

class ErrorMessage extends Error {

    function __construct( $status, $message ) {
        
        parent::__construct( $status, $message );
    }
    
    public function showErrorMessage() {
        
        return json_encode([ 
            "status" => $this->getStatus(),
            "errorMessage" => $this->getErrorMessage() 
        ]);
    }  
}

