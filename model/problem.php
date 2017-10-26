<?php

    class problem_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function fetch($data) {
            $sql = "SELECT * FROM (problem p LEFT JOIN contest_prob c ON p.p_id = c.p_id) LEFT JOIN contest cb ON cb.c_id = c.c_id WHERE ";

            if (isset($data) && isset($data['by']) && $data['by'] == 'all') {


                $sql = $sql."`status`=0 OR status = 1 AND end_time < STR_TO_DATE('".date("Y-m-d G:i:s")."', '%Y-%m-%d %H:%i:%s')";
            }
            else if (isset($data) && isset($data['c_id'])) {
				$sql .= "`status`= 1 AND `c_id` = ".$data['c_id'];
            }
            $sql .= " ORDER BY difficulty ASC";
            var_dump( $sql);die()
;            return query($this->db, $sql);
        }

        function fetch_problem($data) {
            $sql = "SELECT * FROM `problem` WHERE `p_id`=".$data['p_id'];
            $result = query($this->db, $sql);
            $problem = file_open(PROBLEM_PATH.$result[0]['p_name'], "Problem File doesn't exist.");
            return ['p_name' => $result[0]['p_name'], 'p_statement' => $problem, 'time_limit'=> $result[0]['time_limit']];
        }

    }
?>