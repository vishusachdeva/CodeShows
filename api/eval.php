<?php
    include_once('../lib/config.inc.php');
    if (isset($_POST) && !empty($_POST)){
        extract($_POST);
        if ($submit_mode == '0'){
            $testcase = file_open(SUBMIT_TESTCASE_PATH.$p_id.'.txt',"TestCase File Doesn't exist.");
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["solution"]["name"]);
            $uploadOk = 1;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            if ($_FILES["solution"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            if($file_type != "c" && $file_type != "cpp" && $file_type != "py"
            && $file_type != "java" ) {
                echo "Wrong file extension";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["solution"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["solution"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        else if(isset($submit_mode) && !empty($submit_mode) && $submit_mode == 1){

        }
        $client="b9655b4b6d013a5af14743d8ec74c8b3441a67aa";
        require_once(COMPILER_PATH.'hackapi.php');
        $hack = new HackApi;
        $hack->set_client_secret($client);
        $hack->init($language,$solution,$testcase);
        $hack->run();
        echo $hack->compile_status;
    }
?>
