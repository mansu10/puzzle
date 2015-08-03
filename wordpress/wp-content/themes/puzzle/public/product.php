<div class="product">
    <div class="touchslider">
        <div class="touchslider-viewport" style="width:700;overflow:hidden;margin:0 auto;height:400px;">
            <div>
                <div class="touchslider-item">
                    <img src="http://fpoimg.com/700x400?text=First" alt="">
                </div>
                <div class="touchslider-item">
                    <img src="http://fpoimg.com/700x400?text=Second" alt="">
                </div>
                <div class="touchslider-item">
                    <img src="http://fpoimg.com/700x400?text=Third" alt="">
                </div>
            </div>
        </div>

        <div class="touchslider-nav">
            <span class="touchslider-prev fa fa-chevron-left"></span>
            <span class="touchslider-nav-item touchslider-nav-item-current"></span>
            <span class="touchslider-nav-item"></span>
            <span class="touchslider-nav-item"></span>
            <span class="touchslider-next fa fa-chevron-right"></span>
        </div>
    </div>
    <script type="text/javascript">
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
</div>
