<!--<extend name="Layout:base"/>-->
<block name="title">新建文章{$Think.lang.titleTail}</block>
<block name="css">
    <style>#ym-content-left{width: 100%;}</style>
</block>
<block name="content">
    <div class="padding-small-top">
        <form id="acticle_add_form" name="acticle_add_form" action="{:U('Article/add')}" method="post" class="form-big">
            <div class="form-group">
                <div class="label">
                    <span class="text-red">*</span>
                    <label for="title">标题</label>
                </div>
                <div class="field">
                    <input type="text" class="input" id="title" name="title" size="50" placeholder="标题"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <span class="text-red">*</span>
                    <label for="type">类型</label>
                </div>
                <div class="field">
                    <select class="input" id="type" name="type">
                        <option value="1">乐文</option>
                        <option value="2">乐图</option>
                        <option value="3">乐视</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <span class="text-red">*</span>
                    <label for="tag">标签</label>
                    <span class="text-gray text-small"><i class="icon-info-circle"></i>&nbsp;多个标签之间用空格分隔</span>
                </div>
                <div class="field">
                    <input type="text" class="input" id="tag" name="tag" size="50" placeholder="标签1 标签2"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <span class="text-red">*</span>
                    <label for="body">内容</label>
                </div>
                <div class="field">
                    <textarea class="input" id="body" name="body" style="min-height: 400px;"></textarea>
                </div>
            </div>
            <div class="form-button text-center">
                <button class="button border-main" id="submit" type="sumbit">&nbsp;发&nbsp;布&nbsp;</button>
                <button class="button border-gray" id="draft" type="sumbit">&nbsp;存草稿&nbsp;</button>
                <button class="button border-red" type="reset">&nbsp;重&nbsp;填&nbsp;</button>
                <input type="hidden" id="status" name="status" value="1"/>
                <input type="hidden" name="token" value="{$token}"/>
            </div>
        </form>
    </div>
</block>
<block name="js">
    <script charset="utf-8" src="/Public/js/kindeditor/kindeditor-min.js"></script>
    <script charset="utf-8" src="/Public/js/kindeditor/lang/zh_CN.js"></script>
    <script>
        KindEditor.ready( function( K ) {
            window.editor = null;
            var options = {
                items: [
                    'source', 'undo', 'redo',
                    'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'clearhtml',
                    'formatblock', 'fontname', 'fontsize', 'forecolor', 'hilitecolor', 'bold',
                    'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', 'image', 'multiimage',
                    'flash', 'media', 'hr', 'emoticons', 'link', 'unlink'
                ],
                resizeType: 1,
                newlineTag: 'br',
                afterChange: function() {
                    window.editor && window.editor.sync();
                }
            };
            window.editor = K.create( '#body', options );
        } );

        $( function() {
            var checkForm = function() {
                var title = $.trim( $( '#title' ).val() );
                if ( title.length === 0 ) {
                    alert( '请先填写标题' );
                    return false;
                }
                var tag = $.trim( $( '#tag' ).val() );
                if ( tag.length === 0 ) {
                    alert( '请先填写至少一个标签' );
                    return false;
                }
                var body = $.trim( $( '#body' ).val() );
                if ( body.length === 0 ) {
                    alert( '请先填写内容' );
                    return false;
                }
                $( '#acticle_add_form' ).submit();
                return true;
            };
            $( '#submit' ).on( 'click', function() {
                checkForm();
            } );
            $( '#draft' ).on( 'click', function() {
                $( '#status' ).val( '2' );
                checkForm();
            } );
        } );
    </script>
</block>