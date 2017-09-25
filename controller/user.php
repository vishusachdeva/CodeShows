<?php

    class user {

        function __construct() {

        }

        function logout() {
            session_start();
            session_destroy();
            print("Log out successfull");
            redirect_sleep('main','home',3);
        }

        function login($arguments) {
            $result = loadModel('user', 'login', $arguments);
            if ($result === false) {
                print("Login Error");
                redirect_sleep('main','home',5);
                exit();
            }
            print("Login Success");
            session_start();
            $_SESSION = $result;
            redirect_sleep('main','home',5);
        }

        function signup($arguments) {
            loadView('header', ['title' => 'SignUp - CodeShows']);
            loadView('signup');
            loadView('footer');
        }

        function register($arguments) {
            $result = loadModel('user', 'register', $arguments);
            if ($result === false) {
                print("Register Error");
                redirect_sleep('main','home',5);
                exit();
            }
            // redirect
            print("register success");
            redirect_sleep('main', 'home',5);
        }

    }

?>