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
            if (isset($batch) && !empty($batch)) {
                $sql = "SELECT * FROM `batch` WHERE batch_id='$batch'";
                $result4 = query($this->db, $sql);
                if (!count($result4)) {
                    $msg = "Invalid Batch<br/>";
                }
            }
            if (count($result1)) {
                $msg = "Username Already exist";
            } else if (count($result2)) {
                $msg = "Institute ID Already exist";
            } else if (count($result3)) {
                $msg = "Email-ID Already exist";
            } else if (!isset($fname) || empty($fname) || !ctype_alpha($fname) || strlen($fname) > 20) {
                $msg = "Invalid First Name";
            } else if (!isset($lname) || empty($lname) || !ctype_alpha($lname) || strlen($lname) > 20) {
                $msg = "Invalid Last Name";
            } else if (!isset($username) || empty($username) || !ctype_alpha($username) || strlen($username) > 20) {
                $msg = "Invalid User Name";
            } else if ((!isset($institute_id) || empty($institute_id) || !preg_match($i_patt, $institute_id)) && $type == 1) {
                $msg = "Invalid Institute Id";
            } else if (!isset($email) || empty($email) || !preg_match($e_patt, $email)) {
                $msg = "Invalid Email";
            } else if (!isset($password) || empty($password) || strlen($password) < 8) {
                $msg = "Invalid Password";
            } else if (!isset($confirm) || empty($confirm) || $password !== $confirm) {
                $msg = "Passwords do not match";
            } else if ((!isset($sem) || empty($sem) || !is_numeric($sem)) && $type == 1) {
                $msg = "Invalid Sem";
            } else if ((!isset($cg) || empty($cg) || !is_numeric($cg)) && $type == 1) {
                $msg = "Invalid CGPA";
            } else if (!isset($branch) || empty($branch) || !ctype_alpha($branch)) {
                $msg = "Invalid Branch";
            } else if ((!isset($batch) || empty($batch) || !ctype_alnum($batch)) && $type == 1) {
                $msg = "Invalid Batch";
            } else if (!isset($dob) || empty($dob) || $dob >= date("Y-m-d")) {
                $msg = "Invalid Date of Birth";
            } else if (!isset($type) || empty($type) || ($type != 1 && $type != 2)) {
                $msg = "Invalid Data";
            } else if (!isset($otp) || empty($otp)) {
                $msg = "Invalid OTP";
            }
            return $msg;
        }

        function login($data = []) {
            extract($data);
            $sql = "SELECT * FROM `user` WHERE `email`='$email'";
            $result = query($this->db, $sql);
            if ($result == false) {
                db_close($this->db);
                return $result;
            }
            $hash = $result[0]['password'];
            $res = password_verify($password, $hash);
            if ($res != false) $result = $result[0];
            else $result = false;
            if ($result && $result['type'] == 1) {
                $sql = "SELECT * FROM `student` NATURAL JOIN `user` WHERE `user_id`=".$result['user_id'];
                $result = query($this->db, $sql);
            } else if ($result && $result['type'] == 2) {
                $sql = "SELECT * FROM `teacher` NATURAL JOIN `user` WHERE `user_id`=".$result['user_id'];
                $result = query($this->db, $sql);
            }
            db_close($this->db);
            return $result[0];
        }

        function register($data = []) {
            $msg = $this->validate($data);
            if ($msg) {
                print($msg);
                redirect_sleep('main', 'home', 5);
                exit();
            }
            extract($data);
            $sql = "INSERT INTO `user` (`fname`, `lname`, `username`, `institute_id`, `email`, `password`, `branch`,
            `dob`, `about_me`, `type`) VALUES('$fname', '$lname', '$username', '$institute_id', '$email',
            '".password_hash($password, PASSWORD_BCRYPT)."', '$branch', '$dob', '$about_me', '$type')";
            $result = query($this->db, $sql);
            if ($result === true) {
                $last_id = mysqli_insert_id($this->db);
                $result = db_last_id($this->db, 'user', 'user_id');
                if ($type == 1) {
                    $sql = "INSERT INTO `student` VALUES('".$result['user_id']."', '$sem', '$cg', '$batch')";
                    $result2 = query($this->db, $sql);
                    if ($result2 === true) {
                        $result = array_merge($result, db_last_id($this->db, 'student', 'user_id', $last_id));
                    } else {
                        $result = false;
                    }
                } else {
                    $sql = "INSERT INTO `teacher` VALUES('".$result['user_id']."', 0)";
                    $result2 = query($this->db, $sql);
                    if ($result2 === true) {
                        $result = array_merge($result, db_last_id($this->db, 'teacher', 'user_id', $last_id));
                    } else {
                        $result = false;
                    }
                }
            }
            db_close($this->db);
            return $result;
        }

        function forgot_password($data = []) {
            $sql = "SELECT * FROM `user` WHERE `email`='".$data['f_email']."'";
            $result = query($this->db,$sql);
            if(empty($result)) {
                db_close($this->db);
                return false;
            }
            db_close($this->db);
            return $result[0];
        }

        function forgot_verify($data = []) {
            $sql = "SELECT * FROM `user` WHERE username='".$data['username']."' AND password='".$data['forgot_token']."'";
            $result = query($this->db,$sql);
            if(empty($result)) {
                db_close($this->db);
                return false;
            }
            db_close($this->db);
            return true;
        }

        function forgot_change($data = []) {
            if (!isset($data) || empty($data)
            || !isset($data['f_password']) || empty($data['f_password'])
            || !isset($data['f_confirm_password']) || empty($data['f_confirm_password'])
            || $data['f_password'] != $data['f_confirm_password'])
                return false;
            $sql = "UPDATE `user` SET `password`='".password_hash($data['f_password'], PASSWORD_BCRYPT)."' WHERE username='".$data['f_username']."'";
            $result = query($this->db,$sql);
            if(empty($result)) {
                db_close($this->db);
                return false;
            }
            $sql = "SELECT * FROM `user` WHERE username='".$data['f_username']."'";
            $result = query($this->db,$sql);
            if(empty($result)) {
                db_close($this->db);
                return false;
            }
            $result = $result[0];
            if ($result['type'] == 1) {
                $sql = "SELECT * FROM `student` NATURAL JOIN `user` WHERE `user_id`=".$result['user_id'];
                $result = query($this->db, $sql);
            } else if ($result[0]['type'] == 2) {
                $sql = "SELECT * FROM `teacher` NATURAL JOIN `user` WHERE `user_id`=".$result['user_id'];
                $result = query($this->db, $sql);
            }
            db_close($this->db);
            return $result[0];
        }

        function subscribe($arguments) {
            $sql = "INSERT INTO `subscription`(`name`, `email`) VALUES('".$arguments['s_name']."', '".$arguments['s_email']."')";
            $result = query($this->db,$sql);
            db_close($this->db);
            if($result === false)
                return false;
            return $result;
        }

        function fetch_batch_data() {
            $sql = "SELECT * FROM batch";
            $result = query($this->db,$sql);
            db_close($this->db);
            return $result;
        }

    }
?>