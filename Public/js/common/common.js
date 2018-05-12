$( function() {
    var resizeBanner = function() {
        var wh = utils.getWindowSize();
        if ( wh.width <= 760 ) {
            $( '.ym-banner, .ym-banner img' ).height( wh.width * 0.35 + 'px' );
            $( '.ym-banner2, .ym-banner2 img, .ym-banner2 .ym-banner-text' ).height( wh.width * 0.23 + 'px' );
        }
    };
    resizeBanner();
} );