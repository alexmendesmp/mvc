<?php

namespace Manager\Libs;
/**
 * Functions() Class
 * 
 * Global functions
 * 
 */
class Functions {
    
    public function __construct() {
        // ..
    }
     /**
     * Get Param value
     * 
     * @param string $paramName Param name
     * @return mixed Return Param value or FALSE on failure
     */
    public static function getParam( $paramName ) {
        
        if( ! empty( $_POST ) && count( $_POST ) > 0 ) {

            return filter_input( INPUT_POST, $paramName );
        }
        return filter_input( INPUT_GET, $paramName );
    }
    /**
     * Return Base Url
     * 
     * @return string Base Url
     */
    public static function baseUrl() {
        
        $uri = '';
        $dir = dirname( filter_input( INPUT_SERVER, 'PHP_SELF' ) );
        $host = filter_input( INPUT_SERVER, 'HTTP_HOST' );
        $scheme = filter_input( INPUT_SERVER, 'REQUEST_SCHEME' );
        
        if( in_array( $scheme, array( 'http', 'https' ) ) ) {
            
            $uri = $scheme . '://' . $host . $dir;
        }
        return $uri;
    }

}

