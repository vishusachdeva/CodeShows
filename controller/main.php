<?php

    class main {
        private $data = array();
        function __construct() {
            session_start();
            if(isset($_SESSION) && !empty($_SESSION))
            {
                $this->data = $_SESSION;
            }
        }

        function home() {
            loadView('header', array_merge($this->data, ['title' => 'Home - CodeShows']));
            loadView('home');
            loadView('footer');
        }

    }

?>