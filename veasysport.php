<?php
/**
 * Plugin main file.
 *
 * @copyright 2025 JOHN IT GmbH
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
 * License:     GPL
 * Text Domain: veasysport
 */

namespace JohnIt\VeasySport\Wordpress;

function veasysport_shop($attr)
{
    $options = shortcode_atts(array(
        'shop_url' => null,
        'tags' => null
    ), $attr);

    if($options['shop_url'] === null) {
        return "Bitte geben Sie den Parameter 'shop_url' an.";
    }

    $url = $options['shop_url'];
    $tags = $options['tags'];

    if($tags !== null) {
        $url = $url . "?" . http_build_query([
            'tags' => $tags
        ]);
    }

    return "
<iframe
    id='veasySportShopIframe'
    src='{$url}'
    scrolling='no'
    sandbox='allow-same-origin allow-scripts allow-forms allow-popups allow-popups-to-escape-sandbox'
    style='border: none;'
></iframe>

<script type='module'>
    import { initialize } from '" . plugin_dir_url(__FILE__) . "assets/js/open-iframe-resizer.js';

    initialize({}, '#veasySportShopIframe');
</script>
";

}

function veasysport_enqueue_scripts()
{
    wp_enqueue_script(
        'veasysport-iframe-resizer',
        plugin_dir_url(__FILE__) . 'assets/js/open-iframe-resizer.js',
        array(),
        '1.0.0',
        true
    );
}

add_shortcode('veasysport_shop', __NAMESPACE__ . '\\veasysport_shop');

add_action('wp_enqueue_scripts', __NAMESPACE__.'\\veasysport_enqueue_scripts');
