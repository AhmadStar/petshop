(function ($) {

    "use strict";

    function stylePreloader() {
        $('body').addClass('preloader-deactive');
    }

    var varWindow = $(window);
    varWindow.on('load', function () {
        stylePreloader();
    });

})(window.jQuery);
