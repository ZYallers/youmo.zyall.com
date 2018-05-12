<!--<extend name="Layout:base"/>-->
<block name="title">首页{$Think.lang.titleTail}</block>
<block name="css"></block>
<block name="content">
    <div class="padding-small">
        <button class="button icon-navicon" data-target="#content-nav"></button>
        <ul class="nav nav-big nav-menu nav-inline nav-tabs nav-right nav-navicon border-main" id="content-nav">
            <li class="nav-head"><span class="icon-list"></span></li>
            <li class="active"><a href="#">最新</a></li>
            <li><a href="#">最赞</a></li>
            <li><a href="#">最烂</a></li>
        </ul>
    </div>
    <?php
    $list = array(
        0 => array( 'type' => 2, 'title' => '别人家的老师', 'img' => '/Public/image/buzaiqiaoke.jpg',
            'summary' => '我想我再也不会翘课了',
            'time' => '2014-12-09 12:08', 'view' => 134, 'zan' => 56, 'cai' => 13 ),
        1 => array( 'type' => 1, 'title' => '老板，你一定是故意的', 'img' => '老板',
            'summary' => '老板给员工讲话：“大家好，我是你们的老板，为了亲切，你们以后就叫我老大。” 他又看看女员工，“如果你们业绩突出的话，你们还有机会坐在老二的位置上”。',
            'time' => '2014-12-09 12:08', 'view' => 134, 'zan' => 56, 'cai' => 13 ),
        2 => array( 'type' => 1, 'title' => '敢不敢不要这么高调', 'img' => '高调',
            'summary' => ' 跟老公去菜市场买菜，买得差不多了，身上还剩二块五，老公说不如再买条茄子，可是他选了好几条都超重了，我一向眼力好，随手挑了一根，刚好二块五。 兴奋地高举茄子，大声喊道：老公，这根茄子大小正合适耶！！ 顿时众人侧目，我当场石化。',
            'time' => '2014-12-09 12:08', 'view' => 134, 'zan' => 56, 'cai' => 13 ),
        3 => array( 'type' => 1, 'title' => '感觉不会再爱了', 'img' => '练太极',
            'summary' => '早上，碰见一胡子花白的老头练太极，走上去问了下“能教教我吗” 老头笑了笑:"小伙子，来，打我一拳！“心想这人高深莫测啊，就轻轻打了一掌，老头立马倒地:"来人啊,打人了,打人了！”，身上钱就这样被讹光了。',
            'time' => '2014-12-09 12:08', 'view' => 134, 'zan' => 56, 'cai' => 13 ),
        4 => array( 'type' => 2, 'title' => '合法经营', 'img' => 'http://img3.cache.netease.com/m/2014/11/14/201411141943080b33b.png',
            'summary' => '秦皇岛巨贪马超群家中被搜出现金上亿元、黄金37公斤、房产手续68套。其母辩称，巨额钱财是由先夫合法经营所得。',
            'time' => '2014-12-09 12:08', 'view' => 134, 'zan' => 56, 'cai' => 13 ),
    );
    ?>
    <div id="ym-list">
        <?php foreach ( $list as $value ): ?>
            <div class="panel margin-bottom">
                <div class="panel-head">
                    <?php if ( 1 == $value['type'] ): ?>
                        <div class="txt radius-circle bg-main rotate-hover">{$value.img}</div>
                    <?php else: ?>
                        <img src="{$value.img}" class="radius-circle rotate-hover" width="48" height="48" alt="{$value.title}">
                    <?php endif; ?>
                    <h2 style="display: inline-block;margin-left: 5px;vertical-align: top;margin-top: 10px;"><a href="#"><strong>{$value.title}</strong></a></h2>
                </div>
                <div class="panel-body">{$value.summary}</div>
                <div class="panel-foot clearfix">
                    <div class="float-left"><span class="badge margin-small-right"><i class="icon-globe"></i> {$value.time}</span></div>
                    <div class="float-right">
                        <span class="badge bg-green margin-small-right"><i class="icon-thumbs-up"></i> {$value.zan}</span>
                        <span class="badge bg-red margin-small-right"><i class="icon-thumbs-down"></i> {$value.cai}</span>
                        <span class="badge bg-main margin-small-right"><i class="icon-eye"></i> {$value.view}</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="text-center padding clearfix">
            <ul class="pagination pagination-big border-main">
                <li class="margin-small-right margin-small-bottom hidden-l"><a href="#" class="icon-angle-left"></a></li>
                <li class="margin-small-right margin-small-bottom active"><a href="#">1</a></li>
                <li class="margin-small-right margin-small-bottom"><a href="#">2</a></li>
                <li class="margin-small-right margin-small-bottom"><a href="#">3</a></li>
                <li class="margin-small-right margin-small-bottom"><a href="#">4</a></li>
                <li class="margin-small-right margin-small-bottom"><a href="#"><i class="icon-ellipsis-h"></i></a></li>
                <li class="margin-small-right margin-small-bottom"><a href="#">5</a></li>
                <li class="margin-small-right  margin-small-bottom hidden-l"><a href="#" class="icon-angle-right"></a></li>
            </ul>
        </div>
        <br/>
    </div>
</block>