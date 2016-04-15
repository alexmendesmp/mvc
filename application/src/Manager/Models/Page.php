<?php

namespace Manager\Models;

class Page extends \ActiveRecord\Model {
    
    public static $primary_key = 'id';
    public static $table_name = 'pages';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getPages() {
                    
//        $page = new Page();
//        $page->page_title = 'Fale conosco';
//        $page->save();

        // linha inserida para test
        // Mais uma linha inserida!!!!! DSC-99
                
        $pages = Page::find( 13 );
        echo $pages->title;
        
        die( print_r( $pages ) );
        
        return $pages;
    }

}

