<?php

abstract class BaseService extends Model {

    protected function getPager( $count, $list, $page, $limit, $query = '' ) {
        $pages = $count > 0 ? ceil( $count / $limit ) : 1;
        $pager = array( "total" => $count, "list" => $list, "page" => $page,
            "limit" => $limit, "pages" => $pages, "query" => $query, "html" => "" );
        if ( $pages > 1 ) {
            $html = '<div id="ny_right_body_footer">
                        <div id="page">
                            <span>共<b>15</b>记录</span>
                            <span><b>1</b>/3</span>
                            <span>首页</span><span>上一页</span>
                            <span class="current">01</span>
                            <a href="?2-2.html">02</a>
                            <a href="?2-3.html">03</a>
                            <a href="?2-2.html">下一页</a>
                            <a href="?2-3.html">最后</a>
                        </div>
                    </div>';
            $html = '<div id="ny_right_body_footer"><div id="page"><span>共<b>' . $count . '</b>记录</span><span><b>' . $page . '</b>/' . $pages . '</span>';
            $from = max( $page - 3, 1 );
            $to = max( min( $page + 3, $pages ), 1 );
            $perv = max( $from - 1, 1 );
            $next = max( min( $to + 1, $pages ), 1 );
            if ( $from > 1 ) {
                $html .= "<a href=\"/product?page=1&{$query}\">1</a>";
                $html .= "<a href=\"/product?page={$perv}&{$query}\">...</a>";
            }
            for ( $i = $from; $i <= $to; $i++ ) {
                $actived = $i == $page ? 'active' : '';
                if ( $i == $page ) {
                    $html .= "<span class=\"current\">{$i}</span>";
                } else {
                    $html .= "<a href=\"/product?page={$i}&{$query}\">{$i}</a>";
                }
            }
            if ( $to < $pages ) {
                $html .= "<a href=\"/product?page={$next}&{$query}\">...</a>";
                $html .= "<a href=\"/product?page={$pages}&{$query}\">{$pages}</a>";
            }
            $pager['html'] = $html . "</div></div>";
        }
        return $pager;
    }

    protected function getTotal( $model, $condition = array() ) {
        $row = $model->field( 'count(*) as total' )->where( $condition )->find();
        return empty( $row ) ? 0 : ( int ) $row["total"];
    }

    protected function getFoundRows() {
        $row = M()->query( 'SELECT FOUND_ROWS() AS rows' );
        return empty( $row ) ? 0 : ( int ) $row[0]['rows'];
    }

}
