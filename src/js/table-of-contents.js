var BLANK = (function(BLANK) {

    BLANK.TOC = BLANK.TOC || {};

    BLANK.TOC.init = function() {
        BLANK.TOC.initScrollSpy();
        BLANK.TOC.initPushpin();
    };

    BLANK.TOC.initScrollSpy = function() {
        $(".scrollspy").scrollSpy({
            scrollOffset: 70
        });
    };

    BLANK.TOC.initPushpin = function() {
        $(".toc-wrapper").each(function() {
            var $this = $(this);
            var $target = $(".section.scrollspy").first();
            $this.width($this.parent().width());
            $this.pushpin({
                top: $target.offset().top,
                bottom: $target.parent().offset().top + $target.parent().outerHeight() - $this.height(),
                offset: 32
            });
        });
    };

    return BLANK;

}(BLANK || {}));
