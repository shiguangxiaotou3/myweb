/*!
 * @package   yii2-bootstrap5-dropdown
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2015 - 2021
 * @version   1.0.0
 *
 * Bootstrap 4 Dropdown Nested Submenu Script
 * 
 * For more JQuery plugins visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 **/
(function ($) {
    "use strict"
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        var $el = $(this), $parent = $el.offsetParent(".dropdown-menu"), $subMenu, $subMenuParent;

        $el.parents('.dropdown-menu').first().find('.dropdown-toggle.show').each(function(){
           if (!$(this).is($el)) {
               $(this).removeClass('show');
           }
        });

        $subMenu = $el.next('.dropdown-menu');
        $subMenuParent = $subMenu.closest('.dropdown');
        $subMenuParent.closest('.dropdown-menu').find('.dropdown').each(function () {
            var $el = $(this);
            if (!$el.is($subMenuParent)) {
                $el.removeClass('is-expanded show');
                $el.find('.dropdown-menu').removeClass('is-expanded show');
            }
        });
        $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
        return false;
    });
})(window.jQuery);