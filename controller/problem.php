<?php

    class problem {

        function all() {
            $data = loadModel("problem", "fetch", ['by' => 'all']);
            loadView("header", ['title' => "Problems - CodeShows"]);
            loadView("collection", array_merge($data, ['len' => count($data)]));
            loadView("footer");
        }

    }

?>