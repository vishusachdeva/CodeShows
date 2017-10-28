<?php

    include_once('lib/config.inc.php');
    include_once('lib/db_connect.php');
    date_default_timezone_set('Asia/Kolkata');

    $controller = 'main';
    $function = 'home';

    if (isset($_GET['controller']) && isset($_GET['function'])) {
        $controller = $_GET['controller'];
        $function = $_GET['function'];
    } else if (isset($_GET['controller']) || isset($_GET['function'])) {
        //$controller = 'error';
        //$function = 'e404';
        // redirect
        print("Please check url");
        redirect_sleep('main', 'home', 5);
    }

    $controller_path = CONTROLLER_PATH.$controller.'.php';

    if (file_exists($controller_path)) {
        require_once($controller_path);
        $controller_object = new $controller;
        if (method_exists($controller_object, $function)) {
            $controller_object->$function(array_merge(array_merge($_GET, $_POST), array_merge($_FILES, $_SERVER)));
        } else {
            // redirect
            print("Controller Function does not exist");
			redirect_sleep('main', 'home', 5);
        }
    } else {
        // redirect
        print("Controller does not exist");
        redirect_sleep('main', 'home', 5);
    }

?>