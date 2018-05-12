<?php

class ArticleAction extends Action {

    public function _initialize() {
        $this->assign( 'language', LANG_SET );
    }

    public function add() {
        if ( $this->isPost() ) {
            $token = I( 'post.token' );
            if ( $token != session( 'token' ) ) {
                $this->error( '非法提交' );
            }
            session( 'token', null );
            $data['title'] = I( 'post.title', '', 'addslashes' );
            $data['type'] = I( 'post.type', 1, 'addslashes' );
            $data['tag'] = I( 'post.tag', '', 'addslashes' );
            $data['body'] = I( 'post.body', '', 'addslashes' );
            $data['status'] = I( 'post.status', 2 );
            if ( empty( $data['title'] ) || empty( $data['type'] ) || empty( $data['tag'] ) || empty( $data['body'] ) ) {
                $this->error( '必要参数为空' );
            }
            $result = D( 'Article' )->addArticle( $data );
            if ( $result > 0 ) {
                $this->success( '发布文章完成' );
            } else {
                $this->error( '发布文章失败' );
            }
        } else {
            $this->assign( 'adminView', true );
            import( 'ORG.Util.String' );
            $token = String::randString( 32 );
            session( 'token', $token );
            $this->assign( 'token', $token );
            $this->display();
        }
    }

    public function edit() {
        $this->display();
    }

    public function del() {
        $this->display();
    }

}
