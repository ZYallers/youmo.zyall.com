<?php

class UserAction extends Action {

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
            $user['username'] = I( 'post.username', '', 'addslashes' );
            $user['password'] = I( 'post.password', '', 'addslashes' );
            $user['email'] = I( 'post.email', '', 'addslashes' );
            $user['mobile'] = I( 'post.mobile', '', 'addslashes' );
            if ( empty( $user['username'] ) || empty( $user['password'] ) || empty( $user['email'] ) ) {
                $this->error( '必要参数为空' );
            }
            $result = D( 'User' )->addUser( $user );
            if ( $result > 0 ) {
                $this->success( '添加用户完成' );
            } else {
                if ( $result == -1 ) {
                    $this->error( '邮箱“' . $user['email'] . '”已注册过' );
                } else if ( $result == -2 ) {
                    $this->error( '手机“' . $user['mobile'] . '”已绑定过' );
                } else {
                    $this->error( '添加用户失败' );
                }
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

    Public function verify() {
        import( 'ORG.Util.Image' );
        Image::buildImageVerify( 6, 1, 'png', 42, 33 );
    }

    public function login() {
        if ( $this->isPost() ) {
            $token = I( 'post.token' );
            if ( $token != session( 'token' ) ) {
                $this->error( '非法提交', U( 'User/login' ) );
            }
            session( 'token', null );
            $verify = I( 'post.verify' );
            $account = I( 'post.account', '', 'addslashes' );
            $password = I( 'post.password', '', 'addslashes' );
            if ( empty( $account ) || empty( $password ) || empty( $verify ) ) {
                $this->error( '必要参数为空', U( 'User/login' ) );
            }
            if ( session( 'verify' ) != md5( $verify ) ) {
                $this->error( '验证码错误', U( 'User/login' ) );
            }
            $result = D( 'User' )->userLogin( $account, $password );
            if ( $result > 0 ) {
                $this->success( '欢迎您回来', U( 'Home/index' ) );
            } else {
                $this->error( '账号或密码不正确', U( 'User/login' ) );
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

    public function logout() {
        session( 'user', null );
        $this->success( '您已安全退出', U( 'Home/index' ) );
    }

}
