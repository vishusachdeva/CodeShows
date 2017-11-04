<html>
    <head>
        <title>
            Assignment Builder
        </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8"/>
		<meta name="keywords" content="Coding,MNIT,DBMS" />
		<script type="application/x-javascript">
			addEventListener("load", function () {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<link href="<?php echo CSS_PATH.'darkbox.css'; ?>" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo CSS_PATH.'owl.carousel.css'; ?>" rel="stylesheet" type="text/css" media="all">
		<link href="<?php echo CSS_PATH.'wimmViewer.css'; ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS_PATH.'bootstrap.css'; ?>" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo CSS_PATH.'style.css'; ?>" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo CSS_PATH.'font-awesome.css'; ?>" rel="stylesheet">
		<link href="<?php echo CSS_PATH.'w3.css'; ?>" rel="stylesheet">
		<link href="<?php echo CSS_PATH.'style2.css'; ?>" rel="stylesheet">

		<!-- //for bootstrap working -->
		<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
		<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
        <script src="<?php echo JS_PATH.'validation.js'; ?>" ></script>
        <script src="<?php echo JS_PATH.'jquery-2.1.4.min.js'; ?>" ></script>
        <script src="<?php echo JS_PATH.'jquery.easing.min.js'; ?>" ></script>
        <script src="<?php echo JS_PATH.'jquery.magnific-popup.js'; ?>" ></script>
        <script src="<?php echo JS_PATH.'tab_switch.js'; ?>" ></script>
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/favicon/manifest.json">
        <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">
    </head>

    <body>
        <div class="w3-modal w3-animate-opacity w3-display-middle " id='add_asg'>
            <div class="w3-modal-content w3-animate-zoom">
            		<div class="container w3-light-grey" style="width:100%">
                        <span class="w3-button w3-xxlarge w3-hover-red w3-display-topright" style="cursor:pointer;" onclick="document.getElementById('add_asg').style.display='none';">&times;</span>
                        <form method="post" action="<?php echo(generate_link('asg', 'add_asg')); ?>" class="inp_form container w3-section">
                            <h1 style="text-align:center" class="w3-text-red w3-myfont"><b>Add Assignment</b></h1>
                            <label for="asg_name">Assignment Name</label>
                            <input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" placeholder="Assignment Name" name="asg_name" type="text" required>
                            <label for="start_time">Start Time</label>
                            <input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name="start_time" type="datetime-local" required>
                            <label for="end_time">End Time</label>
                            <input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name="end_time" type="datetime-local" required>
                            <label for="batch">Batch</label>
                            <select class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" id="batch" name = 'batch'  required>
                			<option value="0" disabled selected>Select Batch</option>
                    			<?php
                    				foreach($batch As $key =>$value)
                    				{
                    			?>
                    			<option value = <?php echo('"'.$value['batch_id'].'"'); ?> > <?php echo($value['batch_name']); ?> </option>
                    			<?php
                    				}
                    			?>
                    		</select>
                            <input type="submit" value="Add Assignment" class="w3-button w3-red w3-hover-cyan w3-ripple w3-round-large w3-section w3-xlarge" style="width:100%">
                        </form>
                    </div>
            </div>
        </div>
        <script>
        var modal = document.getElementById('add_asg');
        window.onclick = function(event) {
          if (event.target == modal) {
        	modal.style.display = "none";
          }
        }
        </script>
        <!--button class="w3-button w3-red w3-hover-cyan w3-ripple" id="new" style="width:100%;height:100%;font-size:3vw;"
                        onclick="document.getElementById('add_asg').style.display='block';">New Assignment +</button>

        <script>

            String.prototype.toDOM=function(){
              var d=document
                 ,i
                 ,a=d.createElement("div")
                 ,b=d.createDocumentFragment();
              a.innerHTML=this;
              while(i=a.firstChild)b.appendChild(i);
              return b;
            };

            var problems = {
                <?php
                    /*$i = 0;
                    $x = "num_".$i;
                    while($i < $len) {
                        echo("'".$x."':"); ?>
                        "<tr><div><table></table></div></tr>"
                        <?php $i++;
                        $x = "num_".$i;
                        if ($i < $len) print(",");
                    }*/
                ?>
                };

            function insertAfter(newNode, referenceNode) {
                referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
            }

            function embed_prob(name_of_node, referenceNode) {
                var td = problems[name_of_node].toDOM();
                insertAfter(td, referenceNode);
            }
        </script>

        <div class='w3-responsive w3-light-grey'>
        <h1 class="w3-text-cyan w3-myfont" style="text-align:center;font-size:7vw"><b>Assignments Added By You</b></h1><br/>
        <table class="w3-table w3-bordered w3-margin-bottom">
        <tr><th style="text-align:center">Assignment Name</th><th style="text-align:center">Batch</th><th style="text-align:center">Correct Submissions</th><th style="text-align:center">Problems</th></tr>
        <?php
            /*$i = 0;
            $x = "num_$i";
            while($i < $len) { ?>
                <tr style='cursor:pointer;'>
        			<td style="text-align:center"><?php echo(${$x}['asg_name']); ?></td>
        			<td style="text-align:center"><?php echo(${$x}['batch_name']); ?></td>
        			<td style="text-align:center"><?php echo(${$x}['batch_name']); ?></td>
        			<td class="w3-large w3-grey w3-hover-red" style="text-align:center;" onclick="embed_prob('<?php echo($x); ?>', this.parentNode);"><b>+</b></td>
        		</tr>
        	<?php
        		$i++;
                $x = "num_$i";
            }*/
        ?>
        </table>
        </div-->
        <div class="container-fluid w3-light-grey w3-border clearfix" style="padding:0px;height:100%">
            <div class="container w3-black w3-animate-left" style="float:left;width:20%;height:100%;padding:0px;overflow-y:auto;">
                <h2 class="w3-myfont w3-border-bottom w3-grey w3-text-black" style="text-align:center;font-size:3vw;padding:2%;margin:0px;"><b>Assignments</b></h2>
                <ul style="width:100%;">
                    <li class="w3-button w3-hover-cyan" style="width:100%;font-size:1.5vw" onclick="document.getElementById('add_asg').style.display='block';"><b>+</b></li>
        <?php
            $i = 0;
            $x = "num_".$i;
            while($i < $len) {
        ?>
                    <li onclick="asg_switch(this, '<?php echo($x); ?>')" class="w3-button w3-hover-red<?php if (!$i) { ?> w3-light-grey <?php } ?>" style="width:100%;font-size:1.5vw">
                        <?php echo(${$x}['asg_name']); ?>
                    </li>
        <?php $i++; $x = "num_".$i; } ?>
                </ul>
            </div>
            <div class="container" style="float:right;width:80%;padding:0px;overflow-y:auto;">
                <div class="w3-border" style="witdh:100%;height:26%;">

        <?php
            $i = 0;
            $x = "num_".$i;
            while($i < $len) {
        ?>

                    <div class="w3-animate-left" id="<?php echo($x."_"); ?>" style="backgorund:;display:<?php if (!$i) { ?>block<?php } else { ?>none<?php } ?>;padding:0px;">
                        <h1 class="w3-myfont w3-border w3-grey w3-text-black" style="margin:0px;float:left;text-align:center;width:100%;"><b>Info</b></h1>
                        <table class="w3-table w3-text-black w3-small w3-centered w3-border w3-bordered">
                            <tr><td>Batch</td><td><?php echo(${$x}['batch_name']); ?></td></tr>
                            <tr><td>Start</td><td><?php echo(date_format(date_create(${$x}['start_time']), 'd M\'y g:i A')); ?></td></tr>
                            <tr><td>Deadline</td><td><?php echo(date_format(date_create(${$x}['end_time']), 'd M\'y g:i A')); ?></td></tr>
                            <tr><td>Added at</td><td><?php echo(date_format(date_create(${$x}['time_of_addition']), 'd M\'y g:i A')); ?></td></tr>
                        </table>
                    </div>

        <?php $i++; $x = "num_".$i; } ?>

                </div>

        <?php
            $i = 0;
            $x = "num_".$i;
            while($i < $len) {
        ?>

                <div class="w3-animate-left" id="<?php echo($x); ?>" style="display:<?php if (!$i) { ?>block<?php } else { ?>none<?php } ?>;padding:0px;">
                    <h1 class="w3-myfont w3-border w3-grey w3-text-black" style="margin:0px;float:left;text-align:center;width:100%;"><b>Problems</b></h1>
                    <table class="w3-table w3-bordered w3-hoverable w3-centered w3-border">
                        <tr><th>Problem Name</th><th>Problem Code</th><th>Correct Submissions</th><th>Total submissions</th><th>Accuracy</th></tr>

                    <?php
                        foreach(${$x}['problems'] as $problem) {
                    ?>

                        <tr style="cursor:pointer" onclick="location.href='<?php echo(generate_link('problem', '?p_id='.$problem['p_id'])); ?>'">
                            <td><?php echo($problem['p_name']); ?></td>
                            <td><?php echo($problem['p_code']); ?></td>
                            <td><?php echo($problem['p_name']); ?></td>
                            <td><?php echo($problem['p_code']); ?></td>
                            <td><?php echo($problem['p_name']); ?></td>

                    <?php
                        }
                    ?>

                    </table>
                </div>

        <?php
                $i++;
                $x = "num_".$i;
            }
        ?>
                <div class="w3-display-bottomright">
                    <div title="Add Problem" onclick="" class="w3-button w3-text-black w3-xxxlarge fa fa-plus w3-hover-red"></div>
                    <div title="Sign out of Builder" onclick="if (confirm('You are about to leave builder')) location.href='<?php echo(generate_link('main', 'home')); ?>'" class="w3-button w3-text-black w3-xxxlarge fa fa-sign-out w3-hover-red"></div>
                </div>
            </div>
        </div>
    </body>
</html>