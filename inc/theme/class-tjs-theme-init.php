<?php
/**
 * Initializes the Theme
 *
 * @package JanchiShow
 * @since 1.0
 */

/** Builds the Theme */
class TJS_Theme_Init {
	/** Constructor */
	public function __construct() {
		$this->load_required_files();
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_cno_scripts' ) );
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_action( 'init', array( $this, 'alter_post_types' ) );
	}

	/** Load required files. */
	private function load_required_files() {
		$this->load_acf_classes(
			array(
				'generator',
				'image',
				'hero',
			)
		);
		$this->load_api_classes();

		require_once __DIR__ . '/asset-loader/enum-enqueue-type.php';
		require_once __DIR__ . '/asset-loader/class-asset-loader.php';
		require_once __DIR__ . '/navwalkers/class-cno-navwalker.php';
		require_once __DIR__ . '/navwalkers/class-cno-mega-menu.php';
		require_once __DIR__ . '/theme-functions.php';
	}

	/** Loads the files for the Transistor API */
	private function load_api_classes() {
		// require_once dirname( __DIR__, 1 ) . '/acf/acf-fields/initial-acf-fields.php';
		$path        = dirname( __DIR__, 1 ) . '/podcast-api';
		$api_classes = array( 'api', 'episode-attributes', 'podcast-api' );

		foreach ( $api_classes as $api_class ) {
			require_once "{$path}/class-{$api_class}.php";
		}
	}

	/** Takes an array of file names to load
	 *
	 * @param string[] $classes the classes to load
	 */
	private function load_acf_classes( array $classes ) {
		$path = dirname( __DIR__, 1 ) . '/acf';
		foreach ( $classes as $class_file ) {
			require_once $path . '/acf-classes/class-' . $class_file . '.php';
		}
	}

	/**
	 * Adds scripts with the appropriate dependencies
	 */
	public function enqueue_cno_scripts() {
		$fonts       = new Asset_Loader( 'fonts', Enqueue_Type::style, 'vendors' );
		$bootstrap   = new Asset_Loader( 'bootstrap', Enqueue_Type::both, 'vendors' );
		$fontawesome = new Asset_Loader( 'fontawesome', Enqueue_Type::script, 'vendors' );

		$global_scripts = new Asset_Loader( 'global', Enqueue_Type::both, null, array( 'bootstrap' ) );
		wp_localize_script( 'global', 'tjsSiteData', array( 'rootUrl' => home_url() ) );

		$search = require_once get_template_directory() . '/dist/search.asset.php';
		wp_register_script( 'search', get_template_directory_uri() . '/dist/search.js', array_merge( array( 'global' ), $search['dependencies'] ), $search['version'], array( 'strategy' => 'defer' ) );

		// style.css
		wp_enqueue_style(
			'main',
			get_stylesheet_uri(),
			array( 'global' ),
			null, // phpcs:ignore
		);
	}

	/** Registers Theme Supports */
	public function theme_supports() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );

		add_image_size( 'episode_thumbnail', '600', '600' );

		register_nav_menus(
			array(
				'primary_menu' => __( 'Primary Menu', 'tjs' ),
				'mobile_menu'  => __( 'Mobile Menu', 'tjs' ),
				'footer_menu'  => __( 'Footer Menu', 'tjs' ),
			)
		);
	}

	/** Remove post type support from posts types. */
	public function alter_post_types() {
		$post_types = array( 'post', 'page' );
		foreach ( $post_types as $post_type ) {
			$this->disable_post_type_support( $post_type );
		}
	}

	/** Disable post-type-supports from posts
	 *
	 * @param string $post_type the post type to remove supports from.
	 */
	private function disable_post_type_support( string $post_type ) {
		$supports = array( 'comments', 'revisions' );
		foreach ( $supports as $support ) {
			if ( post_type_supports( $post_type, $support ) ) {
				remove_post_type_support( $post_type, $support );
			}
		}
	}
}