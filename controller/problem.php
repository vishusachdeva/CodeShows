<?php

    class problem {

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

        function all() {
            $data = loadModel("problem", "fetch", ['by' => 'all']);
            loadView("header", array_merge($this->data, ['title' => "Problems - CodeShows"]));
            loadView("collection", array_merge($data, ['len' => count($data)]));
            loadView("footer");
        }

        function fetch_problem($arguments) {
            $data = loadModel('problem', 'fetch_problem', $arguments);
            loadView("header", array_merge($this->data, ['title' => $data['p_name']." - CodeShows"]));
            loadView("p_statement", array_merge($data));
            loadView('editor', ['auth' => $this->auth , 'p_id' => $arguments['p_id']]);
            loadView('p_submit', ['auth' => $this->auth , 'p_id' => $arguments['p_id']]);
            loadView('result');
            loadView("footer");
        }
    }
?>