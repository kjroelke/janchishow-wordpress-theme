<?php
/**
 * Basic Header Template
 *
 * @package JanchiShow
 */

get_template_part( 'template-parts/header/meta', 'header' );
?>
<header class="d-flex bg-body-tertiary" id="site-header">
	<div class="navbar container py-4 d-flex justify-content-between">
		<a class="d-inline-block h1" href="<?php echo esc_url( site_url() ); ?>" class="logo" aria-label="to Home Page">
			<?php echo bloginfo( 'name' ); ?>
		</a>
		<?php
		if ( has_nav_menu( 'primary_menu' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'primary_menu',
					'menu_class'      => 'navbar__menu p-0 m-0 d-inline-flex',
					'container'       => 'nav',
					'container_class' => 'navbar d-none d-lg-flex align-items-center',
					'walker'          => new CNO_Navwalker(),
				)
			);
		}
		?>
	</div>
</header>