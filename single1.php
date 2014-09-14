<?php 
	require('./wp-blog-header.php');
	include(TEMPLATEPATH . '/header-one.php');
	?>
<div id="main">
<div id="content">
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
	<div class="content">
		<?php the_content();?>
	</div><!--class-content-->
		<div class="tags">
			<?php the_tags("","","");?>
			</div>
	</article>
	<div id="post-nav" class="clearfix">
		<div id="post-nav-inner" class="clearfix">
				<?php
    $categories = get_the_category();
    $categoryIDS = array();
    foreach ($categories as $category) {
    array_push($categoryIDS, $category->term_id);
    }
    $categoryIDS = implode(",", $categoryIDS);
    ?>
<div id="pre-post"><?php $prev_post=get_previous_post($categoryIDS);?>
<?php if(!empty($prev_post)):?>
	<a href="<?php echo get_permalink($prev_post->ID);?>" ><strong>Previous Post</strong><span><?php echo $prev_post->post_title;?></span></a>
	<?php else:?>
		<a href="javascript:"><strong>Previous Post</strong><span><?php echo _e("Nothing there！:)");?></span></a>
	<?php endif;?>
</div>
<div id="next-post"><?php $next_post=get_next_post($categoryIDS);?>
<?php if(!empty($next_post)):?>
	<a href="<?php echo get_permalink($next_post->ID);?>"><strong>Next Post</strong><span><?php echo $next_post->post_title;?></span></a>
	<?php else:?>
		<a href="javascript:"><strong>Next Post</strong><span><?php echo _e("YO！the newest one here~ XD");?></span></a>
	<?php endif;?>
</div>

		</div><!--post-nav-inner-->
	</div><!--post-nav-->
	<?php comments_template(); ?>
	<?php endwhile;?>
	<?php endif;?>
	
	</div><!--id-content-->
	<?php get_sidebar();?>
<?php get_footer();?>