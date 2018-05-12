<?php

class TagService extends BaseService {

    public function getAllTags() {
        $name = 'en-us' == LANG_SET ? 'name_en as name' : 'name_cn as name';
        $rows = M( 'Tag' )->field( 'tag_id,' . $name )->where( 'status=0' )->order( 'sort asc' )->select();
        return empty( $rows ) ? array() : $rows;
    }

    public function addTagClickTimes( $tid ) {
        $result = M( "Tag" )->where( "tag_id={$tid}" )->setInc( "click_times" );
        return $result > 0;
    }

}
