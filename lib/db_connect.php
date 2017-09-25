<?php

    /*
     *use mysqli instead of mysql(only upto php5)
     */

    function db_connect() {
        $username = 'vishusachdeva';
        $password = 'v1kCjsvLYytrBTGV';
        $hostname = 'localhost';
        $database = 'codeshows';
        $db = mysqli_connect($hostname, $username, $password, $database);
        if ($db === false) {
            // redirect
            exit();
        }
        return $db;
    }

    function db_close($db) {
        mysqli_close($db);
    }

    function query($db, $sql) {
        $result = mysqli_query($db, $sql);
        if ($result === false) {
            // redirect
            exit();
        }
        $rows = [];
        // if result is not boolean only then fetch data
        if (!($result === true || $result === false)) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($rows, $row);
            }
        }
        return $rows;
    }

    function db_last_id($db) {
        return mysqli_insert_id($db);
    }

?>