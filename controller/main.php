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
			$data = loadModel('contest', 'banner');
            loadView('header', array_merge($this->data, ['title' => 'Home - CodeShows']));
            loadView('home', array_merge($this->data, $data, ['len' => count($data)]));
            loadView('footer');
        }

        function contact() {
            loadView('header', array_merge($this->data, ['title' => 'Contact Us - CodeShows']));
            loadView('contact');
            loadView('footer');
        }

    }

?>