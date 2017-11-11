<?php

    class user {

        private $data = array();
        private $auth = false;
        private $f_auth = false;
        private $otp_auth = false;
        private $otp = "";

        function __construct() {
            session_start();
            if(isset($_SESSION) && !empty($_SESSION) && isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
                $this->data = $_SESSION;
                $this->auth = true;
            } else if(isset($_SESSION) && !empty($_SESSION) && isset($_SESSION['otp_verify']) && $_SESSION['otp_verify']) {
                $this->otp_auth = true;
                $this->otp = $_SESSION['otp'];
            }
            else if(isset($_SESSION) && !empty($_SESSION) && isset($_SESSION['f_verify']) && $_SESSION['f_verify']) {
                $this->f_auth = true;
            }
            else {
				session_destroy();
				$this->auth = false;
				$this->f_auth = false;
				$this->data = array();
			}
        }

        function logout() {
            if (!$this->auth) {
                //print('You are not Logged In');
                loadView('error', ['msg' => 'You are not Logged In']);
                exit();
            }
            session_destroy();
            //print("Log out Success");
            if (isset($_SERVER) && isset($_SERVER['HTTP_REFERER'])) header("Location: ".$_SERVER['HTTP_REFERER']);
            else redirect('main','home');
            exit();
        }

        function login($arguments) {
            if (!isset($_POST) || empty($_POST)) {
                redirect('main', 'home');
                exit();
            }
            if ($this->auth) {
                //print('You are already Logged In');
                loadView('error', ['msg' => 'You are already Logged In']);
                exit();
            }
            $result = loadModel('user', 'login', $arguments);
            if ($result == false) {
                //echo("Wrong Password.");
                loadView('error', ['msg' => 'Wrong Email or Password']);
                redirect_sleep('main','home', 3);
                exit();
            }
            //print("Login Success");
            session_start();
            $_SESSION = $result;
            if (isset($_SERVER) && isset($_SERVER['HTTP_REFERER'])) header("Location: ".$_SERVER['HTTP_REFERER']);
            else redirect('main','home');
            exit();
        }

        function signup($arguments) {
            if ($this->auth) {
                //print('You are already Logged In');
                loadView('error', ['msg' => 'You are already Logged In']);
                exit();
            }
            $data = loadModel('user','fetch_batch_data');
            $len = count($data);
            loadView('header', array_merge($this->data, ['title' => 'SignUp - CodeShows']));
            loadView('signup',array_merge($data,['len'=>$len]));
            loadView('footer');
        }

        function send_otp($arguments) {
            if ($this->otp_auth) {
                session_destroy();
            }
            if (!isset($_POST) || empty($_POST) || !isset($_POST['username']) || empty($_POST['username']) || !isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['fname']) || empty($_POST['fname']) || !isset($_POST['lname']) || empty($_POST['lname'])) {
                loadView('error', ['msg' => 'Please check url']);
                exit();
            }
            if ($this->auth) {
                loadView('error', ['msg' => 'You are already Logged in']);
                exit();
            }
            $otp = str_shuffle(bin2hex(openssl_random_pseudo_bytes(3)));;
            $body = "Hello ".$arguments['username']."<br/>Your otp is ".$otp;
            $mail = setMailer();
            try {
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com;';
                $mail->SMTPAuth = true;
                $mail->Username = 'codeshows123@gmail.com';
                $mail->Password = 'codeshows@123';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom('codeshows123@gmail.com', 'CodeShows MNIT');
                $mail->addAddress($arguments['email'], $arguments['fname']." ".$arguments['lname']);
                $mail->isHTML(true);
                $mail->Subject = 'CodeShows - OTP Verification';
                $mail->Body    = $body;
                $mail->AltBody = $body;
                $mail->send();
            } catch (Exception $e) {
                print('error');
                exit();
            }
            session_start();
            $_SESSION['otp_verify'] = true;
            $_SESSION['otp'] = $otp;
        }

        function register($arguments) {
            if (!isset($_POST) || empty($_POST)) {
                redirect('main', 'home');
                exit();
            }
            if ($this->auth) {
                //print('You are already Logged In');
                loadView('error', ['msg' => 'You are already Logged In']);
                exit();
            }
            if (!$this->otp_auth || $this->otp != $arguments['otp']) {
                //print('Please Enter Valid Otp');
                loadView('error', ['msg' => 'Please Enter Valid Otp']);
                exit();
            }
            session_destroy();
            $result = loadModel('user', 'register', $arguments);
            if ($result == false) {
                //print("Register Error");
                loadView('error', ['msg' => 'Register Error']);
                exit();
            }
            //print("register success");
            session_start();
            $_SESSION = $result;
            redirect('main', 'home');
        }

        function forgot_password($arguments) {
            if ($this->auth) {
                //print('Invalid url<br/>Error 404');
                loadView('error', ['msg' => 'Invalid url']);
                exit();
            }
            if(!isset($_POST)|| empty($_POST) || !isset($_POST['f_email']) || empty($_POST['f_email'])) {
                //print('Invalid attempt');
                loadView('error', ['msg' => 'Invalid attempt']);
                exit();
            }
            $result = loadModel('user','forgot_password', $arguments);
            if($result === false) {
                //echo("Invalid Email-ID");
                loadView('error', ['msg' => 'Invalid Email-ID']);
                exit();
            }

            // email verification
            $mail = setMailer();
            ob_start();
            try {
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com;';
                $mail->SMTPAuth = true;
                $mail->Username = 'codeshows123@gmail.com';
                $mail->Password = 'codeshows@123';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom('codeshows123@gmail.com', 'CodeShows MNIT');
                $mail->addAddress($result['email'], $result['fname']." ".$result['lname']);
                $mail->isHTML(true);
                $mail->Subject = 'CodeShows - Password Reset Instructions '.$result['username'];
                $url = 'http';
                if ($_SERVER["HTTPS"] == "on") $url .= "s";
                $url .= "://".$_SERVER["SERVER_NAME"];
                if ($_SERVER["SERVER_PORT"] != "80") $url .= ":".$_SERVER["SERVER_PORT"];
                $url .= "/user/?username=".$result['username']."&forgot_token=".$result['password'];
                $mail->Body    = 'Hi '.$result['username'].',<br/>As you have requested to reset password,<br/>Please open the following url in your browser: <a href="'.$url.'">Reset Password</a>';
                $mail->AltBody = 'Hi '.$result['username'].',<br/>As you have requested to reset password,<br/>Please open the following url in your browser: <a href="'.$url.'">Reset Password</a>';
                $mail->send();
                ob_end_clean();
                echo("<script>alert('Verification instructions has been mailed to you');</script>");
                echo('mail sent successfully');
                echo('<br/>redirecting to home...');
            } catch (Exception $e) {
                ob_end_clean();
                echo "<script>alert('Message could not be sent.');</script>";
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                echo('<br/>redirecting to home...');
            }
            redirect('main', 'home');
            exit();
        }

        function forgot_verify($arguments) {
            if ($this->auth) {
                //print('Invalid url<br/>Error 404');
                loadView('error', ['msg' => 'Invalid url']);
                exit();
            }
            if(!isset($_GET)|| empty($_GET) || !isset($_GET['username']) || empty($_GET['username']) || !isset($_GET['forgot_token']) || empty($_GET['forgot_token'])) {
                //print('Invalid attempt');
                loadView('error', ['msg' => 'Invalid attempt']);
                exit();
            }
            $result = loadModel('user', 'forgot_verify', $arguments);
            if ($result == false) {
                //print('Please check url<br/>Error 404');
                loadView('error', ['msg' => 'Please check url']);
                exit();
            }
            session_start();
            $_SESSION['f_verify'] = true;
            $_SESSION['f_username'] = $_GET['username'];
            loadView('header', ['title' => 'CodeShows - Change Password']);
            loadView('change_password');
            loadView('footer');
        }

        function forgot_change($arguments) {
            if ($this->auth) {
                //print('Invalid url<br/>Error 404');
                loadView('error', ['msg' => 'Invalid url']);
                exit();
            }
            if(!isset($_POST) || empty($_POST) || !isset($_POST['f_password']) || empty($_POST['f_password']) || !isset($_POST['f_confirm_password']) || empty($_POST['f_confirm_password'])) {
                //print('Invalid attempt');
                loadView('error', ['msg' => 'Invalid attempt']);
                exit();
            }
            if(!$this->f_auth) {
                //print('Invalid attempt');
                loadView('error', ['msg' => 'Invalid attempt']);
                exit();
            }
            $result = loadModel('user', 'forgot_change', array_merge($arguments, ['f_username' => $_SESSION['f_username']]));
            session_destroy();
            if ($result == false) {
                //print('Some Error Occured<br/>Please Try Later');
                loadView('error', ['msg' => 'Some Error Occured']);
                exit();
            }
            //print('Password updated successfully');
            session_start();
            $_SESSION = $result;
            redirect('main', 'home');
            exit();
        }

        function subscribe($arguments) {
            $result = loadModel('user', 'subscribe', $arguments);
            if ($result === false) {
                //print('Some Error Occured<br/>Please Try Again');
                loadView('error', ['msg' => 'Some Error Occured']);
                exit();
            } else {
                //print('Thanks, you will get our latest updates');
            }
            redirect('main', 'home');
            exit();
        }


        function profile($arguments) {
            $data = loadModel('user', 'fetch_user', $_SESSION);
            loadView("header", array_merge($this->data, ['title' => $data[0][username]." - CodeShows"]));
            loadView('profile',$this->data);
            loadView("footer");
        }





    }

?>