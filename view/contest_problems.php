<?php
    $i = 0;
    $x = "num_$i";
    while($i < $len) {
        print("<a href='".generate_link('problem', '?p_id='.${$x}['p_id'])."'>{${$x}['p_name']}</a>&nbsp;{${$x}['p_code']}<br/>");
        $i++;
        $x = "num_$i";
    }
?>