<?php //var_dump($data);print($data['fname']);
?>
<div style="margin:7%;border: 5px solid black;">
<div  style="background-color:#FFF;">
	<div    class="w3-text-black" style="position:relative;">

		<ul style="list-style: none;   border-radius: 25px;background: #dce4f2;padding-bottom:1%;">
			<div class ="container"style="background-color:#8b4de2;display:inline-block;width:100%">
				<h1 align="middle"; style="padding-left:10%;text-align:left;"><?php echo($data['username']); ?></h1>
			</div>
		<a href="<?php echo(generate_link('user', 'profile')); ?>">
  			<img class="w3-circle" src="<?php echo(IMAGE_PATH); ?>/<?php echo($data['username']);?>.jpg" alt="<?php echo(IMAGE_PATH) ?>any.jpg" align="left" style="width:20%;height:80%px;border:1;">
		</a>
		<div class ="container" float="right" style="background-color:white;margin-left:20%;width:80%;">
		<h1>	<li >Username      :  <?php echo($data['username']); ?></li></br>
			<li>Name          :  <?php echo($data['fname']); ?>   <?php echo($data['lname']); ?> </li></br>

			<li style="width:100%">Email         :  <?php echo($data['email']); ?></li></br>
			<li style="width:100%">Date of Birth :  <?php echo($data['dob']); ?></li></br>
			<li style="width:100%">Institute Id  :  <?php echo($data['institute_id']); ?></li></br>
			<li style="width:100%">Branch        :  <?php echo($data['branch']); ?></li></br>
			<?php
        if($data['type']=='1')
        {   ?>
            <li style="width:100%">Semester      :  <?php echo($data['sem']); ?></li></br>
			<li style="width:100%">Cg       :  <?php echo($data['cg']); ?></li></br>
			<?php if($data['batch_id']=='1')
			{	?>		    <li style="width:100%">Batch         :  A1A2</li></br> <?php }
			else{    ?>     <li style="width:100%">Batch         :  A3A4</li></br>   <?php  }
		}
?>
			<li style="width:100%">About me :<?php echo($data['about_me']); ?></li></br>

		</ul>
		</h1></div>
</div>
</div></div>

<br></br></br>
