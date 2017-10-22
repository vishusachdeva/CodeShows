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

    }
?>