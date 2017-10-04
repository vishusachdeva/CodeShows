<span onclick = 'c_tab_switch(1);' onmouseover="this.style.cursor='pointer'">Present</span>
<span onclick = 'c_tab_switch(2);' onmouseover="this.style.cursor='pointer'">Upcoming</span>
<span onclick = 'c_tab_switch(3);' onmouseover="this.style.cursor='pointer'">Archived</span>
<div id='present_block'>
<?php
    $i = 0;
    $x = "num_$i";
    while($i < $len) {
        if (strtotime(${$x}['start_time']) <= strtotime($curr_time) && strtotime(${$x}['end_time']) >= strtotime($curr_time))
            print("<a href='".generate_link('contest', '?c_id='.${$x}['c_id'])."'>{${$x}['contest_name']}</a>");
        $i++;
        $x = "num_$i";
    }
?>
</div>
<div id='future_block' style="display:none">
<?php
    $i = 0;
    $x = "num_$i";
    while($i < $len) {
        if (strtotime(${$x}['start_time']) > strtotime($curr_time) && strtotime(${$x}['end_time']) > strtotime($curr_time))
            print("<a href='".generate_link('contest', '?c_id='.${$x}['c_id'])."'>{${$x}['contest_name']}</a>");
        $i++;
        $x = "num_$i";
    }
?>

</div>
<div id='past_block' style="display:none">
<?php
    $i = 0;
    $x = "num_$i";
    while($i < $len) {
        if (strtotime(${$x}['start_time']) < strtotime($curr_time) && strtotime(${$x}['end_time']) < strtotime($curr_time))
            print("<a href='".generate_link('contest', '?c_id='.${$x}['c_id'])."'>{${$x}['contest_name']}</a>");
        $i++;
        $x = "num_$i";
    }
?>