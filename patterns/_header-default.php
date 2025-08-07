<?php

/**
 * Title: Default Header
 * Slug: car-dealer-show/header-default
 * Categories: car-dealer-show/page
 * Block Types: core/template-part/header
 * Keywords: header, top bar, navigation
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

?>

<!-- wp:group {"tagName":"header","align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<header class="wp-block-group alignfull"><!-- wp:group {"align":"full","className":"car-top-bar","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center"}} -->
    <div class="wp-block-group alignfull car-top-bar"><!-- wp:paragraph {"placeholder":"seu-email@dominio.com","textColor":"base"} -->




        <!-- wp:group {"className":"top-bar-contact-info", "layout":{"type":"flex"}} -->
        <div class="wp-block-group top-bar-contact-info">

            <!-- wp:html -->
            <!-- Item de Contato: Localização -->
            <div class="contact-item">
                <img src="<?php echo $icon_location_url; ?>" alt="Location" />
                <p class="has-base-color has-text-color">Miami, Florida</p>
            </div>

            <!-- Item de Contato: Email -->
            <div class="contact-item">
                <img src="<?php echo $icon_envelope_url; ?>" alt="Email" />
                <p class="has-base-color has-text-color">info@site.com</p>
            </div>

            <!-- Item de Contato: Telefone -->
            <div class="contact-item">
                <img src="<?php echo $icon_phone_url; ?>" alt="Phone" />
                <p class="has-base-color has-text-color">987-065-40321</p>
            </div>

            <!-- Item de Contato: Horário -->
            <div class="contact-item">
                <img src="<?php echo $icon_clock_url; ?>" alt="Hours" />
                <p class="has-base-color has-text-color">10 AM – 5 PM</p>
            </div>
            <!-- /wp:html -->

        </div>
        <!-- /wp:group -->






        <!-- /wp:paragraph -->

        <!-- wp:social-links {"iconColor":"base","iconColorValue":"#FFFFFF","size":"has-small-icon-size","className":"is-style-logos-only"} -->
        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

            <!-- wp:social-link {"url":"#","service":"twitter"} /-->

            <!-- wp:social-link {"url":"#","service":"youtube"} /-->

            <!-- wp:social-link {"url":"#","service":"instagram"} /-->
        </ul>
        <!-- /wp:social-links -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full"} -->
    <div class="wp-block-group alignfull"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"width":"30%"} -->
            <div class="wp-block-column" style="flex-basis:30%"><!-- wp:group {"className":"car-container-logo","layout":{"type":"constrained"}} -->
                <div class="wp-block-group car-container-logo"><!-- wp:site-logo {"width":200,"shouldSyncIcon":true} /--></div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"70%"} -->
            <div class="wp-block-column" style="flex-basis:70%"><!-- wp:group {"className":"car-container-menu","layout":{"type":"constrained"}} -->
                <div class="wp-block-group car-container-menu"><!-- wp:navigation {"ref":2602,"textColor":"base","layout":{"type":"flex","justifyContent":"right"}} /--></div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</header>
<!-- /wp:group -->