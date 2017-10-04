<?php

    class contest_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function fetch($data) {
            $sql = "SELECT * FROM contest ORDER BY end_time ASC, start_time ASC";
            return query($this->db, $sql);
        }

        function fetch_contest($data) {
            $sql = "SELECT * FROM (`contest` JOIN `problem` ON `status` = `c_id`)";
            return query($this->db, $sql);
        }

    }
?>