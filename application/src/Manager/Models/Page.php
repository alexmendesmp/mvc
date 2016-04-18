<?php

namespace Manager\Models;

class Page extends \ActiveRecord\Model {
    
    public static $primary_key = 'id';
    public static $table_name = 'pages';

    public function getPages() {
                    
//        $page = new Page();
//        $page->title = 'Sobre';
//        $page->save();

        // linha inserida para test
        // Mais uma linha inserida!!!!! DSC-99
                
        $pages = Page::find( 13 )->attributes();
        echo "<pre>";
        die( print_r( $pages ) );
        return json_encode( $pages );
    }

}

