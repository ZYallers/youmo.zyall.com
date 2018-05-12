$(function(){

	var utils = {};

	/**
     * 获取浏览器当前窗口大小
     * @return {object}
     * @url http://www.cnblogs.com/quanhai/archive/2010/04/16/1713124.html
     */
    utils.getWindowSize = function( ) {
        var winWidth = 0, winHeight = 0;
        //获取窗口宽度
        if ( window.innerWidth ) {
            winWidth = window.innerWidth;
        } else if ( document.body && document.body.clientWidth ) {
            winWidth = document.body.clientWidth;
        }
        //获取窗口高度
        if ( window.innerHeight ) {
            winHeight = window.innerHeight;
        } else if ( document.body && document.body.clientHeight ) {
            winHeight = document.body.clientHeight;
        }
        //通过深入Document内部对body进行检测，获取窗口大小
        if ( document.documentElement && document.documentElement.clientHeight && document.documentElement.clientWidth ) {
            winHeight = document.documentElement.clientHeight;
            winWidth = document.documentElement.clientWidth;
        }
        return {width: winWidth, height: winHeight};
    };

    window.utils = utils;

});