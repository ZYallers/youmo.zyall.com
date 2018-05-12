<!DOCTYPE html>
<html lang="{$language}">
    <head>
        <title><block name="title"></block></title>
        <block name="keywords"><meta name="keywords" content="{$Think.lang.keywords}"/></block>
        <block name="description"><meta name="description" content="{$Think.lang.description}"/></block>
        <include file="Layout:head"/>
        <link href="/Public/css/pintuer/pintuer.css" rel="stylesheet"/>
        <link href="/Public/css/base.css" rel="stylesheet"/>
        <block name="css"></block>
    </head>
    <body>
        <include file="Layout:top"/>
        <?php if(!$adminView):?><include file="Layout:header"/><?php endif;?>
        <div class="container">
            <?php if(!$adminView):?>
                <include file="Layout:banner"/>
                <br/>
            <?php endif;?>
            <div class="line-big">
                <div id="ym-content-left" class="xl12 xm8 fadein-left">
                    <block name="content"></block>
                </div>
                <?php if(!$adminView):?>
                    <div id="ym-content-right" class="xl12 xm4 fadein-right">
                        <include file="Layout:right"/>
                    </div>
                <?php endif;?>
            </div>
            <br/>
        </div>
        <div id="ym-gotop" class="win-backtop icon-arrow-circle-up"></div>
        <include file="Layout:footer"/>
        <script src="/Public/js/jquery/jquery-1.11.0.min.js"></script>
        <script src="/Public/js/pintuer/pintuer.js"></script>
        <script src="/Public/js/respond/respond-1.4.2.min.js"></script>
        <script src="/Public/js/common/functions.js"></script>
        <script src="/Public/js/common/common.js"></script>
        <block name="js"></block>
        <script>
            var _hmt = _hmt || [];
            (function() {
              var hm = document.createElement("script");
              hm.src = "//hm.baidu.com/hm.js?99a6e8af97f3e060c1f1c912254283a9";
              var s = document.getElementsByTagName("script")[0]; 
              s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </body>
</html>