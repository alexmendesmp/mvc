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
    
}