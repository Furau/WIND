<?php
	include_once('VideoParser.class.php');
	// get the first image from the post
	function get_first_image() {
      global $post, $posts;
      $first_img = '';
      ob_start();
      ob_end_clean();
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
      $first_img = $matches [1] [0];
      return $first_img;
    }

    function get_first_video(){
    	global $post,$posts;
    	$first_video = '';
    	ob_start();
    	ob_end_clean();
    	$output_video=preg_match_all('/<embed.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $v_matches);
    	$first_video=$v_matches[1][0];
    	if(empty($first_video)){ //Defines a default image
        	$first_video = "/img/default.jpg";
      }
      return $first_video;

    }
    
    function wind_comment($comment,$args,$depth){
	    $GLOBALS['comment']=$comment;?>
		<li <?php comment_class();?> id="li-comment-<?php comment_ID();?>">
	    <div class="comment-body clearfix">
	    	<div class="comment-author vcard clearfix">
	    		<a href="javascript:" class="circle" data-email="<?php echo get_comment_author_email();?>" rel="popover">
	    			<span class="edit">EDIT</span>
	    				<?php echo get_avatar($comment,$size='48',$default='<path_to_url>');?></a>
	    				<b class="fn"><?php echo get_comment_author_link();?></b>
						<i class="ua"><?php
											if (function_exists("CID_init")) {
														echo ' ';CID_print_comment_browser();
													}
													?>
											</i>
				<a class="comment-collapse" href="javascript:"></a>
				<div class="comment-share">
	    			<ul class="share-list">
	    				<li><a href="javascript:" title="分享到新浪微博" class="sina-weibo"><img src="<?php echo get_template_directory_uri(); ?>/img/sina-weibo-24.png" alt=""></a>
	    				<li><a href="javascript:" title="分享到騰訊微博" class="tencent-weibo"><img src="<?php echo get_template_directory_uri(); ?>/img/tencent-weibo-24.png" alt=""></a>
	    				<li><a href="javascript:" title="分享到豆瓣" class="douban"><img src="<?php echo get_template_directory_uri(); ?>/img/douban-24.png" alt=""></a>
	    				<li><a href="javascript:" title="分享到QQ空間" class="qq-space"><img src="<?php echo get_template_directory_uri(); ?>/img/qq-space-24.png" alt=""></a>
	    			</ul>
	    		</div>
	    	</div>
	    		<div class="comment-content">
				<?php if ($comment->comment_approved == '0') : ?>
					<em class="wait-mod"><?php _e('Your comment is awaiting moderation. :)') ?></em>
				<br/>
				<?php endif;?>
				<?php comment_text();?>
				</div>
	    	<div class="comment-metadata"><span>Posted on <span class="comment-date"><?php echo get_comment_date();?></span> | <span class="comment-hour"><?php echo get_comment_time();?></span></span></div>
	    	<div class="reply clearfix">
				<?php echo comment_reply_link(array_merge( $args, array('depth' =>$depth,'max-depth'=>$args['max_depth'])));?>
			</div>
	    </div>
	<?php
	    }
	   
	    if (!is_admin()) {
	function zfunc_scripts_method() {
		wp_enqueue_script('jquery');
		if (is_singular()) {
			wp_enqueue_script('comments_ajax_js', (get_template_directory_uri()."/comments-ajax.js"), false, '1.3', true);
		}
	}
	add_action('wp_enqueue_scripts', 'zfunc_scripts_method');
}
 ?>
<?php 
// -- START ----------------------------------------
function wp_smilies() {
     global $wpsmiliestrans;
     if ( !get_option('use_smilies') or (empty($wpsmiliestrans))) return;
     $smilies = array_unique($wpsmiliestrans);
     $link='';
     foreach ($smilies as $key => $smile) {
         $file = get_bloginfo('wpurl').'/wp-includes/images/smilies/'.$smile;
         $value = " ".$key." ";
         $img = "<img src=\"{$file}\" alt=\"{$smile}\" />";
         $imglink = htmlspecialchars($img);
         $link .= "<span><a href=\"#commentform\" title=\"{$smile}\" onclick=\"document.getElementById('comment').value += '{$value}'\">{$img}</a></span>";
     }
     echo '<div class="editor_tools clearfix">
<span><a href="javascript:SIMPALED.Editor.strong()" rel="external nofollow" class="et_strong" title="粗体" class="et_strong">粗体</a></span>
<span><a href="javascript:SIMPALED.Editor.em()" rel="external nofollow" class="et_em" title="斜体" class="et_em">斜体</a></span>
<span><a href="javascript:SIMPALED.Editor.underline()" rel="external nofollow" class="et_underline" title="下划线" class="et_underline">下划线</a></span>
<span><a href="javascript:SIMPALED.Editor.del()" rel="external nofollow" class="et_del" title="删除线" class="et_del">删除线</a></span>
<span><a href="javascript:SIMPALED.Editor.ahref()" rel="external nofollow" class="et_ahref" title="链接" class="et_ahref">链接</a></span>
<span><a href="javascript:SIMPALED.Editor.img()" rel="external nofollow" class="et_img" title="图片" class="et_img">图片</a></span>
<span><a href="javascript:SIMPALED.Editor.code()" rel="external nofollow" class="et_code" title="代码" class="et_code">代码</a></span>
<span><a href="javascript:SIMPALED.Editor.quote()" rel="external nofollow" class="et_quote" title="引用" class="et_quote">引用</a></span>
<span><a href="javascript:SIMPALED.Editor.private()" rel="external nofollow" class="et_private" title="隐藏" class="et_private">隐藏</a></span>
<span><a href="javascript:SIMPALED.Editor.smilies()" rel="external nofollow" class="et_smilies" title="表情" class="et_smilies">表情</a></span>
<div id="smilies-container"><div class="wp_smilies">'.$link.'</div></div></div>';
 }

if (is_user_logged_in()) {
     add_filter('comment_form_logged_in_after', 'wp_smilies');
 }
 else { 
     add_filter( 'comment_form_after_fields', 'wp_smilies');
 }

function private_content($atts, $content = null)
 { if (current_user_can('create_users'))
 return '' . $content . ''; return '***隐藏内容仅管理员可见***'; }
add_shortcode('private', 'private_content');
 add_filter('comment_text', 'do_shortcode'); /* 添加隐藏短代码*/
 // -- END ----------------------------------------
 
 //////// Ajax: ajax_guest_comments by zwwooooo | zww.me
function ajax_guest_comments(){
	if( isset($_GET['action'])&& $_GET['action'] == 'ajax_guest_comments'  ){
		nocache_headers();
		
		$gc_userEmail = isset($_GET['gc_userEmail']) ? $_GET['gc_userEmail'] : null;
		?>
		<?php
			$announcement = '';
			$arg = array(
				'status' => 'approve',
				'number' => 1, //获取的评论数
				'post_tyle' => 'post',
				'author_email' => $gc_userEmail
			);
			$comments = get_comments($arg);
			$home_url=home_url();
			if ( !empty($comments) ) {
				foreach ($comments as $comment) {
					$comment_link=get_comment_link( $comment->comment_ID, array('type' => 'all'));
					$announcement .= '<div><span>' . get_comment_date('Y/m/d H:i',$comment->comment_ID) . ' Says: </span> <a rel="nofollow" href="'. $comment_link .'" title="reply on 《'. get_the_title($comment->comment_post_ID) .'》">'. convert_smilies(strip_tags($comment->comment_content)) . '</a></div>';
				}
			}
			if ( empty($announcement) ) $announcement = '<div class="reply">我发现您还没评论过 ^_^</div>';
			echo $announcement;
			?>
			<?php
		die();
	}
}
add_action('init', 'ajax_guest_comments');

function quick_reply(){
	echo '<script type="text/javascript">
		jQuery(document).ready(function($){
			$("textarea#comment").keypress(function(e){
				if(e.ctrlKey&&e.which==13||e.which==10){
					$("#submit").click();
				}
			});
		});
	</script>';
}
add_action('wp_footer','quick_reply');

function comment_mail_notify($comment_id) {
     $comment = get_comment($comment_id);//根据id获取这条评论相关数据
     $content=$comment->comment_content;
     //对评论内容进行匹配
     $match_count=preg_match_all('/<a href="#comment-([0-9]+)?" rel="nofollow">/si',$content,$matchs);
     if($match_count>0){//如果匹配到了
         foreach($matchs[1] as $parent_id){//对每个子匹配都进行邮件发送操作
             SimPaled_send_email($parent_id,$comment);
         }
     }elseif($comment->comment_parent!='0'){//以防万一，有人故意删了@回复，还可以通过查找父级评论id来确定邮件发送对象
         $parent_id=$comment->comment_parent;
         SimPaled_send_email($parent_id,$comment);
     }else return;
 }
 add_action('comment_post', 'comment_mail_notify');
 function SimPaled_send_email($parent_id,$comment){//发送邮件的函数 by Qiqiboy.com
     $admin_email = get_bloginfo ('admin_email');//管理员邮箱
     $parent_comment=get_comment($parent_id);//获取被回复人（或叫父级评论）相关信息
     $author_email=$comment->comment_author_email;//评论人邮箱
     $to = trim($parent_comment->comment_author_email);//被回复人邮箱
     $spam_confirmed = $comment->comment_approved;
     if ($spam_confirmed != 'spam' && $to != $admin_email && $to != $author_email) {
         $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); // e-mail 發出點, no-reply 可改為可用的 e-mail.
         $subject = '您在 [' . get_option("blogname") . '] 的留言有了回應';
         $message = '<div style="background-color:#eef2fa;border:1px solid #d8e3e8;color:#111;padding:0 15px;-moz-border-radius:5px;-webkit-border-radius:5px;-khtml-border-radius:5px;">
             <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
             <p>您曾在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />'
             . trim(get_comment($parent_id)->comment_content) . '</p>
             <p>' . trim($comment->comment_author) . ' 给你的回复:<br />'
             . trim($comment->comment_content) . '<br /></p>
             <p>您可以点击 <a href="' . htmlspecialchars(get_comment_link($parent_id,array("type" => "all"))) . '">查看回复的完整內容</a></p>
             <p>欢迎再度光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
             <p>(此邮件有系统自动发出, 请勿回复.)</p></div>';
         $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
         $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
         wp_mail( $to, $subject, $message, $headers );
     }
 }
?>