<?php
namespace Manager\Libs;
/**
 * Manager Class
 * 
 * Instantiate Functions() Class
 * 
 */
class Manager {
    
    public static $app;
    
    private function __construct() {
        // ..
    }
    /**
     * App
     * 
     * @return \Manager\Libs\Functions
     */
    public static function app() {
        
        if( ! isset( self::$app ) ) {
            
            self::$app = new Functions();
        }
        return self::$app;
    }
    
}

