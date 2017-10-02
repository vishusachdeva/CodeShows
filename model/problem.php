<?php

    class problem_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function fetch($data) {
            $sql = "SELECT * FROM problem WHERE ";
            if ($data['by'] == 'all') {
                $sql .= "`status`=1 AND 1";
            }
            else {
               // $sql .= "`c_id`=".$data['c_id'];
            }
            $sql .= " ORDER BY difficulty ASC";
            return query($this->db, $sql);
        }

        function fetch_problem($data) {
            $sql = "SELECT * FROM `problem` WHERE `p_id`=".$data['p_id'];
            $result = query($this->db, $sql);
            $problem = file_open(PROBLEM_PATH.$result[0]['p_name'], "Problem File doesn't exist.");
            return ['p_name' => $result[0]['p_name'], 'p_statement' => $problem];
        }

    }
?>