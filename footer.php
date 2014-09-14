<footer>
	<div id="footer-inner" class="clearfix">
		<div class="column grid_1">
			<form method="get" id="search-form" action="<?php bloginfo('url'); ?>/">
				<label class="hidden" for="search"><?php _e('Search:'); ?></label>
				<input type="text" value="<?php the_search_query(); ?>" name="s" id="search" />
				<input type="submit" id="search-submit" value="" />
			</form>
			<span id="copyright">Copyright Reserved © 2011-2013 THEWIND</span>
	</div>
		<div class="column grid_2">	
			<h3>Categories</h3>
			<ul>
			<?php wp_list_categories('orderby=name&title_li=');?>
</ul>
		</div>
		<div class="column grid_3">
			<h3>The Basics</h3>
			<ul>
			<?php wp_list_pages('orderby=name&title_li=');?>
			</ul>
		</div>
		<div class="column grid_4">
			<h3>The Elsewhere</h3>
			<ul>
				<li><a href="" id="facebook" title="">Facebook</a></li>
				<li><a href="http://twitter.com/illumishare/" id="Twitter" title="">Twitter</a></li>
				<li><a href="http://weibo.com/illumishare/" id="s-weibo">Sina Weibo</a></li>
				<li><a href="http://t.qq.com/illumishare/" id="t-weibo">Tencent Weibo</a></li>
				<li><a href="" id="google-plus">Google+</a></li>
				<li><a href="http://i.youku.com/thewind" id="youku">Youku</a></li>
			</ul>
		</div>
	</div>
</footer>
</div><!--wrapper end-->
<?php wp_footer();?>
</body>
</html>