var BLANK = (function(BLANK) {

    BLANK.CARDS = BLANK.CARDS || {};

    BLANK.CARDS.init = function() {
        BLANK.CARDS.initMatchHeight();
    };

    BLANK.CARDS.initMatchHeight = function() {
        $(".match-height").matchHeight({
            byRow: true,
            property: "height",
            target: null,
            remove: false
        });
    };

    return BLANK;

}(BLANK || {}));
