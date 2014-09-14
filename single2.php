<?php 
	require('./wp-blog-header.php');
	include(TEMPLATEPATH . '/header-one.php');
	?>
<div id="main">
	<div id="full-content" class="clearfix">
			<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
	<article id="post-<?php the_ID();?>">
		<h2><?php the_title();?></h2>
		<aside class="meta-data">
				<div>
				<?php the_category();?>
				</div>
				<div class="posted-times">
				<div>Publish on <span class="posted-date"><?php the_time("M j");?></span> | <span class="posted-time"><?php the_time("g:h A");?></span></div>
				</div><!--post-date-->
			</aside>
			<div class="full-content">
			<?php the_content();?>
			</div>
	</article>
	<div id="column-1">
	<?php comments_template(); ?>
	</div>
	<div id="column-2">
			<div id="col-2-sep"><!----></div>
		</div>
<?php endwhile;?>
	<?php endif;?>
	</div><!--id-content-->
<?php get_footer();?>