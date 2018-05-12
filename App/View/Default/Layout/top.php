<?php $user = session( 'user' ); ?>
<?php if ( !empty( $user ) ): ?>
    <?php $user = json_decode( session( 'user' ), true ); ?>
    <div class="container border-bottom">
        <div class="line padding-small-top padding-small-bottom">
            <span class=""><i class="icon-smile-o"></i><?php echo $user['username']; ?>&nbsp;<i class="icon-clock-o"></i><?php echo date( 'Y.m.d H:i:s' ); ?></span>&nbsp;
            <a href="{:U('Article/add')}" title="新建文章"><i class="icon-plus-square"></i></a>&nbsp;
            <a href="{:U('Article/manager')}" title="管理文章"><i class="icon-cog"></i></a>&nbsp;
            <a href="{:U('User/add')}" title="添加用户"><i class="icon-user"></i></a>&nbsp;
            <a href="{:U('User/logout')}" title="安全退出"><i class="icon-sign-out"></i></a>&nbsp;
        </div>
    </div>
<?php endif; ?>