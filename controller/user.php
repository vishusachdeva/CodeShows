<?php

    class user {

        private $data = array();
        private $auth = 0;

        function __construct() {
            session_start();
            if(isset($_SESSION) && !empty($_SESSION)) {
                $this->data = $_SESSION;
                $this->auth = 1;
            }
            else {
				session_destroy();
				$this->auth = 0;
			}
        }

        function logout() {
            if (!$this->auth) {
                print('You are not Logged In');
                redirect_sleep('main', 'home', 5);
                exit();
            }
            session_destroy();
            print("Log out Success");
            redirect_sleep('main','home', 3);
        }

        function login($arguments) {
            if (!isset($_POST) || empty($_POST)) {
                redirect('main', 'home');
                exit();
            }
            if ($this->auth) {
                print('You are already Logged In');
                redirect_sleep('main', 'home', 5);
                exit();
            }
            $result = loadModel('user', 'login', $arguments);
            if ($result === false) {
                print("Login Error");
                redirect_sleep('main','home', 5);
                exit();
            }
            print("Login Success");
            session_start();
            $_SESSION = $result;
            redirect_sleep('main','home', 5);
        }

        function signup($arguments) {
            if ($this->auth) {
                print('You are already Logged In');
                redirect_sleep('main', 'home', 5);
                exit();
            }
            loadView('header', array_merge($this->data, ['title' => 'SignUp - CodeShows']));
            loadView('signup');
            loadView('footer');
        }

        function register($arguments) {
            if (!isset($_POST) || empty($_POST)) {
                redirect('main', 'home');
                exit();
            }
            if ($this->auth) {
                print('You are already Logged In');
                redirect_sleep('main', 'home', 5);
                exit();
            }
            $result = loadModel('user', 'register', $arguments);
            if ($result === false) {
                print("Register Error");
                redirect_sleep('main','home', 5);
                exit();
            }
            print("register success");
            session_start();
            $_SESSION = $result;
            redirect_sleep('main', 'home', 5);
        }
        function load_forgot_password_page()
        {
            loadView('header',['title' => 'Forgot Password - CodeShows']);
            loadView('forgot_password');
            loadView('footer');
        }
        function forgot_password($arguments)
        {
            if(!isset($_POST)|| empty($_POST))
            {
                redirect_sleep('main','home', 3);
                exit();
            }
            extract($_POST);
            $result = loadModel('user','forgot_password',$_POST);
            if($result === false)
            {
                echo("Invalid Username or Password");
                redirect_sleep('main','home', 3);
                exit();
            }
            //require 'PHPMailerAutoload.php';
             require("libphp-phpmailer/class.phpmailer.php");

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                    // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                             // Enable SMTP authentication
$mail->Username = 'allduc.vitale@gmail.com';        // SMTP username
$mail->Password = 'audrey777';                      // SMTP password
$mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                  // TCP port to connect to

$mail->setFrom('allduc.vitale@gmail.com');
$mail->addAddress('allduc.vitale@gmail.com');       // Add a recipient (it's OK to use your email for the test)

$mail->isHTML(true);                                // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.'."\n";
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent'."\n";
}
            /*
            $headers = 'From: shivanjal9@gmail.com' . " " .
            'Reply-To: 2015UCP1229@mnit.ac.in' . " " .
            'X-Mailer: PHP/' . phpversion();
            $msg = "Your new password is :'$result'";
            $result = mail($email,"NEW PASSWORD - CodeShows",$msg,$headers);
            if($result = false)
            {
                echo("Please try again later.");
                redirect_sleep('main','home',3);
                exit();
            }
            echo("Password changed successfully.");
            */
        }

        function subscribe($arguments) {
            $result = loadModel('user', 'subscribe', $arguments);
            if ($result === false) {
                print('Some error occured');
            } else {
                print('Thanx you will get our latest updates');
            }
            redirect_sleep('main', 'home', 3);
        }

    }

?>