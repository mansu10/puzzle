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
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/less.js"></script>
</head>
<body>

	<header>
		<div class="logo">logo</div>
		<ul class="nav">
			<?php wp_nav_menu( array( 'theme_location'=> 'nav-menu','container' => 'li','container_class' => '','before'=> '','after' => '') ); ?>
		</ul>
		
		<div class="user-wrapper">
			<div>注册</div>
			<div>用户</div>
		</div>
	</header>