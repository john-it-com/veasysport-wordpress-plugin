<?php
/**
 * Plugin main file.
 *
 * @copyright 2024 JOHN IT GmbH
 * @license   https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link      https://veasysport.com
 *
 * @wordpress-plugin
 * Plugin Name: VeasySport
 * Plugin URI:  https://veasysport.com
 * Description: Binden Sie den VeasySport Shop einfach in Ihre eigene Webseite ein.
 * Version:     1.0.0
 * Author:      JOHN IT GmbH
 * Author URI:  https://john-it.com
 * License:     https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: veasysport
 */

namespace JohnIt\VeasySport;

wp_oembed_add_provider( 'https://djjv.veasysport.cloud/*', 'https://djjv.veasysport.cloud/oembed' );
wp_oembed_add_provider( 'https://dbb.veasysport.cloud/*', 'https://dbb.veasysport.cloud/oembed' );
wp_oembed_add_provider( 'https://dsb.veasysport.cloud/*', 'https://dsb.veasysport.cloud/oembed' );
wp_oembed_add_provider( 'https://dsv.veasysport.cloud/*', 'https://dsv.veasysport.cloud/oembed' );