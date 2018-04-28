var BLANK = (function(BLANK) {

    BLANK.SIDENAV = BLANK.SIDENAV || {};

    BLANK.SIDENAV.init = function() {
        BLANK.SIDENAV.initSideNav();
    };

    BLANK.SIDENAV.initSideNav = function() {
        $(".sidenav").sidenav();
        $(".collapsible").collapsible();
        $("#slide-out .menu-item-has-children").on("click", BLANK.SIDENAV.toggleAccordion);
    };

    BLANK.SIDENAV.toggleAccordion = function(e) {
        var $collapsible = $(this).next().find(".collapsible"),
            isActive = $collapsible.children("li").hasClass("active");

        e.preventDefault();

        if (isActive) {
            $collapsible.collapsible("close");
        } else {
            $collapsible.collapsible("open");
        }
    };

    return BLANK;

}(BLANK || {}));
