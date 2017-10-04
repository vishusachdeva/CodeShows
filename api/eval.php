<?php
    include_once('../lib/config.inc.php');
     if (isset($_POST) && !empty($_POST) && isset($_POST['solution']) && !empty($_POST['solution'])
     && isset($_POST['p_id']) && !empty($_POST['p_id']) && isset($_POST['time_limit']) && !empty($_POST['time_limit'])){
        extract($_POST);
        $testcase = file_open(SUBMIT_TESTCASE_PATH.$p_id.'.txt', 'Test Case File doesn\'t exist');
        $url = 'http://api.hackerrank.com/checker/submission.json';
        $data = array('source' => $solution, 'lang' => $language, 'testcases' => "[\"$testcase\"]",
        'api_key' => 'hackerrank|1410655-1970|60b06e493f0bcb8e50098333c418ad800fafcacc', 'format' => 'JSON', 'wait' => "true");
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { print('error'); exit(); }
        else if(json_decode($result)->result->compilemessage)
        {
            print('Compiler Message :<br>');
            print(nl2br(htmlentities(mb_convert_encoding(json_decode($result)->result->compilemessage,"ISO-8859-1","UTF-8"))).'<br/>');
            print('Exit Status<br>');
            print(nl2br(json_decode($result)->result->result).'<br>');
            exit();
        }
        else if(json_decode($result)->result->message[0]!="Success")
        {
            print('Error Message (stderr) :<br>');
            print(nl2br(htmlentities(mb_convert_encoding(json_decode($result)->result->message[0],"ISO-8859-1","UTF-8"))).'<br>');
            exit();
        }
        else if(json_decode($result)->result->time[0]>$time_limit)
        {
            print('Error Message (stderr) :<br>');
            print('Terminated due to timeout<br>');
            exit();

        }
        $out_file = file_open(SUBMIT_TESTCASE_PATH.$p_id.'o.txt', 'Output File doesn\'t exist');
        if ($out_file == json_decode($result)->result->stdout[0] || $out_file == json_decode($result)->result->stdout[0]."\n") print("Accept ".json_decode($result)->result->time[0].'<br>');
        else print('WA<br/>');
    } else {
        print('Error!! Please Try Later');
    }
?>
