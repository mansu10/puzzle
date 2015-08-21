<?php
    if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
?>

<form name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
	<div><textarea name="comment" rows="5" placeholder="write comments"></textarea></div>
	<div><button onClick="Javascript:document.forms['commentform'].submit()"  class="btn pull-right">submit</button></div>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>	
</form>

<?php 
    if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { 
        // if there's a password
        // and it doesn't match the cookie
    ?>
    <li class="decmt-box">
        <p><a href="#addcomment">请输入密码再查看评论内容.</a></p>
    </li>
    <?php 
        } else if ( !comments_open() ) {
    ?>
    <li class="decmt-box">
        <p><a href="#addcomment">评论功能已经关闭!</a></p>
    </li>
    <?php 
        } else if ( !have_comments() ) { 
    ?>
    <li class="decmt-box">
        <p><a href="#addcomment">还没有任何评论，你来说两句吧</a></p>
    </li>
    <?php 
        } else {
            wp_list_comments('type=comment&callback=mansu_comment');
        }
    ?>