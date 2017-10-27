<table class="w3-table w3-bordered w3-hoverable">
<?php
    $i = 0;
    $x = "num_$i";
    $time_now=mktime(date('h')+11,date('i')+58,date('s'));
    $cur_time = date('Y-m-d H:i:s', $time_now);
    $cur_time = strtotime($cur_time);
    if(!isset($num_0['start_time']) || empty($num_0['start_time'])) {
        echo("Contest doesn't contain any problems.");
        redirect_sleep('main','home',3);
        exit();
    }
    $start_time = strtotime($start_time);

    if($start_time < $cur_time)
    {?>
        <tr><th>Problem Name</th><th>Problem Code</th><th>Accuracy</th></tr>
        <?php
        while($i < $len) { ?>
            <tr style='cursor:pointer' onclick="location.href='<?php echo(generate_link('problem', '?p_id='.${$x}['p_id'])); ?>'">
    			<td><?php echo(${$x}['p_name']); ?></td>
    			<td><?php echo(${$x}['p_code']); ?></td>
    			<td><?php echo(${$x}['p_code']); ?></td>
    		</tr>
    	<?php
    		$i++;
            $x = "num_$i";
        }
    }
    else
    {
        echo("Problems will be available after " .($num_0['start_time']));
    }
?>
</table>