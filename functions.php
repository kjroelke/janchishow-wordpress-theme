<?php
/**
 * Theme Functions
 * Should be pretty quiet in here besides requiring the appropriate files. Like style.css, this should really only be used for quick fixes with notes to refactor later.
 *
 * @since 1.0
 * @package JanchiShow
 */

/** Get the theme init class */
require_once get_template_directory() . '/inc/theme/class-tjs-theme-init.php';
$init_theme = new TJS_Theme_Init();