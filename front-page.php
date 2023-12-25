<?php
/**
 * Homepage Template
 *
 * @since 1.0
 * @package JanchiShow
 */

use JanchiShow\ACF\Image;
$loader = new Asset_Loader( 'frontPage', Enqueue_Type::both, 'pages' );

get_header();
?>
<main class="site-content">
	<section id="hero" style="background-image:url(/wp-content/uploads/2020/11/GradientBlue-scaled.jpg);" class="text-white">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1><?php echo bloginfo( 'title' ); ?></h1>
					<span class="subheadline">
						<?php echo get_field( 'section_1' )['headline']; ?>
					</span>
					<p><?php echo get_field( 'section_1' )['subheadline']; ?></p>
					<a href="#" class="btn btn-primary">Listen Now</a>
				</div>
				<div class="col-lg-6">
					<a href="https://www.listennotes.com/podcasts/the-janchi-show-just-like-media-5uFQZDV4iow/" title="The Janchi Show | Listen Notes">
						<img decoding="async" loading="lazy" src="https://cdn-images-2.listennotes.com/images/podcasts/5uFQZDV4iow/badge/" alt="The Janchi Show | Listen Notes"
							 style="width: 100%;">
					</a>
				</div>
			</div>
		</div>
	</section>
	<section id="latest-episodes">
		<div class="container">
			<div class="row justify-content-center text-center">
				<h2>Catch the Latest Content</h2>
				<span class="subheadline">And subscribe on Apple, Youtube, and wherever great podcasts are found!</span>
			</div>
			<?php
				$recent_episodes = new WP_Query(
					array(
						'post_type'      => 'episodes',
						'posts_per_page' => 3,
						array( 'after' => '3 months ago' ),
					)
				);
				?>
			<?php if ( $recent_episodes->have_posts() ) : ?>
			<ul class="row row-cols-1 row-cols-lg-4 gap-2 list-unstyled mt-5 justify-content-evenly">
				<div class="swiper" id="recent-episodes-swiper">
					<div class="swiper-wrapper">
						<?php while ( $recent_episodes->have_posts() ) : ?>
						<?php $recent_episodes->the_post(); ?>
						<li class="swiper-slide col p-0 card text-white" style='background-color: var(--color-blue);background-image:var(--gradient-dark);'>
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail(
									'post-thumbnail',
									array(
										'loading' => 'lazy',
										'class'   => 'object-fit-contain ratio ratio-1x1 mb-2 card-img-top',
									)
								);
							}
							?>
							<div class="card-body d-flex flex-column">
								<?php
								the_title( '<h3 class="card-title">', '</h3>' );
								echo "<div class='card-text mb-2'>" . get_the_excerpt() . '</div>';
								?>
							</div>
							<?php echo "<a href='" . get_the_permalink() . "' class='btn btn-white mt-auto align-self-start px-2'>Listen Now</a>"; ?>
						</li>
						<?php endwhile; ?>
					</div>
					<div class="swiper-pagination swiper-recent-episodes-pagination"></div>
					<div class="swiper-button-next swiper-recent-episodes-button-next"></div>
					<div class="swiper-button-prev swiper-recent-episodes-button-prev"></div>
				</div>

			</ul>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>
	<section id="meet-the-hosts" style="background-image: url(/wp-content/uploads/2020/11/GradientRed-scaled.jpg);" class="text-white">
		<div class="container">
			<div class="row">
				<h2 class="text-center text-white text-uppercase">Meet Your Hosts</h2>
			</div>
			<div class="row row-cols-lg-3 row-cols-1">
				<?php
				$host_info = get_field( 'host_info' );
				$hosts     = array(
					array(
						'name'  => 'Nathan Nowack',
						'image' => new Image( $host_info['nathan_image'] ),
					),
					array(
						'name'  => 'Patrick Armstrong',
						'image' => new Image( $host_info['patrick_image'] ),
					),
					array(
						'name'  => 'K.J. Roelke',
						'image' => new Image( $host_info['kj_image'] ),
					),
				);
				?>
				<?php foreach ( $hosts as $host ) : ?>
				<div class="col-auto my-3 d-flex flex-column justify-content-center align-items-center">
					<?php $host['image']->the_image( 'host-image object-fit-cover' ); ?>
					<h3><?php echo $host['name']; ?></h3>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<section id="faq" class="text-bg-secondary">
		<?php $faqs = get_field( 'faq' ); ?>
		<div class="container">
			<div class="row text-center justify-content-center">
				<h2><?php echo $faqs['headline']; ?></h2>
				<span class="subheadline"><?php echo $faqs['subheadline']; ?></span>
			</div>
			<div class="row row-cols-lg-4 gap-1 justify-content-around mt-5">
				<div class="swiper" id="faq-swiper">
					<div class="swiper-wrapper">
						<?php for ( $i = 0; $i < 3; $i++ ) : ?>
						<?php
							$faq_index = 'faq_' . ( $i + 1 );
							$faq       = $faqs[ $faq_index ];
							?>
						<div class="swiper-slide col-auto card bg-white border rounded-4 p-3">
							<h3><?php echo $faq['question']; ?></h3>
							<p><?php echo $faq['answer']; ?></p>
						</div>
						<?php endfor; ?>
					</div>
					<div class="swiper-pagination swiper-faq-pagination"></div>
					<div class="swiper-button-prev swiper-button-faq-prev"></div>
					<div class="swiper-button-next swiper-button-faq-next"></div>
				</div>

			</div>
		</div>
	</section>
</main>
<?php
get_footer();