<?php
/**
 * The Post Preview Card
 *
 * @package JanchiShow
 * @since 1.0
 */

?>
<div class="gx-0 card">
	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail(
			'post-thumbnail',
			array(
				'class'   => 'card-img-top object-fit-cover img-fluid',
				'loading' => 'lazy',
				'style'   => 'aspect-ratio:16 / 9;object-position:center',
			)
		);
	}
	?>
	<div class="card-body d-flex flex-column">
		<?php the_title( '<h2 class="card-title mb-2">', '</h2>' ); ?>
		<a href="<?php the_permalink(); ?>" class="btn btn-primary mt-auto align-self-start">Read More</a>
	</div>
</div>