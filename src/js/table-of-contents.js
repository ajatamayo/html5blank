var BLANK = (function(BLANK) {

    BLANK.TOC = BLANK.TOC || {};

    BLANK.TOC.init = function() {
        BLANK.TOC.initScrollSpy();
        BLANK.TOC.initPushpin();
    };

    BLANK.TOC.initScrollSpy = function() {
        $(".scrollspy").scrollSpy();
    };

    BLANK.TOC.initPushpin = function() {
        $(".toc-wrapper").each(function() {
            var $this = $(this);
            var $target = $("article");
            $this.width($this.parent().width());
            $this.pushpin({
                top: $target.offset().top,
                bottom: $target.offset().top + $target.outerHeight() - $this.height(),
                onPositionChange: function(arg1, arg2) {
                    console.log(arg1, arg2);
                }
            });
        });
    };

    return BLANK;

}(BLANK || {}));
