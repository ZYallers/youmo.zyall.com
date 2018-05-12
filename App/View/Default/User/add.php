<!--<extend name="Layout:base"/>-->
<block name="title">添加用户{$Think.lang.titleTail}</block>
<block name="css">
    <style>#ym-content-left{width: 100%;}</style>
</block>
<block name="content">
    <div class="padding-top">
        <form id="user_add_form" name="user_add_form" action="{:U('User/add')}" method="post" class="form-big">
            <div class="form-group">
                <div class="label">
                    <span class="text-red">*</span>
                    <label for="username">用户名</label>
                    <span class="text-gray text-small"><i class="icon-info-circle"></i>&nbsp;最长20个字符</span>
                </div>
                <div class="field">
                    <input type="text" class="input" id="username" name="username" size="20" placeholder="用户名"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <span class="text-red">*</span>
                    <label for="password">密 码</label>
                    <span class="text-gray text-small"><i class="icon-info-circle"></i>&nbsp;8~12个字符</span>
                </div>
                <div class="field">
                    <input type="password" class="input" id="password" name="password" size="50" placeholder="密码"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <span class="text-red">*</span>
                    <label for="email">邮 箱</label>
                    <span class="text-gray text-small"><i class="icon-info-circle"></i>&nbsp;为后面激活账号和找回密码推送等需要</span>
                </div>
                <div class="field">
                    <input type="text" class="input" id="email" name="email" size="50" placeholder="simple@qq.com"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="mobile">手 机</label>
                </div>
                <div class="field">
                    <input type="text" class="input" id="mobile" name="mobile" size="20" placeholder="13546823641"/>
                </div>
            </div>
            <div class="form-button">
                <button class="button border-main" id="submit" type="sumbit">&nbsp;添&nbsp;加&nbsp;</button>
                <button class="button border-red" type="reset">&nbsp;重&nbsp;填&nbsp;</button>
                <input type="hidden" name="token" value="{$token}"/>
            </div>
        </form>
    </div>
</block>
<block name="js">
    <script>
        $( function() {
            $( '#submit' ).on( 'click', function() {
                var username = $.trim( $( '#username' ).val() );
                if ( username.length === 0 ) {
                    alert( '请先填写用户名' );
                    return false;
                }
                if ( username.length > 20 ) {
                    alert( '用户名过于长' );
                    return false;
                }
                var password = $.trim( $( '#password' ).val() );
                if ( password.length === 0 ) {
                    alert( '请先填写密码' );
                    return false;
                }
                if ( password.length < 8 ) {
                    alert( '密码过于短' );
                    return false;
                }
                if ( password.length > 12 ) {
                    alert( '密码过于长' );
                    return false;
                }
                var email = $.trim( $( '#email' ).val() );
                if ( email.length === 0 ) {
                    alert( '请先填写邮箱' );
                    return false;
                }
                if ( !window.utils.valiEmail( email ) ) {
                    alert( '邮箱格式不符合' );
                    return false;
                }
                var mobile = $.trim( $( '#mobile' ).val() );
                if ( mobile.length > 0 && !/^((13[0-9]{1})|159|153)+\d{8}$/.test( mobile ) ) {
                    alert( '手机格式不符合' );
                    return false;
                }
                $( '#user_add_form' ).submit();
                return true;
            } );
        } );
    </script>
</block>