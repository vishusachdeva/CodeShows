<?php
    function sortByScore($a, $b) {
            return $b['total_score'] - $a['total_score'];
    }
    class contest_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

		function banner() {
            mysqli_autocommit($this->db, FALSE);
			$sql = "SELECT * FROM (banner b JOIN contest c ON b.c_id=c.c_id)";
            $result = query($this->db,$sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
		}

        function fetch($data) {
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT * FROM contest";
			if (isset($data) && isset($data['c_id']) && !empty($data['c_id'])) $sql .= " WHERE `c_id`=".$data['c_id'];
			$sql .= " ORDER BY end_time ASC, start_time ASC";
            $result = query($this->db,$sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function solve_part_update($data = []) {
            if(empty($data) || !isset($data)) {
                echo("Could not update database. Please try again later.");
                return;
            }
            extract($data);
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT * FROM solves WHERE user_id = $user_id AND p_id = $p_id";
            $result = query($this->db,$sql);
            $already_exists = true;
            if(empty($result))
                $already_exists = false;

            if($already_exists) {
                $sql = "DELETE FROM solves WHERE user_id = $user_id AND p_id = $p_id ;";
                $res = query($this->db,$sql);
            }

            $sql = "INSERT INTO `solves` VALUES($p_id,$user_id,$run_time,$memory,'$submit_time',$language_id,0);";
            $res = query($this->db,$sql);

            // Now update participation table.
            $sql = "SELECT * FROM problem WHERE p_id = $p_id";
            $iscontestprob = true;
            $res = query($this->db,$sql);

            if($res[0]['status']!=1)
                $iscontestprob = false;
            if(!$already_exists && $iscontestprob)
            {
                $sql = "SELECT c_id FROM contest_prob WHERE p_id = $p_id";
                $result = query($this->db,$sql);
                $c_id = $result[0]['c_id'];
                // Now we have the c_id of the contest.
                $sql = "SELECT * FROM contest WHERE c_id = $c_id";
                $result = query($this->db,$sql);
                $start_time = strtotime($result[0]['start_time']);
                $end_time = strtotime($result[0]['end_time']);
                $submit_time = strtotime($submit_time);
                if($submit_time > $start_time && $submit_time < $end_time) {
                    $sql = "DELETE FROM participation WHERE c_id = $c_id AND user_id = $user_id AND p_id = $p_id";
                    query($this->db,$sql);
                    $sql = "INSERT INTO participation VALUES($user_id,$c_id,$p_id,100)";
                    query($this->db,$sql);
                }
            }
            mysqli_commit($this->db);
            db_close($this->db);
            return true;
        }

        function fetch_ranklist($data = []) {
            // A query to get contest name
            extract($data);
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT contest_name,no_of_problems,end_time FROM contest WHERE c_id = $c_id";
            $res = query($this->db,$sql);
            $end_time = $res[0]['end_time'];
            $c_name = $res[0]['contest_name'];
            $n = $res[0]['no_of_problems'];

            // A query to get all contest problem names.
            $sql = "SELECT p_id, p_code FROM contest_prob NATURAL JOIN problem WHERE c_id = $c_id ";
            $res = query($this->db,$sql);
            $p_mapping = []; // An array which maps p_id and p_name.
            foreach( $res As $key => $value)
            {
                $p_mapping[ $value['p_id'] ] = $value['p_code'];
            }
            // A query to get all usernames who participated in the contest.
            $sql = "SELECT U.username,U.user_id FROM user U WHERE U.user_id IN( SELECT distinct(P.user_id) FROM participation P);";
            $res = query($this->db,$sql);
            $u_mapping = []; // An array which maps user_id and user name.
            foreach( $res As $key => $value)
            {
                $u_mapping[ $value['user_id'] ] = $value['username'];
            }
            // A query to get user_problem_participation data.
            $sql = "SELECT p_id,user_id,score  FROM participation WHERE c_id = $c_id ORDER BY user_id ";
            $res = query($this->db,$sql);
            // Now arrange the data user - wise
            $ranklist = [];
            $temp = [];
            foreach($p_mapping As $id=>$name)
            {
                $temp[$id] = 0;
            }
            foreach($u_mapping As $id => $value)
            {
                $temp1 = $temp;
                $temp1['username'] = $value;
                $temp1['total_score'] = 0;
                $ranklist[$id] = $temp1;
            }
            foreach($res As $key=>$value)
            {
                $old_pscore = $ranklist[$value['user_id']][$value['p_id']];
                $ranklist[$value['user_id']][$value['p_id']] += $value['score'];
                $ranklist[$value['user_id']]['total_score'] += $value['score'] - $old_pscore;
            }
            $i = 0;
            foreach($ranklist As $key=>$value)
            {
                $ranklist1[$i] = $value;
                $i++;
            }
            if (!empty($ranklist1))
                usort($ranklist1, 'sortByScore');

            $final_result['ranklist'] = $ranklist1;
            $final_result['p_mapping'] = $p_mapping;
            $final_result['contest_name'] = $c_name;
            $final_result['end_time'] = $end_time;
            mysqli_commit($this->db);
            db_close($this->db);
            return $final_result;
        }
    }
?>