<div class="w3-content w3-display-container" style="max-width:100%;max-height:74%;cursor:pointer">
	<?php
		$i = 0;
		while($i < $len) {
			$x = "num_".$i;
			?>
			<div class="banner-slide w3-animate-right" onclick="location.href='<?php echo(generate_link('contest', '?c_id='.${$x}['c_id'])); ?>'">
				<img src="<?php echo(IMAGE_PATH.${$x}['image']); ?>" style="width:100%;height:100%">
				<div class="w3-display-bottomleft w3-padding-16 w3-container w3-black w3-xxlarge"><?php echo(${$x}['contest_name']); ?></div>
			</div>
			<?php
			$i++;
		} ?>
	<div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-middle" style="width:100%">
		<div class="w3-left w3-hover-text-khaki w3-xxxlarge" onclick="plusDivs(-1)">&#10094;</div>
		<div class="w3-right w3-hover-text-khaki w3-xxxlarge" onclick="plusDivs(1)">&#10095;</div>
	</div>
	<div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
		<?php
			$i = 0;
			while($i < $len) { ?>
				<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(<?php echo($i + 1); ?>)" style="height:13px;width:13px;padding:0px"></span>
			<?php
				$i++;
				}
			?>
	</div>
</div>
<script>
	var slideIndex = 1;
	showDivs(slideIndex);
	setTimeout(nextSlide, 5000);

	function nextSlide() {
		plusDivs(1);
		setTimeout(nextSlide, 5000);
	}

	function plusDivs(n) {
	  showDivs(slideIndex += n);
	}

	function currentDiv(n) {
	  showDivs(slideIndex = n);
	}

	function showDivs(n) {
	  var i;
	  var x = document.getElementsByClassName("banner-slide");
	  var dots = document.getElementsByClassName("demo");
	  if (n > x.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = x.length}
	  for (i = 0; i < x.length; i++) {
		 x[i].style.display = "none";
	  }
	  for (i = 0; i < dots.length; i++) {
		 dots[i].className = dots[i].className.replace(" w3-white", "");
	  }
	  x[slideIndex-1].style.display = "block";
	  dots[slideIndex-1].className += " w3-white";
	}
</script>

<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<script>
	AOS.init();
</script>
<div class="container-fluid clearfix" style="padding:0px;background-color:#191d20;">
	<div style="margin:60px auto;width:100%;text-align:center;">
		<h1 class="w3-text-cyan" style="font-size:5vw;font-family:monoton,cursive;">What You Can Do</h1>
	</div>
	<div onclick="location.href='<?php echo(generate_link('problem', 'all')); ?>'" data-aos-offset="250" data-aos="fade-right" data-aos-duration="800" class="container" style="height:50%;float:left;width:50%;padding:0px;cursor:pointer;">
		<img src="<?php echo(IMAGE_PATH); ?>banner11.jpg" style="width:100%;height:100%;">
	</div>
	<div onclick="location.href='<?php echo(generate_link('problem', 'all')); ?>'" data-aos-offset="250" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300" class="container" style="height:50%;float:right;width:50%;padding:0px;cursor:pointer;">
		<h1 class="w3-display-middle w3-text-white" style="text-align:center;font-size:4vw;"><b>Practice</b></h1>
	</div>
	<div onclick="location.href='<?php echo(generate_link('contest', 'all')); ?>'" data-aos-offset="250" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300" class="container" style="height:50%;float:left;width:50%;padding:0px;cursor:pointer;">
		<h1 class="w3-display-middle w3-text-white" style="text-align:center;font-size:4vw;"><b>Compete</b></h1>
	</div>
	<div onclick="location.href='<?php echo(generate_link('contest', 'all')); ?>'" data-aos-offset="250" data-aos="fade-left" data-aos-duration="800" class="container" style="height:50%;float:right;width:50%;padding:0px;cursor:pointer;">
		<img src="<?php echo(IMAGE_PATH); ?>banner22.jpg" style="width:100%;height:100%;">
	</div>
	<?php if (isset($type)) { ?><div onclick="location.href='<?php if ($type == 1) echo(generate_link('asg', 'all')); else if ($type == 2) echo(generate_link('asg', 'builder')); ?>'" data-aos-offset="250" data-aos="fade-right" data-aos-duration="800" class="container" style="height:50%;float:left;width:50%;padding:0px;cursor:pointer;">
		<img src="<?php echo(IMAGE_PATH); ?>banner33.jpg" style="width:100%;height:100%;">
	</div>
	<div onclick="location.href='<?php if ($type == 1) echo(generate_link('asg', 'all')); else if ($type == 2) echo(generate_link('asg', 'builder')); ?>'" data-aos-offset="250" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300" class="container" style="height:50%;float:right;width:50%;padding:0px;cursor:pointer;">
		<h1 class="w3-display-middle w3-text-white" style="text-align:center;font-size:4vw;"><b>Assignments</b></h1>
	</div><?php } ?>
</div>

<div class="clearfix" style="background-color:#191d20;padding-top:64px;">
	<div data-aos-offset="150" data-aos="fade-right" style="float:left;" class="left-part w3-text-white w3-border">
		<h1 style="text-align:center;">Top Programmers</h1>
		<ul class="w3-ul w3-center w3-border">
			<li style="width:100%">Vinayak</li>
			<li style="width:100%">Shivanjal</li>
			<li style="width:100%">Lavkush</li>
		</ul>
	</div>
	<div data-aos-offset="150" data-aos="fade-left" style="float:right;" class="right-part w3-text-white w3-border">
		<h1 style="margin-bottom:0px;padding-bottom:1vw;text-align:center;overflow-y:auto;">Top Contributors</h1>
		<ul class="w3-ul w3-center w3-border">
			<li style="width:100%">Vinayak</li>
			<li style="width:100%">Shivanjal</li>
			<li style="width:100%">Lavkush</li>
		</ul>
	</div>
	<div class="circular-image"></div>
</div>