<?php

    class user {

        function __construct() {

        }

        function login($arguments) {
            $result = loadModel('user', 'login', $arguments);
            if ($result === false) {
                //redirect('main', 'home');
                exit();
            }
            session_start();
            $_SESSION['id'] = $result;
        }

        function signup($arguments) {
            loadView('header', ['title' => 'SignUp - CodeShows']);
            loadView('signup');
            loadView('footer');
        }

        function register($arguments) {
            $result = loadModel('user', 'register', $arguments);
            if ($result === false) {
                // redirect
                exit();
            }
            // redirect
            redirect('main', 'home');
        }

    }

?>