<?php

    class user_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function validate($data = []) {
            extract($data);
            $i_patt = '/2[0-9]{3}[a-zA-Z]{3}[0-9]{4}/';
            $e_patt = '/.+@.+\..+/';
            $msg = "";
            $sql = "SELECT * FROM `user` WHERE username='$username'";
            $result1 = query($this->db, $sql);
            $sql = "SELECT * FROM `user` WHERE institute_id='$institute_id'";
            $result2 = query($this->db, $sql);
            $sql = "SELECT * FROM `user` WHERE email='$email'";
            $result3 = query($this->db, $sql);
            if (count($result1)) {
                $msg = "Username Already exist";
            } else if (count($result2)) {
                $msg = "Institute ID Already exist";
            } else if (count($result3)) {
                $msg = "Email-ID Already exist";
            } else if (!ctype_alpha($fname) || strlen($fname) > 20) {
                $msg = "Invalid First Name";
            } else if (!ctype_alpha($lname) || strlen($lname) > 20) {
                $msg = "Invalid Last Name";
            } else if (!ctype_alpha($username) || strlen($username) > 20) {
                $msg = "Invalid User Name";
            } else if (!preg_match($i_patt, $institute_id)) {
                $msg = "Invalid Institute Id";
            } else if (!preg_match($e_patt, $email)) {
                $msg = "Invalid Email";
            } else if (strlen($password) < 8) {
                $msg = "Invalid Password";
            } else if ($password !== $confirm) {
                $msg = "Passwords do not match";
            } else if (!is_numeric($sem)) {
                $msg = "Invalid Sem";
            } else if (!is_numeric($cg)) {
                $msg = "Invalid CGPA";
            } else if (!ctype_alpha($branch)) {
                $msg = "Invalid Branch";
            } else if (!ctype_alnum($batch)) {
                $msg = "Invalid Batch";
            } else if ($dob >= date("Y-m-d")) {
                $msg = "Invalid Date of Birth";
            }
            return $msg;
        }

        function login($data = []) {
            extract($data);
            $sql = "SELECT * FROM `user` WHERE `email`='$email'";
            $result = query($this->db, $sql);
            if ($result === false) {
                db_close($this->db);
                return $result;
            }
            $hash = $result[0]['password'];
            $res = password_verify($password, $hash);
            if ($res !== false) $result = $result[0];
            else $result = false;
            db_close($this->db);
            return $result;
        }

        function register($data = []) {
            $msg = $this->validate($data);
            if ($msg) {
                print($msg);
                redirect_sleep('main', 'home', 5);
                exit();
            }
            extract($data);
            $sql = "INSERT INTO `user` (`fname`, `lname`, `username`, `institute_id`, `email`, `password`, `sem`, `cg`, `branch`,
            `dob`, `batch`, `about_me`) VALUES('$fname', '$lname', '$username', '$institute_id', '$email',
            '".password_hash($password, PASSWORD_BCRYPT)."', $sem, $cg, '$branch', '$dob', '$batch', '$about_me')";
            $result = query($this->db, $sql);
            if ($result === true) {
                $result = db_last_id($this->db, 'user', 'user_id');
            }
            db_close($this->db);
            return $result;
        }

        function forgot_password($data = [])
        {
            extract($data);
            $sql = "SELECT * FROM user WHERE `username`= '$username' AND `email` = '$email' ";
            $result = query($this->db,$sql);
            if(empty($result))
            {
                db_close($this->db);
                return false;
            }
            $password = bin2hex(openssl_random_pseudo_bytes(10));
            $sql = "UPDATE user SET `password` = '".password_hash($password, PASSWORD_BCRYPT)."' WHERE username = '$username'";
            $result = query($this->db,$sql);
            db_close($this->db);
            if($result === false)
                return false;
            return $password;
        }
    }
?>