<?php

    class main {
        private $data = array();
        function __construct() {
            //
            session_start();
            if(isset($_SESSION))
            {
                $this->data = $_SESSION;
            }
        }

        function home() {
            loadView('header',['title' => 'Home']);
            loadView('home',$this->data);
            loadView('footer');
        }

    }

?>