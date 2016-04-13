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
        
//        Page::create(array(
//            'page_title'    =>  'Title page test',
//            'page_content'  =>  'Content teste',
//            'created'       =>  date( 'd-m-Y H:i:s', time() ),
//            'modified'      =>  date( 'd-m-Y H:i:s', time() ),
//            'page_status'   =>  'active',
//        ));

        $pages = \Manager\Models\Page::find( 1 );
        return $pages;
    }

}

