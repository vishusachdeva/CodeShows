/*controller/main.php         to insert the data during SignUp*/

INSERT INTO `user` (`fname`, `lname`, `username`, `institute_id`, `email`, `password`, `sem`, `cg`, `branch`,
            `dob`, `batch`, `about_me`) VALUES('$fname', '$lname', '$username', '$institute_id', '$email',
            '".password_hash($password, PASSWORD_BCRYPT)."', $sem, $cg, '$branch', '$dob', '$batch', '$about_me');
            
