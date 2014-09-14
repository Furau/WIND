<?php 
	require('./wp-blog-header.php');
	include(TEMPLATEPATH . '/header-one.php');
	?>
<div id="main">
<div id="content">
	<div class="arch-title">
		<h4>
			<?php _e('Search results:');echo '"'.get_search_query().'"';?>
			<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						
						if ( "1" < $wp_query->max_num_pages ) : ?>
						
							<span><?php printf( __('(page %s of %s)'), $paged, $wp_query->max_num_pages ); ?></span>
							<?php endif; ?>
		</h4>
	</div>
	<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
	<article id="archive-<?php the_ID();?>" class="post-arch">
		<div class="archive-div clearfix" >
			
			<?php 
                $first_image=get_first_image();//get the first image of post
                if(!empty($first_image)){
                	echo '<a href="'.$first_image.'">';
					echo '<img src="'.$first_image.'">';
					echo '</a>';
                }
                else{
                $video_url=get_first_video();//get the first video cover of post
			    $class_video = new class_video;
			    $video_array=call_user_func_array(array($class_video, 'parse'),array($video_url));
			    $video_img=$video_array['img']['large'];
			   			 if(empty($video_img)){
			    								echo '<img src="'.get_template_directory_uri().$video_url.'">';
			   							 }
			    		else{
									echo '<a href="'.$video_url.'">';
									echo '<img src="'.$video_img.'">';
									echo '</a>';
								}
			}
			 ?>
			<a href="<?php the_permalink();?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a>
			<?php the_excerpt();?>
			<aside class="post-meta">
				<span class="post-time"><?php the_time("Y M j");?> | <?php the_time("g:h A");?></span>
			</aside>
			<div class="arch-tags">
				<?php the_tags('','','');?>
			</div>
		</div>		
	</article>
	<?php endwhile;?>
	<?php endif;?>
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	</div><!--id-content-->
	<?php get_sidebar();?>
<?php get_footer();?>