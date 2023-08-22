<!DOCTYPE html>
<html class="no-js" lang="">
<head>
   <!-- Title of The Page -->
	<title><?= $title ?></title>
	<!-- Meta Informations -->
	<meta charset="utf-8">
	<meta name="language" content="english">
	<meta name="title" content="AWEIL - ADVANCED WEAPONS AND EQUIPMENT INDIA LIMITED">
    <meta name="description" content="AWEIL is committed towards standard, quality and time frame of service and product delivery, grievance redressal mechanism, transparency and accountability.">
	<meta name="keywords" content="aweil,aweil connect,defence psu,arms & ammunitions,fgk,saf,gsf,gcf,ofc,ofpk,oft,rfi">
	<meta name="author" content="AWEIL">
	<meta property="og:site_name" content="AWEIL" />
	<meta property="article:published_time" content="2021-10-15T12:05:00+05:30" />
	<meta property="article:modified_time" content="2021-12-07T08:45:00+05:30" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.aweil.in">
    <meta property="og:title" content="AWEIL - ADVANCED WEAPONS AND EQUIPMENT INDIA LIMITED">
    <meta property="og:description" content="Leader in manufacturing of defence artillary systems, civil trade ammunitions both long and short range weapons">
    <meta property="og:image" content="https://www.aweil.in/assets/img/logo.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.aweil.in">
    <meta property="twitter:title" content="AWEIL - ADVANCED WEAPONS AND EQUIPMENT INDIA LIMITED">
    <meta property="twitter:description" content="Leader in manufacturing of defence artillary systems, civil trade ammunitions both long and short range weapons">
    <meta property="twitter:image" content="https://www.aweil.in/assets/img/logo.png">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="/assets/img/favicon.png">
	<!-- Web Font -->
	<link rel="stylesheet" href="/assets/css/webfont.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<!-- Bootstrap-Theme CSS -->
	<link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="/assets/css/fontawesome.min.css">
	<!-- Slick CSS -->
	<link rel="stylesheet" href="/assets/css/slicknav.min.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="/assets/css/animate.min.css">
	<!-- Magnific-Popup CSS-->
	<link rel="stylesheet" href="/assets/css/magnific-popup.css">
	<!-- Animate-Text CSS -->
	<link rel="stylesheet" href="/assets/css/animate-text.css">
	<!-- Carousel CSS -->
	<link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
	<!-- Them Default CSS -->
	<link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
	<!-- Normalize CSS -->
	<link rel="stylesheet" href="/assets/css/normalize.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="/assets/css/style.css?v=1.1">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="/assets/css/responsive.css">
	<style>.social li {display: inline-block;margin-right: 10px;}.blue{background: #30466f; color: #fff; border-radius: 3px; display: inline-block;}.clients .single-clients img {height: 85px; width: auto;margin: 0 auto;}.clients .single-clients {padding: 30px; text-align: center;font-family: 'Bebas Neue', cursive;font-size: 1.7rem;color: #30466F;text-transform: capitalize;}.hero-slider .single-slider:before {background: #004fe100;
    opacity: 0;}</style>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-6ZSTH9LCK1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-6ZSTH9LCK1');
	</script>
</head>
<body>

    <?= $header ?>

	<?= $nav ?>

    <?= $body ?>

    <?= $footer ?>

	<!-- Jquery JS -->
	<script src="/assets/js/jquery.min.js"></script>
	<!-- Bootstrap Js -->
	<script src="/assets/js/bootstrap.min.js"></script>
	<!-- Slicknav Js  -->
	<script src="/assets/js/jquery.slicknav.min.js"></script>
	<!-- ScrollUp Js -->
	<script src="/assets/js/jquery.scrollUp.min.js"></script>
	<!-- Carousel Js -->
	<script src="/assets/js/owl.carousel.min.js"></script>
	<!-- Waypoints Js -->
	<script src="/assets/js/waypoints.min.js"></script>
	<!--Counterup Js  -->
	<script src="/assets/js/jquery.counterup.min.js"></script>
	<!-- Stellar Js  -->
	<script src="/assets/js/jquery.stellar.min.js"></script>
	<!-- Min Js -->
	<script src="/assets/js/wow.min.js"></script>
	<!-- Animate-Text Js -->
	<script src="/assets/js/animate-text.js"></script>
	<!-- Easing Js -->
	<script src="/assets/js/easing.min.js"></script>
	<!-- Magnific Js -->
	<script src="/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Main Js -->
	<script src="/assets/js/main.js"></script>
	<!-- Custom Js -->
	<script src="/assets/js/custom.js"></script>
	<script src="/assets/js/jquery-tnslider.js"></script>
	<script src="/assets/js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
	<!-- App Js -->
	<script src="/assets/js/app.js"></script>
	<script>
jQuery(document).ready(function() {
	$('.tnslider').TNSlider({
		'main_image_width' : 700,
		'main_image_height' : 350,
		'main_image_position' : 'right',
		'animation_speed' : 500,
		'responsive' : [true, '80'],
		'texteffect' : 'Elastic',
		'randomize' : [false, 'fast']
	});
});
$(function () {

       $(".news-demo-down-auto").bootstrapNews({

            newsPerPage: 5,

            autoplay: true,

            pauseOnHover: true,

            navigation: false,

            direction: 'up',

            newsTickerInterval: 1500,

            onToDo: function () {

            }

        });

    });
	 var cont = document.getElementById("container");

        function changeSizeByBtn(size) {
		alert(size);

            // Set value of the parameter as fontSize
            cont.style.fontSize = size;
        }

        function changeSizeBySlider() {
            var slider = document.getElementById("slider");

            // Set slider value as fontSize
            cont.style.fontSize = slider.value;
        }
</script>
</body>
</html>
