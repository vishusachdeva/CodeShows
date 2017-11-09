<?php

    class problem_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function fetch($data) {
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT * FROM ((problem NATURAL LEFT JOIN contest_prob) NATURAL LEFT JOIN contest cb) NATURAL LEFT JOIN `asg_prob` WHERE ";

            if (isset($data) && isset($data['by']) && $data['by'] == 'all') {
                $sql = $sql."`status`=0 OR status = 1 AND end_time < STR_TO_DATE('".date("Y-m-d G:i:s")."', '%Y-%m-%d %H:%i:%s')";
            }
            else if (isset($data) && isset($data['c_id'])) {
				$sql .= "`status`= 1 AND `c_id` = ".$data['c_id'];
            }
            else if (isset($data) && isset($data['asg_id'])) {
				$sql .= "`status`= 2 AND `asg_id` = ".$data['asg_id'];
            }
            $sql .= " ORDER BY difficulty ASC";
            $result = query($this->db,$sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function fetch_problem($data) {
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT * FROM language WHERE language_id IN ( SELECT language_id FROM `languages_allowed` WHERE `p_id`=".$data['p_id'].")";
            $res = query($this->db, $sql);
            $sql = "SELECT * FROM `problem` WHERE `p_id`=".$data['p_id'];
            $result = query($this->db, $sql);
            $problem = file_open(PROBLEM_PATH.$result[0]['p_filename'], "Problem File doesn't exist.");
            mysqli_commit($this->db);
            db_close($this->db);
            return ['languages_allowed'=>$res, 'p_name' => $result[0]['p_name'], 'p_statement' => $problem, 'time_limit'=> $result[0]['time_limit']];
        }

    }
?>