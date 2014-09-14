<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name');?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.cookie.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.mousewheel-3.0.6.pack.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen"/>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox.pack.js?v=2.1.5"></script>

<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript">
	var num=1;
	function mycarousel(){
	 	$('.slider-'+num).animate({opacity:'0'},2000);
	 	$('.slider-'+num).css('z-index',9);
	 		if(num!=4)num++;
	 		else num=1;	
		$('.slider-'+num).animate({opacity:'1',},2000);
		$('.slider-'+num).css('z-index',10);		
		}
	$(document).ready(function() {
	$(".content embed").each(function(){
		var video_src=$(this).attr("src");
		$(this).after('<a href="'+video_src+'" class="fancybox popup">Pop up this video</a>');
		});
	$(".content a>img").parent().addClass("fancybox");
	$(".fancybox").fancybox();
	setInterval(mycarousel, 8000);
	$("embed").attr({width:"100%",height:"382px"});
	$("#collapse").click(function(){
		$("#slider").toggle(1000);
	});
	$('.avatar').css("opacity","0");
	$(".circle>img").load(function(){
		var avatar_src=$(this).attr("src");
		$(this).parent().css("background","url("+avatar_src+")");
	});
	});
</script>
</head>
<body>
<div id="wrapper">
<header>
	<div id="header-inner">
	<div id="logo"><a href="<?php bloginfo(url)?>"><?php bloginfo('name');?></a></div>
	<a id="rss" href="<?php bloginfo('atom_url');?>"><img src="<?php echo get_template_directory_uri(); ?>/img/rss-48.png" alt="rss"></a>
	<a id="collapse" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/collapse.png" alt="collapse"></a>
	</div>
</header>
