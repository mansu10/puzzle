<html>
<head>
	<meta http-equiv="content-type" content="html/text;charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title></title>

	<link rel="stylesheet/less" type="text/less" href="<?php bloginfo('template_url'); ?>/css/default.less">
	<link rel="stylesheet/less" type="text/less" href="<?php bloginfo('template_url'); ?>/css/detail.less">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/jqcloud.css">
	<link rel="stylesheet/less" type="text/less" href="<?php bloginfo('template_url'); ?>/css/forum.less">

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/style.css" >
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/less.js"></script>
	<?php wp_head(); ?>

</head>
<?php flush(); ?>
<body>

	<header id="header">
		<div class="logo">logo</div>
		<ul class="nav">
			<?php wp_nav_menu( array( 'theme_location'=> 'nav-menu','container' => 'li','container_class' => '','before'=> '','after' => '') ); ?>
		</ul>
		
		<div class="user-wrapper">
			<?php if (is_user_logged_in()) { 
				global $current_user;
				get_currentuserinfo();

			?>
			<div class="logged">
				<a href="" ><?php echo $current_user->display_name ?></a>
				<ul class="op-box">
					<li><a href="<?php bloginfo('url') ?>/wp-admin/admin.php?page=content_page">收藏列表</a></li>
					<li><a href="<?php bloginfo('url'); ?>/wp-admin/profile.php">编辑资料</a></li>
					<li><a href="<?php bloginfo('url'); ?>/wp-login.php?action=logout">退出</a></li>
				</ul>
			</div>
				

			 <?php } else { ?>
			<div><a href="<?php bloginfo('url'); ?>/wp-login.php">登录</a></div>
			<div><a href="<?php bloginfo('url'); ?>/wp-login.php?action=register" target="_blank">注册</a></div>
			<?php } ?>
		</div>
	</header>