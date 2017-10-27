<?php

    class asg_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function fetch($data) {
            $sql = "SELECT * FROM asg WHERE batch_id=".$data['batch_id'];
            if (isset($data) && isset($data['asg_id']) && !empty($data['asg_id'])) $sql .= " AND `asg_id`=".$data['asg_id'];
			$sql .= " ORDER BY date_of_addition DESC";
            return query($this->db, $sql);
        }

    }
?>