<?php

    /*
     *use mysqli instead of mysql(only upto php5)
     */

    function db_connect() {
        //
        //$username = 'lav_kush';
        $password = 'hIsIfff0MvpNobzq';
        $username = 'shivanjal_arora';
         /*
        $username = 'vishusachdeva';
		/*$username = 'root';
		$password = '';*/
        $hostname = 'localhost';
        $database = 'codeshows';
        $db = mysqli_connect($hostname, $username, $password, $database);
        if ($db === false) {
            // redirect
            print("Database not responding");
            redirect_sleep('main','home',5);
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
            print("Please check query : ".$sql);
            redirect_sleep('main','home',5);
            exit();
        }
        if ($result === true) return $result;
        $rows = [];
        // if result is not boolean only then fetch data
        if (!($result === true || $result === false)) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($rows, $row);
            }
        }
        return $rows;
    }

    function db_last_id($db, $table, $id, $last_id = "") {
        if (!isset($last_id) || empty($last_id)) $last_id=mysqli_insert_id($db);
        $sql = "SELECT * FROM $table WHERE $id=".$last_id;
        $result = query($db, $sql);
        return $result[0];
    }

?>