<?php
/**
 * Standard Page Output with default Hero section
 *
 * @package JanchiShow
 */

get_header();
echo "<main class='site-content {$post->post_name}'>";
// get_template_part( 'template-parts/section', 'hero', array( 'id' => $post->ID ) );
echo '<article class="container">';
the_content();
echo '</article>';
echo '</main>';
get_footer();
