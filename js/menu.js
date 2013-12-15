/**
 * Created with JetBrains PhpStorm.
 * User: UAnnipu
 * Date: 12/14/13
 * Time: 12:22 PM
 * To change this template use File | Settings | File Templates.
 */

$('div#nav > ul > li').hover(function() {
    //effect when the user hovers over the menu
    //first hide the menu item, since the CSS displays it - then slide it down.
    $(this).children('ul').hide().slideDown();
}, function() {
    //effect when the user leaves the current menu area - fade out
    $(this).children('ul').fadeOut();
});