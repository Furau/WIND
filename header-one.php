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
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes();?>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>	
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.mousewheel-3.0.6.pack.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen"/>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox.pack.js?v=2.1.5"></script>

<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/edit.enhance.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/tooltipster.css" />
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.tooltipster.min.js"></script>

<script type="text/javascript">
	var num=1;
	function mycarousel(){
	 	$('.fragment-'+num).animate({opacity:'0'},2000);
	 	$('.fragment-'+num).css('z-index',9);
	 	$('a[rel="'+num+'"]').removeClass("active");
	 		if(num!=3)num++;
	 		else num=1;	
		$('.fragment-'+num).animate({opacity:'1'},2000);
		$('.fragment-'+num).css('z-index',10);
		$('a[rel="'+num+'"]').addClass("active");
		}
	$(document).ready(function() {
	$('.content embed').each(function(){
		var video_src=$(this).attr('src');
		$(this).after('<a href="'+video_src+'" class="fancybox popup">Pop up this video</a>');
		});
	$(".full-content embed").each(function(){
		var full_video_src=$(this).attr("src");
		$(this).after('<a href="'+full_video_src+'" class="fancybox popup">Pop up this video</a>');
		});
	$(".full-content a>img").parent().addClass("fancybox").attr("rel","gallery");
	$('.content a>img').parent().addClass('fancybox').attr('rel','gallery');
	$('.archive-div a>img').parent().addClass("fancybox");
	$(".fancybox").fancybox();
	setInterval(mycarousel, 6000);
	$("embed").attr({width:"100%",height:"382px"});
	
	$('.avatar').css("opacity","0");
	$(".circle>img").load(function(){
		var avatar_src=$(this).attr("src");
		$(this).parent().css("background","url("+avatar_src+")");
	});
	$("#collapse").click(function(){
		$("#secondary").toggle(500);
	});
	
	$(".comment-collapse").click(function(){
		$(this).parents(".comment-author").next(".comment-content").toggle();
		$(this).parents(".comment-author").next().next(".comment-metadata").toggle();
		$(this).parents(".comment-author").next().next().next(".reply").toggle();
	});

	$('.arch-title').slideDown(1000);

	});
	</script>
	
  <script>
 $(document).ready(function() {
  
  				var post_img=$('.content a:first-child img').attr("src");
  				var current_uri=window.location.href;

  				$(".sina-weibo").click(function(){
  					msg=$(this).parents(".comment-share").next(".comment-wrap").find('.comment-content').children().text();
	  				window.open('http://service.weibo.com/share/share.php?title='+'%23THEWIND%23 '+msg+'&url='+current_uri+'&pic='+post_img, "_blank" ,"resizable:true");
  				});
  				$(".qq-space").click(function(){
	  				msg=$(this).parents(".comment-share").next(".comment-wrap").find('.comment-content').children().text();
	  				window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+current_uri+'&title='+msg+'&pic='+post_img, "_blank" ,"resizable:true");
  				});
  				
  				$(".tencent-weibo").click(function(){
	  				msg=$(this).parents(".comment-share").next(".comment-wrap").find('.comment-content').children().text();
	  				window.open('http://share.v.t.qq.com/index.php?c=share&a=index&c=share&a=index&title='+msg+'&url='+current_uri+'&site=&pic='+post_img, "_blank" ,"resizable:true");
  				});
  				
  				$(".douban").click(function(){
	  				msg=$(this).parents(".comment-share").next(".comment-wrap").find('.comment-content').children().text();
	  				window.open('http://www.douban.com/share/service?href='+current_uri+'&name='+msg+'&pic='+post_img, "_blank" ,"resizable:true");
  				});
  			});

 </script>  
 
 <script>
 $(document).ready(function(){
 	var user_email;
	 $('.circle').mouseover(function(){
		 user_email=$(this).attr('data-email');
	 });
	 
 	$('.circle').tooltipster({
	maxWidth:240,
 	interactive:'ture',
 	animation:'grow',
 	theme:'.tooltipster-shadow',
   content: 'Loading...',
   functionBefore: function(origin, continueTooltip) {
      // we'll make this function asynchronous and allow the tooltip to go ahead and show the loading notification while fetching our data
      continueTooltip();
        
      // next, we want to check if our data has already been cached
      if (origin.data('ajax') !== 'cached') {
			$.get('./?action=ajax_guest_comments&gc_userEmail='+user_email,function(data) {
               // update our tooltip content with our returned data and cache it
               origin.tooltipster('update', data).data('ajax', 'cached');
         });
      }
   }
});
 });
</script>
<script>
	jQuery(document).ready(function($){
		$('.comment-reply-link').click(function(){
		var atid='"#'+$(this).parent().parent().parent().attr('id')+'"';
		var atname=$(this).parent().parent().find('.comment-author').find('.fn').text();
		$("#comment").val("<a href=" + atid + ">@" + atname + " </a>\n").focus();
	});
		$('a#cancel-comment-reply-link').click(function(){
			$('#comment').val('');
		});
	});
</script>
<title>My Blog</title>
</head>
<body>
<div id="wrapper">
<header>
	<div id="header-inner">
	<div id="logo"><a href="<?php bloginfo(url)?>"><?php bloginfo('name');?></a></div>
	<a id="rss" href="javascript:"><img src="<?php echo get_template_directory_uri(); ?>/img/rss-48.png" alt="rss"></a>
	<a id="collapse" href="javascript:"><img src="<?php echo get_template_directory_uri(); ?>/img/collapse.png" alt="collapse"></a>
	</div>
	</header>
