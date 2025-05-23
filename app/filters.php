<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'lab'));
});


// contact form 7 autop remove
add_filter('wpcf7_autop_or_not', function ($autop) {
    return false;
}, 10, 1);
