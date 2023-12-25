<?php
/**
 * The Single Template for Episodes
 *
 * @package JanchiShow
 * @since 1.0
 */

$podcast_type = tjs_get_the_podcast_type( $post->ID );
$podcast_tags = tjs_get_the_podcast_tags( $post->ID );


get_header();
?>
<header class="bg-body-tertiary py-5 mb-5">
	<div class="container">
		<div class="row align-items-stretch">
			<div class="col-12 col-md-6 col-lg-8">
				<?php the_title( '<h1>', '</h1>' ); ?>
				<div class="post-meta">
					<p>Released <?php the_date( 'F j, Y' ); ?></p>
					<?php
					if ( $podcast_type ) {
						echo "<p>Podcast Type: <a href='/podcast-type/{$podcast_type->slug}'>{$podcast_type->name}</a></p>";
					}
					if ( $podcast_tags ) {
						echo '<p>Topics in this episode: ' . join( ', ', array_map( 'tjs_podcast_tag_cb', $podcast_tags ) ) . '</p>';
					}
					get_template_part( 'template-parts/nav', 'breadcrumb' );
					?>
				</div>
			</div>
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="d-none d-md-block col-md-6 col-lg-4 ">
				<?php
				the_post_thumbnail(
					'episode_thumbnail',
					array(
						'class'   => 'object-fit-contain ratio ratio-1x1',
						'loading' => 'lazy',
						'width'   => '400',
						'height'  => '400',
						'alt'     => 'Episode artwork for ' . get_the_title(),
					)
				);
				?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</header>
<article class="container my-5">
	<div class="row justify-content-center">
		<div class="col-8 fs-5">
			<?php the_content(); ?>
		</div>
	</div>
</article>
<?php
get_footer();