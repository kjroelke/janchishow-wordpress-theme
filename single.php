<?php
/**
 * The Single Template
 *
 * @package JanchiShow
 * @since 1.0
 */

get_header();
?>

<article class="container my-5">
	<div class="row justify-content-center">
		<div class="col-8">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail(
					'full',
					array(
						'class'   => 'object-fit-contain ratio ratio-1x1 h-auto',
						'loading' => 'lazy',
						'height'  => 'auto',
					)
				);
			}
			?>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-8 fs-5">
			<?php the_title( '<h1 class="mt-5">', '</h1>' ); ?>
			<div class="post-meta p-3 my-3 bg-body-secondary">
				<p>Published <?php the_date( 'F j, Y' ); ?> by <?php the_author(); ?></p>
				<?php get_template_part( 'template-parts/nav', 'breadcrumb' ); ?>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
</article>
<?php
get_footer();