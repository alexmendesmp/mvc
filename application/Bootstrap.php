<?php
/*
 * Description: Bootstrap
 * Author: Alex Mendes
 */

// Define Constants
define( 'DS', DIRECTORY_SEPARATOR );
define( 'MANAGER_APP_DIR', dirname( __FILE__ ) . DS );
define( 'MANAGER_LIBS_DIR', MANAGER_APP_DIR . 'src' . DS . 'Manager' . DS . 'Libs' . DS );
define( 'MANAGER_CONTROLLERS_DIR', MANAGER_APP_DIR . 'src' . DS . 'Manager' . DS . 'Controllers' . DS );
define( 'MANAGER_MODELS_DIR', MANAGER_APP_DIR . 'src' . DS . 'Manager' . DS . 'Models' . DS );
define( 'MANAGER_VIEWS_DIR', MANAGER_APP_DIR . 'src' . DS . 'Manager' . DS . 'Views' . DS );

// Includes
require_once  MANAGER_LIBS_DIR . 'DB.php';

$tmp = filter_input( INPUT_GET, 'qy' );
$qy = explode( '/', $tmp );

// Controller
if( isset( $qy[0] ) ) $qController = $qy[0];
    else $qController = null;
// Action
if( isset( $qy[1] ) ) $qAction = $qy[1];
    else $qAction = null;
// Parameter
if( isset( $qy[2] ) ) $qParam = $qy[2];
    else $qParam = null;

//echo '<br />controller -> ' . $qController;
//echo '<br />action -> ' . $qAction;
//echo '<br />param -> ' . $qParam;

/*
 * If controller is passed and exists
 * than initialize it.
 */
if( ! is_null( $qController ) && ! empty( $qController ) ) {
    $controllerNameSpace = 'Manager\\Controllers\\';
    $qControllerFileName = ucfirst( $qController ) . '.php';
    $qControllerClassName = $controllerNameSpace . ucfirst( $qController );
        
    if( file_exists( MANAGER_CONTROLLERS_DIR . $qControllerFileName ) ) {
        // Verify whether class exists or not
        if( class_exists( $qControllerClassName ) ) {

            $app = new $qControllerClassName();
            $app->loadViewObject( new Manager\Views\View() );
            
            if( ! is_null( $qAction ) && ! empty( $qAction ) ) {
                // param is optional
                $app->$qAction( $qParam );
            } else {
                
                $app->index();
            }
        } else {
            // if not.. then call default controller
            callDefaultController();
        }
    }
} else {
    
    // Or.. initialize default controller
    callDefaultController();
}

/**
 * Call default controller
 * 
 * @return object $app
 */
function callDefaultController() {
    
    $app = new Manager\Controllers\Controller();
    $app->loadViewObject( new Manager\Views\View() );
    $app->index();
}