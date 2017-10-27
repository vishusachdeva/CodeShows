<?php

    class contest_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

		function banner() {
			$sql = "SELECT * FROM (banner b JOIN contest c ON b.c_id=c.c_id)";
			return query($this->db, $sql);
		}

        function fetch($data) {
            $sql = "SELECT * FROM contest";
			if (isset($data) && isset($data['c_id']) && !empty($data['c_id'])) $sql .= " WHERE `c_id`=".$data['c_id'];
			$sql .= " ORDER BY end_time ASC, start_time ASC";
            return query($this->db, $sql);
        }

        function solve_part_update($data = [])
        {
            if(empty($data) || !isset($data))
            {
                echo("Could not update database. Please try again later.");
                return;
            }
            extract($data);
            //var_dump($data);
            $sql = "SELECT * FROM solves WHERE user_id = $user_id AND p_id = $p_id";
            $result = query($this->db,$sql);
            $already_exists = true;
            if(empty($result))
                $already_exists = false;

            if($already_exists)
            {
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
                if($submit_time > $start_time && $submit_time < $end_time)
                {
                    $sql = "SELECT * FROM participation WHERE c_id = $c_id AND user_id = $user_id";
                    $result = query($this->db,$sql);
                    $participation = false;
                    if(!empty($result[0]))
                        $participation = true;
                    if($participation)
                    {
                        $sql = "UPDATE participation SET score = score + 100 WHERE user_id = $user_id AND $c_id = c_id";
                    }
                    else
                    {
                        $sql = "INSERT INTO participation VALUES($user_id,$c_id,100)";
                    }
                    query($this->db,$sql);
                }
            }
            return true;
        }
    }
?>