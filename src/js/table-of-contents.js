var BLANK = (function(BLANK) {

    BLANK.TOC = BLANK.TOC || {};

    BLANK.TOC.init = function() {
        BLANK.TOC.initScrollSpy();
        BLANK.TOC.initPushpin();
        BLANK.TOC.initForceActivateLastItem();
    };

    BLANK.TOC.initScrollSpy = function() {
        $(".scrollspy").scrollSpy({
            scrollOffset: 20
        });
    };

    BLANK.TOC.initPushpin = function() {
        $(".toc-wrapper").each(function() {
            var $this = $(this);
            var $target = $(".scrollspy").first();
            $this.width($this.parent().width());
            $this.pushpin({
                top: $target.parent().offset().top,
                bottom: $target.parent().offset().top + $target.parent().outerHeight() - $this.height(),
                offset: 32
            });
        });
    };

    BLANK.TOC.initForceActivateLastItem = function() {
        if (!$(".table-of-contents").length) {return;}

        BLANK.TOC.$body = $("body");
        window.onscroll = function() {
            if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
                BLANK.TOC.$body.addClass("at-bottom");
            } else {
                BLANK.TOC.$body.removeClass("at-bottom");
            }
        };
    };

    return BLANK;

}(BLANK || {}));
