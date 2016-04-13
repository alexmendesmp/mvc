<?php

namespace Manager\Views;

class View {

    public function __construct() {
        
    }
    
    public function render( $path = 'index', $data = null ) {
        
//        echo 'view...';
        if( ! is_null( $data ) ) {
            
            $name = $data[0];
            $$name = $data[1];
        }
        require MANAGER_VIEWS_DIR . $path . '.php';
    }
    
    public function renderPartial( $path = 'index', $data = null ) {
        
        
    }

}