<?php
/**
 * The Archive Page for Podcast Episodes
 * Has a non-js fallback
 *
 * @package JanchiShow
 * @since 1.0
 */

get_header();
?>
<?php if ( ! have_posts() ) : ?>
<div class="container">
	<?php echo "<p>No {$post->post_type}s found!</p>"; ?>
</div>
<?php else : ?>
<div id="app"></div>
<noscript>
	<header style="background-color: var(--color-blue);" class="text-white">
		<div class="container pt-5">
			<div class="row text-center">
				<?php the_archive_title( '<h1>', '</h1>' ); ?>
			</div>
			<aside class="row text-center">
				<p>Search for an episode</p>
				<?php get_search_form( array( 'echo' => true ) ); ?>
			</aside>
		</div>
	</header>
	<div class="row row-cols-lg-4 row-cols-1 justify-content-center gap-3 my-5">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', 'episode-preview' );
		}
		?>
	</div>
	<div class="row my-5">
		<div class="col text-center p-4">
			<?php bootscore_pagination(); ?>
		</div>
	</div>
</noscript>
<?php endif; ?>
<?php get_footer(); ?>