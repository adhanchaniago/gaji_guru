<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

	<!--- basic page needs
    ================================================== -->
	<meta charset="utf-8">
	<title>gaji guru</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- mobile specific metas
    ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS
    ================================================== -->
	<link rel="stylesheet" href="<?= base_url()?>assets/frontend/css/base.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/frontend/css/vendor.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/frontend/css/main.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/frontend/css/slideshow.css">

	<!-- script
    ================================================== -->
	<script src="<?=base_url()?>assets/frontend/js/modernizr.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/pace.min.js"></script>

	<!-- favicons
    ================================================== -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo/63-512.png" type="image/x-icon">
	<link rel="icon" href="<?= base_url() ?>assets/images/logo/63-512.png" type="image/x-icon">

</head>

<body id="top">

<!-- header
================================================== -->
<header class="s-header">

<!--	<div class="header-logo">-->
<!--		<a class="site-logo" href="--><?//= base_url()?><!--assets/frontend/index.html">-->
<!--			<img src="--><?//= base_url()?><!--assets/frontend/images/logo.svg" alt="Homepage">-->
<!--		</a>-->
<!--	</div> -->
	<!-- end header-logo -->

	<nav class="header-nav">

		<a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

		<div class="header-nav__content">
			<h3>Menu</h3>

			<ul class="header-nav__list">
				<li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
				<!-- <li><a class="smoothscroll"  href="#gallery" title="about">Gallery</a></li>
				<li><a class="smoothscroll"  href="#location" title="services">Location</a></li> -->
				<li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
				<li><a href="<?=base_url('login')?>" title="login">Login</a></li>
			</ul>

<!--			<p>Perspiciatis hic praesentium nesciunt. Et neque a dolorum <a href='#0'>voluptatem</a> porro iusto sequi veritatis libero enim. Iusto id suscipit veritatis neque reprehenderit.</p>-->

			<!-- <ul class="header-nav__social">
				<li>
					<a href="#0"><i class="fab fa-facebook"></i></a>
				</li>
				<li>
					<a href="#0"><i class="fab fa-twitter"></i></a>
				</li>
				<li>
					<a href="#0"><i class="fab fa-instagram"></i></a>
				</li>
				<li>
					<a href="#0"><i class="fab fa-behance"></i></a>
				</li>
				<li>
					<a href="#0"><i class="fab fa-dribbble"></i></a>
				</li>
			</ul> -->

		</div> <!-- end header-nav__content -->

	</nav> <!-- end header-nav -->

	<a class="header-menu-toggle" href="#0">
		<span class="header-menu-icon"></span>
	</a>

</header> <!-- end s-header -->


<!-- home
================================================== -->
<section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="<?= base_url()?>assets/frontend/images/sigaka/background.png" data-natural-width=3000 data-natural-height=2000 data-position-y=top>

	<div class="shadow-overlay"></div>

	<div class="home-content">

		<div class="row home-content__main">
			<h1>
				SMP IT FATWAH JANGKAR<br>
			</h1>

			<p>
				SISTEM INFORMASI PENGGAJIAN GURU
			</p>
		</div> <!-- end home-content__main -->

	</div> <!-- end home-content -->

	<a href="#gallery" class="home-scroll smoothscroll">
		<span class="home-scroll__text">Scroll Down</span>
		<span class="home-scroll__icon"></span>
	</a> <!-- end home-scroll -->

</section> <!-- end s-home -->


<!-- about
================================================== -->
<!-- end s-about -->


<!-- services
================================================== -->
<!-- end s-services -->


<!-- works
================================================== -->

<!-- stats
================================================== -->


<!-- contact
================================================== -->
<section id="contact" class="s-contact">

	<div class="row section-header" data-aos="fade-up">
		<div class="col-full">
			<h3 class="subhead subhead--light">Contact Us</h3>
<!--			<h1 class="display-1 display-1--light">Get in touch and let's make something great together. Let's turn your idea on an even greater product.</h1>-->
		</div>
	</div> <!-- end section-header -->

	<div class="row">

		<div class="col-full contact-main" data-aos="fade-up">
			<p>
				<a href="mailto:#0" class="contact-email">mabruzahsuksesselalu.com</a>
				<span class="contact-number">082228789455</span>
			</p>
		</div> <!-- end contact-main -->

	</div> <!-- end row -->

	<div class="cl-go-top">
		<a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up" aria-hidden="true"></i></a>
	</div>

</section> <!-- end s-contact -->


<!-- photoswipe background
================================================== -->
<div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

	<div class="pswp__bg"></div>
	<div class="pswp__scroll-wrap">

		<div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>

		<div class="pswp__ui pswp__ui--hidden">
			<div class="pswp__top-bar">
				<div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
				"Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
				"Zoom in/out"></button>
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
						<div class="pswp__preloader__cut">
							<div class="pswp__preloader__donut"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
				<div class="pswp__share-tooltip"></div>
			</div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
			"Next (arrow right)"></button>
			<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
			</div>
		</div>

	</div>

</div> <!-- end photoSwipe background -->


<!-- preloader
================================================== -->
<div id="preloader">
	<div id="loader">
	</div>
</div>


<!-- Java Script
================================================== -->
<script src="<?=base_url()?>assets/frontend/js/jquery-3.2.1.min.js"></script>
<script src="<?=base_url()?>assets/frontend/js/plugins.js"></script>
<script src="<?=base_url()?>assets/frontend/js/main.js"></script>
<script type="text/javascript">
	var slideIndex = 1;
	showSlides(slideIndex);

	// Next/previous controls
	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	// Thumbnail image controls
	function currentSlide(n) {
		showSlides(slideIndex = n);
	}

	function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		if (n > slides.length) {slideIndex = 1}
		if (n < 1) {slideIndex = slides.length}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex-1].style.display = "block";
		dots[slideIndex-1].className += " active";
	}
</script>

</body>

</html>
