		<!-- footer -->
		<div class="gallery" id="gallery"><footer>
			<div class="footer-top_agile_w3l">
				<div class="container">
					<div class="footer-grids">
						<div class="col-md-6 footer-grid_wthree_info">
							<h3>About us</h3>
							<p>Online Coding Platform for MNIT.</p>
							<p></p>
							<ul class="footer_list_icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="col-md-6 footer-grid_wthree_info">
							<h3>Newsletter</h3>
							<form action="<?php echo(generate_link('user', 'subscribe')); ?>" method="post">
								<input type="text" name="s_name" placeholder="Name" required="">
								<input type="email" name="s_email" placeholder="Email" required="">
								<input type="submit" value="subscribe now">
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="wthree_copy_right">
						<p>&copy; Codeshows -- Beta Version</a></p>
					</div>
				</div>
			</div>
		</div></footer>
		<!-- //footer -->
		<a href="#home" class="scroll" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
		<!-- js -->
		<script type="text/javascript" src="<?php echo JS_PATH.'jquery-2.1.4.min.js'; ?>"></script>
		<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="<?php echo JS_PATH.'move-top.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo JS_PATH.'jquery.easing.min.js'; ?>"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		<!-- //end-smooth-scrolling -->
		<!-- smooth-scrolling-of-move-up -->
		<script type="text/javascript">
			$(document).ready(function() {
				/*
				var defaults = {
					containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear'
				};
				*/

				$().UItoTop({ easingType: 'easeOutQuart' });

			});
		</script>
		<!-- //smooth-scrolling-of-move-up -->
		<script type="text/javascript" src="<?php echo JS_PATH.'darkbox.js'; ?>"></script>
		<script src="<?php echo JS_PATH.'wimmViewer.js'; ?>"></script>
		<script>
			$(function () {
				$('#slider1').WimmViewer({
					miniatureWidth: 100,
					miniatureHeight: 100
					// Availables customizations:
					/*
					 miniatureSpace: 10,
					 nextText:'Next',
					 prevText:'Prev',
					 onImgChange : function() { console.log('changed'); },
					 onNext : function() { console.log('next'); },
					 onPrev : function() { console.log('previous'); },
					 */
				});
			})
		</script>
		<!-- for pricing -->
		<!-- Pricing-Popup-Box-JavaScript -->
		<script src="<?php echo JS_PATH.'jquery.magnific-popup.js'; ?>" type="text/javascript"></script>
		<!-- //Pricing-Popup-Box-JavaScript -->
		<!-- carousel -->
		<script src="<?php echo JS_PATH.'owl.carousel.js'; ?>"></script>
		<!-- //carousel -->
		<!-- for bootstrap working -->
		<script type="text/javascript" src="<?php echo JS_PATH.'customJquery.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo JS_PATH.'bootstrap.js'; ?>"></script>
    </body>
</html>