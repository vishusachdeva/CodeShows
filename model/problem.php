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

        function fetch_problem($data) {
            $sql = "SELECT * FROM `problem` WHERE `p_id`=".$data['p_id'];
            $result = query($this->db, $sql);
            $problem = file_get_contents(PROBLEM_PATH.$result[0]['p_name']);
            return ['p_name' => $result[0]['p_name'], 'p_statement' => $problem];
        }

    }

?>