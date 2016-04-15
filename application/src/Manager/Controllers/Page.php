<?php

use Manager\Controllers\Controller as Controller;
namespace Manager\Controllers;

class Page extends Controller {
    
    public function __construct() {
        
        parent::__construct();
    }
    
    public function index() {
        
        $variavel = array( 
            'name' => 'Alex Mendes', 
            'age' => '37' 
        );
        $this->view->render( 'page/index', array( 'Employee', $variavel ) );
    }
    
    public function listall( $id = null ) {
        
        $PageModel = $this->loadModel( 'Page' );
        $PageModel->getPages();
        
        $data = array( 'model' => 'MVC', 'id' => $id );
        $this->view->render( 'page/listall', array( 'mvc', $data ) );
    }

    public function pagelist( $id = null ) {
        
        $PageModel = $this->loadModel( 'Page' );
        $pages = $PageModel->getPages();
        echo "<pre>";
        print_r( $pages );
        //echo $pages->id;
        
//        $data = array( 'model' => 'MVC', 'id' => $id );
//        $this->view->render( 'page/delete', array( 'mvc', $data ) );
    }
}