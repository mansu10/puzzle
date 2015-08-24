<div>
<?php bbp_logout_link(); ?>
<a href="<?php bbp_user_profile_url( bbp_get_current_user_id() ); ?>edit" >Amend Profile/Change password</a>
<?php bbp_get_template_part( 'loop', 'single-forum' ); ?>
<?php bbp_get_template_part( 'loop', 'loop-single-reply' ); ?>
</div>