<?php
/**
 * Class: API
 * The class that handles the actual API calls
 *
 * @package JanchiShow
 * @subpackage Podcast_API
 * @since 1.0
 */

namespace JanchiShow\Podcast_API;

/** API Class
 * Handles getting the Transistor data from their endpoint/
 */
class API {
	/**
	 * The Janchi Show ID
	 *
	 * @var $show_id
	 */
	protected string $show_id = '13827';

	/**
	 * The Base Transistor API endpoint
	 *
	 * @var $base_url
	 */
	protected string $base_url = 'https://api.transistor.fm/v1';

	/** Error Logging
	 *
	 * @param string $error_message the error message
	 */
	protected function log_error( string $error_message ) {
		$error_message = date( '[Y-m-d H:i:s]' ) . ' ' . $error_message . "\n";
		error_log( $error_message, 3, WP_CONTENT_DIR . '/debug.log' );
	}

	/**
	 * Gets the data.
	 *
	 * @return array The Episodes Data
	 */
	protected function get_episode_data() {
		$transistor_endpoint = $this->base_url . '/episodes' . "?show_id={$this->show_id}";
		$response            = wp_remote_get( $transistor_endpoint, array( 'headers' => array( 'x-api-key' => TRANSISTOR_API ) ) );
		if ( isset( $response['response']['message'] ) && 'OK' !== $response['response']['message'] ) {
			$response = new WP_Error( 'transistor_api', $response['response']['message'], $response['headers']['data'] );
		}

		if ( is_wp_error( $response ) ) {
			echo $response->get_error_message();
		} else {
			$data = json_decode( wp_remote_retrieve_body( $response ), true );
			return $data;
		}
	}
}
