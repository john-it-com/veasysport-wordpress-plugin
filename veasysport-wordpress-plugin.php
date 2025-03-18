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
 * License:     https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: veasysport
 */

namespace JohnIt\VeasySport;

function veasy_shop($attr)
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

    return <<<HTML
<iframe
    id="veasySportShopIframe"
    src="{$url}"
    scrolling="no"
    sandbox="allow-same-origin allow-scripts allow-forms allow-popups allow-popups-to-escape-sandbox"
    style="border: none;"
></iframe>

<script type="module">
    import { initialize } from "https://cdn.jsdelivr.net/npm/@open-iframe-resizer/core@latest/dist/index.js";

    initialize({}, "#veasySportShopIframe");
</script>
HTML;

}

add_shortcode('veasysport_shop', __NAMESPACE__ . '\\veasy_shop');