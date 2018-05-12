<!--<extend name="Layout:base"/>-->
<block name="title">用户登录{$Think.lang.titleTail}</block>
<block name="css">
    <style>#ym-content-left{width: 100%;}</style>
</block>
<block name="content">
    <div class="padding-top">
        <form id="user_login_form" name="user_login_form" action="{:U('User/login')}" method="post" class="form-big">
            <div class="form-group">
                <div class="label">
                    <label for="account">账 号</label>
                </div>
                <div class="field">
                    <input type="text" class="input" id="account" name="account" size="20" placeholder="邮箱或手机"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="password">密 码</label>
                </div>
                <div class="field">
                    <input type="password" class="input" id="password" name="password" size="50" placeholder="密码"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="verify">验证码</label>
                </div>
                <div class="field">
                    <input type="text" class="input" id="verify" name="verify" size="6" placeholder="验证码" 
                           style="display: inline-block;width: 90%"/><img id='switch_verify' style="width: 10%;cursor: pointer;" src="{:U('User/verify')}"/>
                </div>
            </div>
            <div class="form-button">
                <button class="button border-main" id="submit" type="sumbit">&nbsp;登 录&nbsp;</button>
                <button class="button border-red" type="reset">&nbsp;重&nbsp;填&nbsp;</button>
                <input type="hidden" name="token" value="{$token}"/>
            </div>
        </form>
    </div>
</block>
<block name="js">
    <script>
        $( function() {
            $( '#switch_verify' ).on( 'click', function() {
                $( this ).attr( 'src', "{:U('User/verify')}" );
            } );
            $( '#submit' ).on( 'click', function() {
                var account = $.trim( $( '#account' ).val() );
                if ( account.length === 0 ) {
                    alert( '请先填写账号' );
                    return false;
                }
                if ( !window.utils.valiEmail( account ) && !/^((13[0-9]{1})|159|153)+\d{8}$/.test( account ) ) {
                    alert( '账号格式不符合' );
                    return false;
                }
                var password = $.trim( $( '#password' ).val() );
                if ( password.length === 0 ) {
                    alert( '请先填写密码' );
                    return false;
                }
                var verify = $.trim( $( '#verify' ).val() );
                if ( verify.length === 0 ) {
                    alert( '请先填写验证码' );
                    return false;
                }
                $( '#user_login_form' ).submit();
                return true;
            } );
        } );
    </script>
</block>