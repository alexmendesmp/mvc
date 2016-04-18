<?php
/*
 * Main Controller
 */
namespace Manager\Controllers;

class Controller {
    
    protected $view;
    
    public function __construct() {
        
    }
    
    public function index() {
        
        $this->view->render( 'index' );
    }
    
    public function loadViewObject( \Manager\Views\View $view ) {
        
        $this->view = $view;
    }
    
    public function loadModel( $modelName ) {
        
        $modelClassName = "Manager\\Models\\" . $modelName;
        return new $modelClassName();
    }
    /**
     * Get Param value
     * 
     * @param string $paramName Param name
     * @return mixed Return Param value or FALSE on failure
     */
    public function getParam( $paramName ) {
        
        if( ! empty( $_POST ) && count( $_POST ) > 0 ) {

            return filter_input( INPUT_POST, $paramName );
        }
        return filter_input( INPUT_GET, $paramName );

    }
    
}