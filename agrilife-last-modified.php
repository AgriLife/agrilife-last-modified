<?php
/**
 * Last Modified Meta Tag
 *
 * @package      agrilife-last-modified
 * @author       Zachary Watkins
 * @copyright    2019 Texas A&M AgriLife Communications
 * @license      GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:  AgriLife Last Modified Meta Tag
 * Plugin URI:   https://github.com/AgriLife/agrilife-last-modified
 * Description:  A plugin for adding a last-modified meta tag to the page header.
 * Version:      1.0.0
 * Author:       Zachary Watkins
 * Author URI:   https://github.com/ZachWatkins
 * Author Email: zachary.watkins@ag.tamu.edu
 * Text Domain:  af4-masternaturalist
 * License:      GPL-2.0+
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
 */

add_action( 'wp_head', function(){

	global $post;

	if ( ! empty( $post ) ) {

		$meta = sprintf(
			'<meta name="last-modified" content="%s" />',
			str_replace( ' ', 'T', $post->post_modified )
		);

		$output = wp_kses(
			$meta,
			array(
				'meta' => array(
					'name'    => true,
					'content' => true,
				)
			)
		);

		echo $output;

	}

});
