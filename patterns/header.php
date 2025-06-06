<?php

/**
 * Block Pattern: Header Default
 * may 30 morning 8:23
 */

// Obter o URI do diretório do tema para construir os caminhos das imagens
$theme_assets_uri = get_template_directory_uri() . '/assets/images/';

// Defina os caminhos para as suas imagens
$icon_location_url = esc_url($theme_assets_uri . "icon-location.png");
$icon_envelope_url = esc_url($theme_assets_uri . "icon-envelope.png");
$icon_phone_url    = esc_url($theme_assets_uri . "icon-phone.png");
$icon_clock_url    = esc_url($theme_assets_uri . "icon-clock.png");
$logo_claro_url    = esc_url($theme_assets_uri . 'logo.png');
$transparent_pixel_url = esc_url($theme_assets_uri . "transparent_pixel.png");

echo <<<HTML
<!-- wp:group {"metadata":{"categories":[],"patternName":"core/block/145","name":"Header Default"},"className":"bill-section-086","style":{"spacing":{"blockGap":"0px","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-group bill-section-086" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"align":"full","className":"car-top-bar bill-section-084","style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"0px","margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull car-top-bar bill-section-084 has-white-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;padding-right:0;padding-left:0"><!-- wp:group {"align":"full","className":"bill-section-082","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group alignfull bill-section-082" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--10);padding-bottom:0;padding-left:var(--wp--preset--spacing--10)"><!-- wp:group {"className":"bill-section-079","style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group bill-section-079"><!-- wp:group {"className":"bill-section-069","style":{"spacing":{"blockGap":"5px","padding":{"right":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group bill-section-069" style="padding-right:var(--wp--preset--spacing--40)"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"vertical-aligmiddle bill-section-067","style":{"color":[]}} -->
<figure class="wp-block-image size-large vertical-aligmiddle bill-section-067"><img src="{$icon_location_url}" alt="Location"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"bill-section-068","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} -->
<p class="bill-section-068 has-small-font-size" style="font-style:normal;font-weight:400">Miami, Florida</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"bill-section-072","style":{"spacing":{"blockGap":"10px","padding":{"right":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group bill-section-072" style="padding-right:var(--wp--preset--spacing--40)"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"vertical-aligmiddle bill-section-070","style":{"color":[]}} -->
<figure class="wp-block-image size-large vertical-aligmiddle bill-section-070"><img src="{$icon_envelope_url}" alt="envelope"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"bill-section-071","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} -->
<p class="bill-section-071 has-small-font-size" style="font-style:normal;font-weight:400">info@site.com</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"bill-section-075","style":{"spacing":{"blockGap":"10px","padding":{"right":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group bill-section-075" style="padding-right:var(--wp--preset--spacing--40)"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"vertical-aligmiddle bill-section-073","style":{"color":[]}} -->
<figure class="wp-block-image size-large vertical-aligmiddle bill-section-073"><img src="{$icon_phone_url}" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"bill-section-074","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} -->
<p class="bill-section-074 has-small-font-size" style="font-style:normal;font-weight:400">987-065-40321</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"bill-section-078","style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group bill-section-078"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"vertical-aligmiddle bill-section-076","style":{"color":[]}} -->
<figure class="wp-block-image size-large vertical-aligmiddle bill-section-076"><img src="{$icon_clock_url}" alt="clock"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"bill-section-077","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} -->
<p class="bill-section-077 has-small-font-size" style="font-style:normal;font-weight:400">10 AM - 5 PM,</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"mobile-aligncenter bill-section-081","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-group mobile-aligncenter bill-section-081" style="padding-top:0;padding-bottom:0"><!-- wp:social-links {"iconColor":"background","iconColorValue":"#fff","size":"has-small-icon-size","className":"is-style-logos-only bill-section-080","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":{"top":"20px","left":"20px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only bill-section-080" style="margin-top:0px;margin-bottom:0px"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"bill-section-085","style":{"spacing":{"padding":{"top":"0px","right":"0vw","left":"0vw","bottom":"0px"},"margin":{"top":"1px","bottom":"1px"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull bill-section-085 has-background-background-color has-background" style="margin-top:1px;margin-bottom:1px;padding-top:0px;padding-right:0vw;padding-bottom:0px;padding-left:0vw"><!-- wp:columns {"isStackedOnMobile":false,"className":"bill-section-062","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile bill-section-062">

    <!-- wp:column {"width":"30%","className":"car-container-logo bill-section-001","style":{"spacing":{"padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10"},"blockGap":"0"}}} -->
    <div class="wp-block-column car-container-logo bill-section-001" style="padding-right:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10);flex-basis:30%"><!-- wp:image {"id":2859,"width":"319px","height":"auto","sizeSlug":"full","linkDestination":"none","style":{"spacing":{"margin":{"right":"0","left":"0"}}}} -->
    <figure class="wp-block-image size-full is-resized" style="margin-right:0;margin-left:0"><img src="{$logo_claro_url}" alt="Logo" class="wp-image-2859" style="width:319px;height:auto"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"10%","className":"car-column-shape-effect","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
    <div class="wp-block-column car-column-shape-effect" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:10%"><!-- wp:image {"width":"10px","sizeSlug":"large","linkDestination":"none","style":{"spacing":{"margin":{"right":"0","left":"0"}}}} -->
    <figure class="wp-block-image size-large is-resized" style="margin-right:0;margin-left:0"><img src="{$transparent_pixel_url}" alt="spacer" style="width:10px;"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:column -->
   
    <!-- wp:column {"width":"60%","className":"car-container-menu bill-section-002","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"0"}},"fontSize":"x-large","layout":{"type":"default"}} -->
    <div class="wp-block-column car-container-menu bill-section-002 has-x-large-font-size" style="padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);flex-basis:60%"><!-- wp:navigation {"ref":2834,"fontSize":"medium"} /--></div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"9px","className":"bill-section-083"} -->
<div style="height:9px" aria-hidden="true" class="wp-block-spacer bill-section-083"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
HTML;
