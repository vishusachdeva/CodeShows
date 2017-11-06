<?php
    $i = 0;
    $x = "num_$i";

    $time_now=mktime(date('h')+11,date('i')+58,date('s'));
    $cur_time = date('Y-m-d H:i:s', $time_now);
    $cur_time = strtotime($cur_time);
    if(!isset($start_time) || empty($start_time)) {
        loadView('wait',['msg'=>'Problems coming soon','heading'=>$contest_name]);
        exit();
    }
    else
    {
    $start_time = strtotime($start_time);
    if($start_time < $cur_time)
    {?>
    <div class='w3-responsive' style="width:75%;margin:auto;">
        <h1 style="width:100%;text-align:center;" class="w3-myfont"><b>Contest Problems (<?php echo($contest_name); ?>)</b></h1>
            <div class="clearfix">
                <input type="button" class="w3-button w3-red w3-hover-cyan w3-ripple w3-round" style = 'width:20%;float:right'onclick = "location.href='<?php echo(generate_link('ranklist','?c_id='.$c_id)); ?>'" value = 'RankList'>
            </div>
            <br>
        <?php
        while($i < $len) { ?>
<div class="container w3-border w3-light-grey" style="margin:1% auto;width:100%;border-radius:15px;">
    <div class="clearfix"></div>
    <div style="float:left;width:85%;padding-bottom:1%;">
        <h3 style="font-size:150%;line-height:100%;"><b><?php echo(${$x}['p_name']." (".${$x}['p_code'].")"); ?></b></h3>
        <div style="width:100%">
            <small style="font-size:90%;line-height:100%;">users: <?php echo(${$x}['u_solve']."/".${$x}['u_attempt']); ?> attempts: <?php echo(${$x}['submitted']."/".${$x}['accepted']); ?> accuracy: <?php echo(${$x}['submitted'] / (${$x}['accepted'] ? ${$x}['accepted'] : 1) * 100); ?>%</small>
        </div>
    </div>
    <div style="width:15%;float:right;position:relative;height:10%;">
        <button onclick="location.href='<?php echo(generate_link('problem', '?p_id='.${$x}['p_id'])); ?>'" class="w3-hover-cyan w3-ripple w3-button w3-red w3-round-large" style="position:absolute;top:20%;height:60%;width:100%;">Solve</button>
    </div>
</div>
    	<?php
    		$i++;
            $x = "num_$i";
        }
?></div><?php
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
