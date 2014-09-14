<?php 
	require('./wp-blog-header.php');
	include(TEMPLATEPATH . '/header-one.php');
	?>
<div id="main">
<div id="content">
	<div class="arch-title">
		<h4><?php if ( is_day() ) : ?>
					<?php printf( __( 'Date: %s'), '' . get_the_date() . '' ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Month: %s' ), '' . get_the_date( _x( 'F Y', 'F = Month, Y = Year' ) ) ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Year: %s'), '' . get_the_date( _x( 'Y', 'Y = Year' ) ) ); ?>
				<?php elseif ( is_category() ) : ?>
					<?php printf( __( 'Category: %s'), '' . single_cat_title( '', false ) . '' ); ?>
				<?php elseif ( is_tag() ) : ?>
					<?php printf( __( 'Tag: %s'), '' . single_tag_title( '', false ) . '' ); ?>
				<?php elseif ( is_author() ) : ?>
					<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
					<?php printf( __( 'Author: %s'), $curauth->display_name ); ?>
				<?php else : ?>
					<?php _e( 'Archive' ); ?>
				<?php endif; ?>
				
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				
				if ( "1" < $wp_query->max_num_pages ) : ?>
				
					<span><?php printf( __('(page %s of %s)'), $paged, $wp_query->max_num_pages ); ?></span>
				
				<?php endif; ?>
			</h4>
		</div>
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
		<?php the_excerpt();?>
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