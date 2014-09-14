<div id="siderbar">
	<aside id="latest-post">
		<h3>THE LATEST <span>POST</span></h3>
		<ul>
				<?php $posts = get_posts('numberposts=4&orderby=post_date');?>
				<?php foreach($posts as $post):?>
						<?php setup_postdata($post);?>
							<li><span><?php the_time("M j")?></span><a href="<?php the_permalink();?>" target="_blank"><?php the_title();?></a></li>
							<?php endforeach;?>
		</ul>
	</aside>
	<aside id="random-post">
		<h3>The Random <span>POST</span></h3>
		<ul>
			<?php $posts = get_posts('numberposts=4&orderby=rand');?>
			<?php foreach($posts as $post):?>
				<?php setup_postdata($post);?>
					<li><a class="clearfix" href="<?php the_permalink()?>" target="_blank" title="<?php the_title();?>">
						<?php 
                				$first_image=get_first_image();//get the first image of post
                				if(!empty($first_image)){
								echo '<img src="'.$first_image.'">';			
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
												echo '<img src="'.$video_img.'">';
											}
									}
			 						?>
						<strong><?php the_title()?></strong>
						<span><?php the_time("Y M j")?></span>
					</a>
				</li>
				<?php endforeach;?>
		</ul>
		<p class="all-archives"><a class="circle_btn" href="<?php bloginfo(url)?>/?tag=microsoft">All</a><p>
			</aside>
</div><!--siderbar-->
<div class="fixed"></div>
</div><!--main-->
