<?php

class HomeAction extends Action {

    public function _initialize() {
        $this->assign( 'language', LANG_SET );
    }

    public function index() {
        $this->display();
    }

}
