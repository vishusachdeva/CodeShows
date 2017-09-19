<?php
    
    class user {
        
        function __construct() {
            
        }
        
        function login() {
            
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
        }
        
    }
    
?>