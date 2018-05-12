<?php

class UserService extends BaseService {

    /**
     * 添加用户
     * @param type $data
     * @return type
     */
    public function addUser( $data ) {
        $result = 0;
        $userModel = M( 'User' );
        $existEmail = $userModel->where( array( 'email' => $data['email'] ) )->find();
        if ( !empty( $existEmail ) ) {
            return -1;
        }
        $exitMobile = $userModel->where( array( 'mobile' => $data['mobile'] ) )->find();
        if ( !empty( $exitMobile ) ) {
            return -2;
        }
        try {
            $userModel->startTrans();
            import( 'ORG.Util.String' );
            $data['salt'] = String::randString( 8 );
            $data['password'] = md5( $data['password'] . 'YOUMO' . $data['salt'] );
            $data = array_merge( $data, array( 'create_time' => time(), 'update_time' => time() ) );
            $result = $userModel->data( $data )->add();
            if ( $result > 0 ) {
                $userModel->commit();
            } else {
                $userModel->rollback();
            }
        } catch ( Exception $exc ) {
            $userModel->rollback();
            Log::write( $exc->getTraceAsString() );
        }
        return $result;
    }

    /**
     * 用户登录验证
     * @param type $account
     * @param type $password
     * @return type
     */
    public function userLogin( $account, $password ) {
        $userModel = M( 'User' );
        $user = $userModel->where( "`email`='{$account}' OR `mobile`='{$account}'" )->find();
        if ( empty( $user ) ) {
            return -1;
        }
        $pwd = md5( $password . 'YOUMO' . $user['salt'] );
        if ( $pwd != $user['password'] ) {
            return -2;
        }
        unset( $user['password'], $user['salt'] );
        session( 'user', json_encode( $user ) );
        return 1;
    }

}
