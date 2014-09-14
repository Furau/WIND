<?php get_header();?>
<div id="main">
<div id="content">
	<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
	<article id="post-<?php the_ID();?>">
		<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
		<aside class="meta-data">
				<div>
				<?php the_category();?>
				</div>
				<div class="posted-times">
				<div>Publish on <span class="posted-date"><?php the_time("M j");?></span> | <span class="posted-time"><?php the_time("g:h A");?></span></div>
				</div><!--post-date-->
			</aside>
	<div class="content">
		<?php the_content();?>
		</div><!--class-content-->
		<div class="tags">
		<?php the_tags("","","");?>
		</div>	
	</article>
	<?php endwhile;?>
	<?php endif;?>
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	</div><!--id-content-->
	<?php get_sidebar();?>
	<?php get_footer();?>