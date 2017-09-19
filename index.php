<?php
    
    include_once('lib/config.inc.php');
    
    $controller = 'main';
    $function = 'home';
    
    if (isset($_GET['controller']) && isset($_GET['function'])) {
        $controller = $_GET['controller'];
        $function = $_GET['function'];
    } else if (isset($_GET['controller']) || isset($_GET['function'])) {
        //$controller = 'error';
        //$function = 'e404';
        // redirect
    }
    
    $controller_path = CONTROLLER_PATH.$controller.'.php';
    
    if (file_exists($controller_path)) {
        require_once($controller_path);
        $object = new $controller;
        if (method_exists($object, $function)) {
            $object->$function();
        } else {
            // redirect
        }
    } else {
        // redirect
    }
    
?>