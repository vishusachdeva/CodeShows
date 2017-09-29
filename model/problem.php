<?php

    class problem_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function fetch($data) {
            $sql = "SELECT * FROM problem WHERE status=1";
            if ($data['by'] == 'all') {
                $sql .= " AND 1";
            }
            $sql .= " ORDER BY difficulty ASC";
            return query($this->db, $sql);
        }

    }

?>