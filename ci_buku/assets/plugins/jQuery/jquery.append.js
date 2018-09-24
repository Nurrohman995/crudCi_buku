/**
 * Adds event triggering whenever an append takes place.
 *
 * - Parent is given an "append" trigger with the child as an arguement
 * - Child is given an "appended" trigger with the parent as an argument
 *
 * @author Jessey White-Cinis <jcinis@gmail.com>
 */
(function($) {
    var jqueryAppend = $.fn.append;
    $.fn.append = function () {

        // trigger append event
        var rtn = jqueryAppend.apply(this, arguments).trigger("append", arguments);

        // trigger appended event
        $(arguments).trigger("appended", this);

        return rtn;
    };
})(jQuery);