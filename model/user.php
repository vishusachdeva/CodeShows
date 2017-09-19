<?php
    
    class user_model {
        
        private $db;
        
        function __construct() {
            $this->db = connect();
        }
        
        function register($data = []) {
            extract($data);
            $sql = "INSERT INTO `user` (`fname`, `lname`, `username`, `institute_id`, `email`, `password`, `sem`, `cg`, `branch`,
            `dob`, `batch`, `about_me`) VALUES('$fname', '$lname', '$username', '$institute_id', '$email',
            '".password_hash($password, PASSWORD_BCRYPT)."', $sem, $cg, '$branch', '$dob', '$batch', '$about_me')";
            $result = query($this->db, $sql);
            return $result;
        }
        
    }
    
?>