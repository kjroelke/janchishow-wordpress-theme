<?php
/**
 * The Episode Preview Card
 *
 * @package JanchiShow
 * @since 1.0
 */

$podcast_type = tjs_get_the_podcast_type( $post->ID );
$podcast_tags = tjs_get_the_podcast_tags( $post->ID );
?>
<div class="col-auto gx-0 card">
	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'episode_thumbnail', array( 'class' => 'card-img-top object-fit-cover img-fluid' ) );
	}
	?>
	<div class="card-body d-flex flex-column">
		<?php the_title( '<h2 class="card-title">', '</h2>' ); ?>
		<div class="card-text mb-2">
			<?php
			if ( $podcast_type ) {
				echo "<p>Podcast Type: <a href='/podcast-type/{$podcast_type->slug}'>{$podcast_type->name}</a></p>";
			}
			if ( $podcast_tags ) {
				echo '<p>Topics in this episode: ' . join( ', ', array_map( 'tjs_podcast_tag_cb', $podcast_tags ) ) . '</p>';
			}
			?>
		</div>
		<a href="<?php the_permalink(); ?>" class="btn btn-primary mt-auto align-self-start">Listen Now</a>
	</div>
</div>