<?php
    class main {
        
        function __construct() {
            //
        }
        
        function home() {
            loadView('header', ['title' =>'Home' ]);
            loadView('home');
            loadView('footer');
        }
        
    }
?>