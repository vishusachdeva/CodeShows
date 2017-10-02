<?php
    include_once('../lib/config.inc.php');
    if (isset($_POST) && !empty($_POST)){
        extract($_POST);
        if ($submit_mode == '0'){
            $testcase = file_open(SUBMIT_TESTCASE_PATH.$p_id.'.txt',"TestCase File Doesn't exist.");
            // $solution
            /*$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}*/
            print($solution." ".$language." ".$submit_mode." ".$testcase);
            exit();
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
