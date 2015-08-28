	<footer>
		<div class="contact">
			<div>
				<ul>
					<li>links</li>
					<li>links</li>
					<li>links</li>
					<li>links</li>
					<li>links</li>
					<li>links</li>
				</ul>
			</div>
			<div>
				<ul>
					<li>contacts</li>
					<li>contacts</li>
					<li>contacts</li>
					<li>contacts</li>
					<li>contacts</li>
					<li>contacts</li>
				</ul>
			</div>
			<div>
				<ul>
					<li>others</li>
					<li>others</li>
					<li>others</li>
					<li>others</li>
					<li>others</li>
					<li>others</li>
				</ul>
			</div>
		</div>
		<div class="legal">
			legal information
		</div>
	</footer>
    <?php wp_footer(); ?>
</body>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.touchslider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jqcloud-1.0.4.js"></script>
<script type="text/javascript">
      var word_list = [
        {text: "Lorem", weight: 13, link: "https://github.com/DukeLeNoir/jQCloud"},
        {text: "Ipsum", weight: 10.5, html: {title: "My Title", "class": "custom-class"}, link: {href: "http://jquery.com/", target: "_blank"}},
        {text: "Dolor", weight: 9.4},
        {text: "Sit", weight: 8},
        {text: "Amet", weight: 6.2},
        {text: "Consectetur", weight: 5},
        {text: "Adipiscing", weight: 5},
        {text: "Elit", weight: 5},
        {text: "Nam et", weight: 5},
        {text: "Leo", weight: 4},
        {text: "Sapien", weight: 4},
        {text: "Pellentesque", weight: 3},
        {text: "habitant", weight: 3},
        {text: "morbi", weight: 3},
        {text: "tristisque", weight: 3},
        {text: "senectus", weight: 3},
        {text: "et netus", weight: 3},
        {text: "et malesuada", weight: 3},
        {text: "fames", weight: 2},
        {text: "ac turpis", weight: 2},
        {text: "egestas", weight: 2},
        {text: "Aenean", weight: 2},
        {text: "vestibulum", weight: 2},
        {text: "elit", weight: 2},
        {text: "sit amet", weight: 2},
        {text: "metus", weight: 2},
        {text: "adipiscing", weight: 2},
        {text: "ut ultrices", weight: 2},
        {text: "justo", weight: 1},
        {text: "dictum", weight: 1},
        {text: "Ut et leo", weight: 1},
        {text: "metus", weight: 1},
        {text: "at molestie", weight: 1},
        {text: "purus", weight: 1},
        {text: "Curabitur", weight: 1},
        {text: "diam", weight: 1},
        {text: "dui", weight: 1},
        {text: "ullamcorper", weight: 1},
        {text: "id vuluptate ut", weight: 1},
        {text: "mattis", weight: 1},
        {text: "et nulla", weight: 1},
        {text: "Sed", weight: 1}
      ];
      $(function() {
        $("#label-cloud").jQCloud(word_list);
      });
    jQuery(function($) {
        $(".touchslider").touchSlider({
            container: this,
            duration: 350, // 动画速度
            delay: 3000, // 动画时间间隔
            margin: 5,
            mouseTouch: true,
            namespace: "touchslider",
            next: ".touchslider-next", // next 样式指定
            pagination: ".touchslider-nav-item",
            currentClass: "touchslider-nav-item-current", // current 样式指定
            prev: ".touchslider-prev", // prev 样式指定
            // scroller: viewport.children(),
            autoplay: true, // 自动播放
            viewport: ".touchslider-viewport"
        });
    });
</script>
</html>