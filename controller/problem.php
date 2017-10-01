<?php

    class problem {

        function all() {
            $data = loadModel("problem", "fetch", ['by' => 'all']);
            loadView("header", ['title' => "Problems - CodeShows"]);
            loadView("collection", array_merge($data, ['len' => count($data)]));
            loadView("footer");
        }

        function fetch_problem($arguments) {
            $data = loadModel('problem', 'fetch_problem', $arguments);
            loadView("header", ['title' => $data['p_name']." - CodeShows"]);
            loadView("p_statement", array_merge($data));
            loadView("footer");
        }

    }

?>