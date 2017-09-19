<?php
    
    define('ROOT', '/home/ubuntu/workspace/codeshows/');
    define('CONTROLLER_PATH', ROOT.'controller/');
    define('MODEL_PATH', ROOT.'model/');
    define('VIEW_PATH', ROOT.'view/');
    
    function loadView($view, $data = []) {
        extract($data);
        $view_path = VIEW_PATH.$view.'.php';
        if (file_exists($view_path)) {
            require_once($view_path);
        } else {
            // redirect
        }
    }
    
?>