<?php
/**
 * Basic Footer Template
 *
 * @since 1.0
 * @package JanchiShow
 */

?>

<footer class="footer text-bg-primary py-5 container-fluid gx-5 text-center d-flex flex-column align-items-stretch">
	<?php
	if ( has_nav_menu( 'footer_menu' ) ) {
		wp_nav_menu(
			array(
				'theme_location'  => 'footer_menu',
				'menu_class'      => 'navbar__menu p-0 m-0 d-inline-flex flex-wrap',
				'container'       => 'nav',
				'container_class' => 'footer-nav navbar mx-auto flex-wrap',
			)
		);
	}
	?>
	<div class="row justify-content-center">
		<div class="col-3">
			<a href="<?php echo esc_url( site_url() ); ?>" class="logo">
				<?php echo bloginfo( 'name' ); ?>
			</a>
			<p id="copyright">
				<?php echo '&copy;&nbsp;' . gmdate( 'Y' ); ?>
			</p>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>