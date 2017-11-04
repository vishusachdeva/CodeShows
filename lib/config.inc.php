<?php
    /*define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/');*/
    define('ROOT', '/home/ubuntu/workspace/codeshows/');
    define('SITE_ROOT', '/');
    define('CONTROLLER_PATH', ROOT.'controller/');
    define('MODEL_PATH', ROOT.'model/');
    define('VIEW_PATH', ROOT.'view/');
    define('JS_PATH', SITE_ROOT.'js/');
    define('CSS_PATH', SITE_ROOT.'css/');
    define('IMAGE_PATH', SITE_ROOT.'images/');
    define('PROBLEM_PATH', ROOT.'problem/');
    define('SAMPLE_TESTCASE_PATH', ROOT.'testcase/sample/');
    define('SUBMIT_TESTCASE_PATH', ROOT.'testcase/submit/');
    define('API_PATH', SITE_ROOT.'api/');
    define('COMPILER_PATH', ROOT.'api/compiler/');
    define('IDE_PATH', SITE_ROOT.'ide/');
    define('VENDOR_PATH', ROOT.'vendor/');

    date_default_timezone_set('Asia/Kolkata');

    function generate_link($controller, $function) {
        return '/'.$controller.'/'.$function;
    }

    function loadView($view, $data = []) {
        extract($data, EXTR_PREFIX_INVALID, "num");
        $view_path = VIEW_PATH.$view.'.php';
        if (file_exists($view_path)) {
            require_once($view_path);
        } else {
            // redirect
            print("View Doesn't exist");
            redirect_sleep('main','home',5);
        }
    }

    function loadModel($model, $function, $data =[]) {
        $model_class = $model.'_model';
        $model_path = MODEL_PATH.$model.'.php';
        if (file_exists($model_path)) {
            require_once($model_path);
            $model_object = new $model_class;
            if (method_exists($model_object, $function)) {
                return $model_object->$function($data);
            } else {
                print("Model Function does not exist");
                redirect_sleep('main','home',5);
            }
        } else {
            // redirect
            print("Model does not exist");
            redirect_sleep('main','home',5);
        }
    }

    function redirect_sleep($controller, $function,$time) {
        header("refresh:$time;url=".generate_link($controller,$function) );
    }

    function redirect($controller, $function) {
        header('Location: '.generate_link($controller,$function));
    }

    function file_open($file_path,$error_msg) {
            if(file_exists($file_path)) {
                return file_get_contents($file_path);
            }
            else {
                print($error_msg);
                redirect_sleep('main','home',3);
                exit();
            }
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require VENDOR_PATH.'autoload.php';

    function setMailer() {
        return new PHPMailer(true);
    }

?>