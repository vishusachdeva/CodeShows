<?php

    class contest {

        private $data = array();
        private $auth = 0;

        function __construct() {
            session_start();
            if(isset($_SESSION) && !empty($_SESSION)) {
                $this->data = $_SESSION;
                $this->auth = 1;
            }
            else $this->auth = 0;
        }

        function all($arguments) {
            $data = loadModel("problem", "fetch", ['by' => $arguments['c_id']]);
            loadView("header", array_merge($this->data, ['title' => $data['c_name']." - CodeShows"]));
            //loadView("collection", array_merge($data, ['len' => count($data)]));
            loadView("footer");
        }


    }
?>