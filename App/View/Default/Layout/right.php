<?php
$recs = array(
    0 => array( 'type' => 1, 'img' => '双十一', 'title' => '双十一冰毒8折供货',
        'summary' => '浙江台州一毒贩邓某双十一竟然也凑热闹搞促销！“双十一冰毒8折供货”', ),
    1 => array( 'type' => 2, 'img' => 'http://img5.cache.netease.com/m/2014/11/13/20141113164824a2765.jpg', 'title' => '领导人礼服',
        'summary' => '一家自称位于武汉的网店，热卖“2014 APEC领导人同款现代中式礼服”', ),
    2 => array( 'type' => 1, 'img' => 'Angelababy', 'title' => 'Angelababy',
        'summary' => '著名演员"Angelababy"竟然被注册为茶叶商标！注册公司还有这么个宣传语', ),
    3 => array( 'type' => 2, 'img' => 'http://img2.cache.netease.com/m/2014/11/13/201411131701598447b.gif', 'title' => '什么才是土豪',
        'summary' => '什么才是土豪，这就是！', ),
    4 => array( 'type' => 2, 'img' => 'http://img1.cache.netease.com/m/2014/11/13/20141113175338c552f.jpg', 'title' => '任性',
        'summary' => '还是那句话，有钱，任性！', ),
    5 => array( 'type' => 2, 'img' => 'http://img2.cache.netease.com/m/2014/11/13/20141113122539fafec.jpg', 'title' => '相机',
        'summary' => '你看，相机都承认胸怀很重要，对不对？', ),
    6 => array( 'type' => 2, 'img' => 'http://img3.cache.netease.com/m/2014/11/13/201411131225429aa4d.jpg', 'title' => '分不清男女',
        'summary' => '宁波某派出所民警最近抓获一名吸毒男子，该男子上厕所时露出女式内裤引起民警怀疑', ),
    7 => array( 'type' => 1, 'img' => '奇葩', 'title' => '奇葩丈夫',
        'summary' => '福州一丈夫，他老婆为了在双11抢网络方便购物，所以绑住了他的双手。', ),
    8 => array( 'type' => 2, 'img' => 'http://img1.cache.netease.com/m/2014/11/13/201411131226104ae41.jpg', 'title' => '有钱人',
        'summary' => '河北某市一涉嫌受贿、贪污、挪用公款的官员家中搜出现金上亿元，黄金37公斤，房产手续68套', ),
    9 => array( 'type' => 1, 'img' => '女朋友', 'title' => '好内涵的对话',
        'summary' => '有天跟同学出去吃饭，同学总换女朋友，一个月没见又瘦了', ),
);
$bgcolors = array( 'main','sub','dot','black','gray','red','yellow','blue','green' );
$tags = array(
    0 => '挖掘机',
    1 => '屌丝',
    2 => '男神',
    3 => '女神',
    4 => '萌萌哒',
    5 => '思密达',
    6 => '分手大师',
    7 => '基友',
    7 => '土豪',
    8 => '小伙伴',
);
?>
<div class="panel">
    <div class="panel-head bg-main"><h3><i class="icon-thumbs-up"></i>&nbsp;爆笑推荐</h3></div>
    <div class="panel-body" style="padding: 0">
        <div class="list-link" style="border: none;border-radius: 0">
            <?php foreach ( $recs as $rec ): ?>
                <a href="#">
                    <div class="media media-x">
                        <?php if ( 1 == $rec['type'] ): ?>
                            <div class="txt radius-circle bg-green float-left">{$rec.img}</div> 
                        <?php else: ?>
                            <img src="{$rec.img}" width="46" height="46" class="img-rounded radius-circle float-left" alt="{$rec.title}"/>
                        <?php endif; ?>
                        <div class="media-body"> 
                            <strong>{$rec.title}</strong>{$rec.summary}
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<br>
<div class="panel">
    <div class="panel-head bg-main"><h3><i class="icon-thumb-tack"></i>&nbsp;热门标签</h3></div>
    <div class="panel-body">
        <?php foreach ( $tags as $tag ): ?>
        <a href="#" class="button button-small margin-small-bottom margin-small-right bg-<?php echo $bgcolors[array_rand($bgcolors)]; ?> swing-hover"><i class="icon-circle-o"></i>&nbsp;{$tag}</a>
        <?php endforeach; ?>
    </div>
</div>
<br>