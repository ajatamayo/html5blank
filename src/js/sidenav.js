var BLANK = (function(BLANK) {

    BLANK.SIDENAV = BLANK.SIDENAV || {};

    BLANK.SIDENAV.init = function() {
        BLANK.SIDENAV.initSideNav();
        BLANK.SIDENAV.setScrollPosition();
    };

    BLANK.SIDENAV.initSideNav = function() {
        $(".sidenav").sidenav();
        $(".collapsible").collapsible();
        $("#slide-out .toggle-button").on("click", BLANK.SIDENAV.toggleAccordion);
    };

    BLANK.SIDENAV.toggleAccordion = function(e) {
        var $this = $(this),
            $collapsible = $this.closest(".menu-item-has-children").next().find(".collapsible").first(),
            isActive = $collapsible.children("li").hasClass("active");

        e.preventDefault();

        if (isActive) {
            $collapsible.collapsible("close");
            $this.removeClass("open");
        } else {
            $collapsible.collapsible("open");
            $this.addClass("open");
        }
    };

    BLANK.SIDENAV.setScrollPosition = function() {
        var $activeMenuItem = $(".sidenav .active").last();
        if (!$activeMenuItem.length) {
            $(".sidenav").removeClass("hidden");
            return;
        }
        $("#slide-out").scrollTop($activeMenuItem.offset().top - $activeMenuItem.height());
        $(".sidenav").removeClass("hidden");
    };

    return BLANK;

}(BLANK || {}));
