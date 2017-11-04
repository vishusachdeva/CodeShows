<table class="w3-table w3-bordered w3-hoverable">
<?php
    $i = 0;
    $x = "num_$i";

    $time_now=mktime(date('h')+11,date('i')+58,date('s'));
    $cur_time = date('Y-m-d H:i:s', $time_now);
    $cur_time = strtotime($cur_time);
    if(!isset($num_0['start_time']) || empty($num_0['start_time'])) {
        loadView('wait',['msg'=>'Problems coming soon','heading'=>$contest_name]);
        exit();
    }
    else
    {
    $start_time = strtotime($start_time);
    ?>
    <div class="clearfix">
        <h1 style="float:left"><?php echo($contest_name);?></h1>
        <input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" style = 'float:right'onclick = "location.href='<?php echo(generate_link('ranklist','?c_id='.$c_id)); ?>'" value = 'RankList'>
    </div>
    <br>
    <?php
    if($start_time < $cur_time)
    {?>
        <tr bgcolor = "#AAD3A8"><th>Problem Name</th><th>Problem Code</th><th>Accuracy</th></tr>
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
        loadView('wait',['msg'=>'Problems coming soon','heading'=>$contest_name]);
        exit();
        //$date=date_create($num_0['start_time']);
        //echo("Problems will be available after " .date_format($date,"d M y g:i A")." IST");
    }
    }
?>
</table>