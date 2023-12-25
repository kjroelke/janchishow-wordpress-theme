<?php
/**
 * Template Name: Blank, Container
 *
 * @package JanchiShow
 * @since 1.0
 */

get_header();
?>
<main class="site-content <?php echo $post->post_name; ?>">
	<article class="container my-5">
		<div class="row justify-content-center">
			<div class="col-10">
				<?php the_title( '<h1>', '</h1>' ); ?>
			</div>
		</div>
		<div class="row justify-content-center my-5">
			<div class="col-10">
				<?php the_content(); ?>
			</div>
		</div>
	</article>
</main>
<?php
get_footer();