<?php

    class asg_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function fetch($data) {
            mysqli_autocommit($this->db, FALSE);
            if (isset($data['user_id']) && !empty($data['user_id']) && (!isset($data['batch_id']) || empty($data['batch_id']))) {
			    $sql = "SELECT * FROM asg NATURAL LEFT OUTER JOIN batch WHERE user_id=".$data['user_id']." ORDER BY time_of_addition DESC";
			    $result = query($this->db, $sql);
			    $i = 0;
			    $len = count($result);
			    while($i < $len) {
                    $sql2 = "SELECT * FROM asg_prob INNER JOIN problem ON asg_prob.p_id=problem.p_id WHERE asg_id=".$result[$i]['asg_id'];
                    $result[$i]['problems'] = query($this->db, $sql2);
                    $i++;
                }
                mysqli_commit($this->db);
                db_close($this->db);
                return $result;
			}
            $sql = "SELECT * FROM asg WHERE batch_id=".$data['batch_id'];
            if (isset($data) && isset($data['asg_id']) && !empty($data['asg_id'])) $sql .= " AND `asg_id`=".$data['asg_id'];
			$sql .= " ORDER BY time_of_addition DESC";
            $result = query($this->db, $sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function add_asg($data) {
            mysqli_autocommit($this->db, FALSE);
            $sql = "INSERT INTO `asg`(`asg_name`, `start_time`, `end_time`, `user_id`, `batch_id`, `time_of_addition`)
            VALUES('".$data['asg_name']."', '".$data['start_time']."', '".$data['end_time']."',
            ".$data['user_id'].", ".$data['batch'].", '".date("Y-m-d H:i:s")."')";
            $result = query($this->db, $sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function fetch_batch_data($data) {
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT * FROM `batch` WHERE `batch_id` IN (SELECT `batch_id` FROM `teacher_batch` WHERE `user_id` = ".$data['user_id'].")";
            $result = query($this->db,$sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }
    }
?>