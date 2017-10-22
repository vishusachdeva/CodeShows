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