<?php
/**
 * The primary archive page
 *
 * @package JanchiShow
 * @since 1.0
 */

get_header();
?>

<div class="container">
	<?php if ( ! have_posts() ) : ?>
	<?php echo "<p>No {$post->post_type}s found!</p>"; ?>
	<?php else : ?>
	<div class="row text-center my-5">
		<?php the_archive_title( '<h1>', '</h1>' ); ?>
	</div>
	<div class="row row-cols-lg-4 row-cols-1 justify-content-center gap-3 my-5">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', 'post-preview' );
		}
		?>
	</div>
	<div class="row my-5">
		<div class="col text-center p-4">
			<?php bootscore_pagination(); ?>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>