<?php

    class user_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function login($data = []) {
            extract($data);
            $sql = "SELECT `password`, `user_id` FROM `user` WHERE `email`='$email'";
            $result = query($this->db, $sql);
            if ($result === false) {
                db_close($this->db);
                return $result;
            }
            $hash = $result[0]['password'];
            $res = password_verify($password, $hash);
            if ($res !== false) $result = $result[0]['user_id'];
            db_close($this->db);
            return $result;
        }

        function register($data = []) {
            extract($data);
            $sql = "INSERT INTO `user` (`fname`, `lname`, `username`, `institute_id`, `email`, `password`, `sem`, `cg`, `branch`,
            `dob`, `batch`, `about_me`) VALUES('$fname', '$lname', '$username', '$institute_id', '$email',
            '".password_hash($password, PASSWORD_BCRYPT)."', $sem, $cg, '$branch', '$dob', '$batch', '$about_me')";
            $result = query($this->db, $sql);
            db_close($this->db);
            return $result;
        }

    }

?>