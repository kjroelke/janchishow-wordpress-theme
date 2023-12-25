<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Bootscore
 */

get_header();
?>
<div id="content" class="site-content py-5">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<header class="p-5 mb-5" style="background-color: var(--color-blue);color:white;">
				<div class="container">
					<div class="row">
						<h1>
							<?php
								printf( esc_html__( 'Search Results for: %s', 'bootscore' ), '<span class="text-secondary">' . get_search_query() . '</span>' );
							?>
						</h1>
					</div>
					<div class="row">
						<?php get_search_form( array( 'echo' => true ) ); ?>
					</div>
				</div>
			</header>
			<?php if ( ! have_posts() ) : ?>
			<div class="container">
				<p>Sorry, we couldn't find anything.</p>
			</div>
			<?php else : ?>
			<section class="container">
				<div class="row row-cols-4 gap-3 justify-content-evenly">
					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content', 'search-post-preview' );
					}
					bootscore_pagination();
					?>
					<?php endif; ?>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
