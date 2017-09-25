<?php

    define('ROOT', '/home/ubuntu/workspace/codeshows/');
    define('SITE_ROOT', 'https://ide50-vishusachdeva.cs50.io/');
    define('CONTROLLER_PATH', ROOT.'controller/');
    define('MODEL_PATH', ROOT.'model/');
    define('VIEW_PATH', ROOT.'view/');

    function generate_link($controller, $function) {
        return '/'.$controller.'/'.$function;
    }

    function loadView($view, $data = []) {
        extract($data);
        $view_path = VIEW_PATH.$view.'.php';
        if (file_exists($view_path)) {
            require_once($view_path);
        } else {
            // redirect
        }
    }

    function loadModel($model, $function, $data) {
        $model_class = $model.'_model';
        $model_path = MODEL_PATH.$model.'.php';
        if (file_exists($model_path)) {
            require_once($model_path);
            $model_object = new $model_class;
            if (method_exists($model_object, $function)) {
                $model_object->$function($data);
            } else {
                // redirect
            }
        } else {
            // redirect
        }
    }

    function redirect($controller, $function) {
        header('Location: /'.$controller.'/'.$function);
    }

?>