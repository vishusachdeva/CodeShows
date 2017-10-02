<span onclick = 'p_tab_switch(1);' onmouseover="this.style.cursor='pointer'">EASY</span>
<span onclick = 'p_tab_switch(2);' onmouseover="this.style.cursor='pointer'">MEDIUM</span>
<span onclick = 'p_tab_switch(3);' onmouseover="this.style.cursor='pointer'">HARD</span>
<div id='easy_block'>
<?php
    $i = 0;
    $x = "num_$i";
    while(${$x}['difficulty'] == 1) {
        print("<a href='".generate_link('problem', '?p_id='.${$x}['p_id'])."'>{${$x}['p_name']}</a>&nbsp;{${$x}['p_code']}<br/>");
        $i++;
        $x = "num_$i";
    }
?>
</div>
<div id='med_block' style="display:none">
<?php
    $x = "num_$i";
    while(${$x}['difficulty'] == 2) {
        print("<a href='".generate_link('problem', '?p_id='.${$x}['p_id'])."'>{${$x}['p_name']}</a>&nbsp;{${$x}['p_code']}<br/>");
        $i++;
        $x = "num_$i";
    }
?>

</div>
<div id='hard_block' style="display:none">
<?php
    $x = "num_$i";
    while(${$x}['difficulty'] == 3) {
        print("<a href='".generate_link('problem', '?p_id='.${$x}['p_id'])."'>{${$x}['p_name']}</a>&nbsp;{${$x}['p_code']}<br/>");
        $i++;
        $x = "num_$i";
    }
?>