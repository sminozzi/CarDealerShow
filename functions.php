<?php

/**
 * Car-Dealer-Show functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Car-Dealer-Show
 * @since Car-Dealer-Show 1.0
 */
/**
 * Register block styles.
 */



define('CAR-DEALER-SHOWURL', get_template_directory_uri());
//define('CAR-DEALER-SHOWURL', esc_url(get_site_url()));


/**
 * Registrar a categoria de pattern 'Services'
 */
function car_dealer_show_register_pattern_categories()
{

  // Registrar categoria 'FAQ'
  register_block_pattern_category(
    'faq',
    array(
      'label' => esc_html__('FAQ', 'car-dealer-show')
    )
  );

  // Registrar categoria 'Services'
  register_block_pattern_category(
    'services',
    array(
      'label' => esc_html__('Services', 'car-dealer-show')
    )
  );

  register_block_pattern_category(
    'car_dealer_show_page',
    array(
      'label'       => esc_html__('Pages', 'car-dealer-show'),
      'description' => esc_html__('A collection of full page layouts.', 'car-dealer-show'),
    )
  );
}
add_action('init', 'car_dealer_show_register_pattern_categories');



/**
 * Helper function to get pattern content by including the PHP file.
 * This allows PHP within the pattern file to be executed.
 *
 * @param string $pattern_file_path The full path to the pattern PHP file.
 * @return string The pattern content.
 */
if (!function_exists('car_dealer_show_get_pattern_content_from_file')) {
  function car_dealer_show_get_pattern_content_from_file($pattern_file_path)
  {
    if (!file_exists($pattern_file_path)) {
      if (defined('WP_DEBUG') && WP_DEBUG) {
        // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error
        trigger_error(esc_html__('Pattern file not found: ', 'car-dealer-show') . esc_html($pattern_file_path), E_USER_WARNING);
      }
      return '';
    }

    ob_start();
    include $pattern_file_path; // Inclui e EXECUTA o arquivo PHP
    return ob_get_clean(); // Pega o conteúdo do buffer e o limpa
  }
}



function car_dealer_show_register_my_header()
{
  //$theme_directory = get_template_directory_uri();

  register_block_pattern(
    'car-dealer-show/header', // Seu namespace/nome-do-padrão
    array(
      'title'       => __('Header', 'car-dealer-show'),
      'description' => __('A header pattern with logo, contact info, social links, and navigation', 'car-dealer-show'),
      'categories'  => array('header'), // Certifique-se que a categoria 'header' está registrada ou use uma existente
      'keywords'    => array('header', 'top bar', 'navigation', 'logo'), // Opcional
      'content'     => car_dealer_show_get_pattern_content_from_file(get_theme_file_path('/patterns/header.php')),
    )
  );
}
add_action('init', 'car_dealer_show_register_my_header');




if (!function_exists('car_dealer_show_block_styles')) :
  /**
   * Register custom block styles
   *
   * @since Car-Dealer-Show 1.0
   * @return void
   */
  function car_dealer_show_block_styles()
  {
    register_block_style(
      'core/details',
      array(
        'name'         => 'arrow-icon-details',
        'label'        => esc_attr__('Arrow icon', 'car-dealer-show'),
        /*
				 * Styles for the custom Arrow icon style of the Details block
				 */
        'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}
				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}
				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
      )
    );
    register_block_style(
      'core/post-terms',
      array(
        'name'         => 'pill',
        'label'        => esc_attr__('Pill', 'car-dealer-show'),
        /*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
        'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}
				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
      )
    );
    register_block_style(
      'core/list',
      array(
        'name'         => 'checkmark-list',
        'label'        => esc_attr__('Checkmark', 'car-dealer-show'),
        /*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
        'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}
				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
      )
    );
    register_block_style(
      'core/navigation-link',
      array(
        'name'         => 'arrow-link',
        'label'        => esc_attr__('With arrow', 'car-dealer-show'),
        /*
				 * Styles for the custom arrow nav link block style
				 */
        'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
      )
    );
    register_block_style(
      'core/heading',
      array(
        'name'         => 'asterisk',
        'label'        => esc_attr__('With asterisk', 'car-dealer-show'),
        'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}
				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}
				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}
				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}
				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}
				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
      )
    );
  }
endif;
add_action('init', 'car_dealer_show_block_styles');
/**
 * Enqueue block stylesheets.
 */
if (!function_exists('car_dealer_show_block_stylesheets')) :
  /**
   * Enqueue custom block stylesheets
   *
   * @since Car-Dealer-Show 1.0
   * @return void
   */
  function car_dealer_show_block_stylesheets()
  {
    /**
     * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
     * for a specific block. These will only get loaded when the block is rendered
     * (both in the editor and on the front end), improving performance
     * and reducing the amount of data requested by visitors.
     *
     * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
     */
    wp_enqueue_block_style(
      'core/button',
      array(
        'handle' => 'car-dealer-show-button-style-outline',
        'src'    => get_parent_theme_file_uri('assets/css/button-outline.css'),
        'ver'    => wp_get_theme(get_template())->get('Version'),
        'path'   => get_parent_theme_file_path('assets/css/button-outline.css'),
      )
    );
  }
endif;
add_action('init', 'car_dealer_show_block_stylesheets');

// Theme info Page
require_once get_template_directory() . '/dashboard/dashboard.php';
// Load Styles
function car_dealer_show_theme_enqueue_styles()
{
  wp_enqueue_style('car_dealer_show_parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'car_dealer_show_theme_enqueue_styles');


function car_dealer_show_add_editor_styles()
{
  add_theme_support('editor-styles'); // Habilita o suporte a estilos do editor
  add_editor_style('style.css');    // Diz ao WordPress para carregar style.css no editor
  // O caminho é relativo à raiz do tema.
}
add_action('after_setup_theme', 'car_dealer_show_add_editor_styles');


// Load Styles in Block Editor

function car_dealer_show_enqueue_editor_styles()
{
  wp_enqueue_style(
    'car-dealer-show-editor-style',
    get_template_directory_uri() . '/assets/css/editor-style.css',
    array(),
    wp_get_theme()->get('Version')
  );
}
add_action('enqueue_block_assets', 'car_dealer_show_enqueue_editor_styles');



function car_dealer_show_register_my_services_pattern()
{
  $theme_directory = get_template_directory_uri();
  register_block_pattern(
    'car_dealer_show/services',
    array(
      'title'   => esc_attr__('Services', 'car-dealer-show'),
      'content' => '<!-- wp:columns {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"},"blockGap":{"left":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}},"border":{"width":"0px","style":"none"}},"backgroundColor":"base-2","fontSize":"small"} -->
                          <div class="wp-block-columns has-base-2-background-color has-background has-small-font-size" style="border-style:none;border-width:0px;margin-top:var(--wp--preset--spacing--10);margin-bottom:var(--wp--preset--spacing--10);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
                            <!-- wp:column -->
                            <div class="wp-block-column">
                              <!-- wp:image {"id":220,"sizeSlug":"full","linkDestination":"none"} -->
                              <figure class="wp-block-image size-full">
                                <img src="' . esc_url($theme_directory) . '/assets/images/parts11.jpg" alt="" class="wp-image-220"/>
                              </figure>
                              <!-- /wp:image -->
                              <!-- wp:paragraph -->
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                              <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:column -->
                            <!-- wp:column -->
                            <div class="wp-block-column">
                              <!-- wp:image {"id":219,"sizeSlug":"full","linkDestination":"none"} -->
                              <figure class="wp-block-image size-full">
                                <img src="' . esc_url($theme_directory) . '/assets/images/parts13.jpg" alt="" class="wp-image-219"/>
                              </figure>
                              <!-- /wp:image -->
                              <!-- wp:paragraph -->
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                              <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:column -->
                            <!-- wp:column -->
                            <div class="wp-block-column">
                              <!-- wp:image {"id":218,"sizeSlug":"full","linkDestination":"none"} -->
                              <figure class="wp-block-image size-full">
                                <img src="' . esc_url($theme_directory) . '/assets/images/parts12.jpg" alt="" class="wp-image-218"/>
                              </figure>
                              <!-- /wp:image -->
                              <!-- wp:paragraph -->
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                              <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:column -->
                          </div>
                          <!-- /wp:columns -->',
      'category' => 'Services',
      'inserter'    => true,
    )
  );
}
add_action('init', 'car_dealer_show_register_my_services_pattern');




function car_dealer_show_register_my_deals_pattern()
{
  $theme_directory = get_template_directory_uri();
  register_block_pattern(
    'car_dealer_show/deals',
    array(
      'title'   => esc_attr__('Deals', 'car-dealer-show'),
      'content' => '<!-- wp:cover {"url":"' . $theme_directory . '/assets/images/car-sales-photo.jpeg","id":505,"hasParallax":true,"dimRatio":70,"customOverlayColor":"#a98e81","isDark":false,"style":{"color":{"duotone":"var:preset|duotone|duotone-5"}},"layout":{"type":"constrained"}} -->
                          <div class="wp-block-cover is-light has-parallax"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim" style="background-color:#a98e81"></span><div class="wp-block-cover__image-background wp-image-505 has-parallax" style="background-position:50% 50%;background-image:url(' . $theme_directory . '/assets/images/car-sales-photo.jpeg)"></div><div class="wp-block-cover__inner-container">
                            <!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
                            <div class="wp-block-columns" style="padding-top:0;padding-bottom:0">
                              <!-- wp:column {"style":{"color":{"background":"#fff5ba"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}}} -->
                              <div class="wp-block-column has-background" style="background-color:#fff5ba;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
                                <!-- wp:columns -->
                                <div class="wp-block-columns">
                                  <!-- wp:column {"width":"33.33%"} -->
                                  <div class="wp-block-column" style="flex-basis:33.33%">
                                    <!-- wp:image {"id":506,"sizeSlug":"full","linkDestination":"none"} -->
                                    <figure class="wp-block-image size-full">
                                      <img src="' . $theme_directory . '/assets/images/hand_13320273.png" alt="" class="wp-image-506"/>
                                    </figure>
                                    <!-- /wp:image -->
                                  </div>
                                  <!-- /wp:column -->
                                  <!-- wp:column {"width":"66.66%"} -->
                                  <div class="wp-block-column" style="flex-basis:66.66%">
                                    <!-- wp:paragraph {"align":"center","fontSize":"large"} -->
                                    <p class="has-text-align-center has-large-font-size"><strong>Buy Your Car</strong></p>
                                    <!-- /wp:paragraph -->
                                    <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
                                    <p class="has-text-align-center has-medium-font-size">Enjoy quality, transparency, and top-notch service when buying your car with us.</p>
                                    <!-- /wp:paragraph -->
                                  </div>
                                  <!-- /wp:column -->
                                </div>
                                <!-- /wp:columns -->
                              </div>
                              <!-- /wp:column -->
                              <!-- wp:column {"style":{"color":{"background":"#b1d6f3"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}}} -->
                              <div class="wp-block-column has-background" style="background-color:#b1d6f3;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
                                <!-- wp:columns -->
                                <div class="wp-block-columns">
                                  <!-- wp:column {"width":"33.33%"} -->
                                  <div class="wp-block-column" style="flex-basis:33.33%">
                                    <!-- wp:image {"id":508,"sizeSlug":"full","linkDestination":"none"} -->
                                    <figure class="wp-block-image size-full">
                                      <img src="' . $theme_directory . '/assets/images/hand_2.png" alt="" class="wp-image-508"/>
                                    </figure>
                                    <!-- /wp:image -->
                                  </div>
                                  <!-- /wp:column -->
                                  <!-- wp:column {"width":"66.66%"} -->
                                  <div class="wp-block-column" style="flex-basis:66.66%">
                                    <!-- wp:paragraph {"align":"center","fontSize":"large"} -->
                                    <p class="has-text-align-center has-large-font-size"><strong>Sell Your Car</strong></p>
                                    <!-- /wp:paragraph -->
                                    <!-- wp:paragraph {"align":"center"} -->
                                    <p class="has-text-align-center">Sell your car with ease, trust, and a fair offer from us.</p>
                                    <!-- /wp:paragraph -->
                                  </div>
                                  <!-- /wp:column -->
                                </div>
                                <!-- /wp:columns -->
                              </div>
                              <!-- /wp:column -->
                            </div>
                            <!-- /wp:columns -->
                          </div></div>
                          <!-- /wp:cover -->',
      'category' => 'Deals',
      'inserter'    => true,
    )
  );
}
add_action('init', 'car_dealer_show_register_my_deals_pattern');



function car_dealer_show_register_my_about_pattern()
{
  $theme_directory = get_template_directory_uri();
  register_block_pattern(
    'car_dealer_show/about',
    array(
      'title'   => esc_attr__('About', 'car-dealer-show'),
      'categories'  => array('about'),
      'content' => '<!-- wp:columns {"metadata":{"patternName":"car-dealer-show/about","name":"About"},"className":"car-about-us","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
                          <div class="wp-block-columns car-about-us"><!-- wp:column -->
                            <div class="wp-block-column"><!-- wp:image {"id":363,"sizeSlug":"full","linkDestination":"none"} -->
                              <figure class="wp-block-image size-full">
                                <img src="' . esc_url($theme_directory) . '/assets/images/dealer.jpg" alt="Our dealer" class="wp-image-363"/>
                              </figure>
                              <!-- /wp:image --></div>
                            <!-- /wp:column -->
                            <!-- wp:column -->
                            <div class="wp-block-column"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                              <div class="wp-block-group"><!-- wp:paragraph {"fontSize":"large"} -->
                                <p class="has-large-font-size">We are a trusted car dealer, committed to offering quality vehicles and exceptional customer service to help you find the perfect car.</p>
                                <!-- /wp:paragraph --></div>
                              <!-- /wp:group -->
                              <!-- wp:spacer {"height":"26px"} -->
                              <div style="height:26px" aria-hidden="true" class="wp-block-spacer"></div>
                              <!-- /wp:spacer -->
                              <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                              <div class="wp-block-group"><!-- wp:image {"id":361,"sizeSlug":"full","linkDestination":"none"} -->
                                <figure class="wp-block-image size-full">
                                  <img src="' . esc_url($theme_directory) . '/assets/images/icon-phone.png" alt="Phone Icon" class="wp-image-361"/>
                                </figure>
                                <!-- /wp:image -->
                                <!-- wp:spacer {"height":"21px","width":"0px","style":{"layout":{"selfStretch":"fixed","flexSize":"32px"}}} -->
                                <div style="height:21px;width:0px" aria-hidden="true" class="wp-block-spacer"></div>
                                <!-- /wp:spacer -->
                                <!-- wp:paragraph -->
                                <p>999-99-111-11</p>
                                <!-- /wp:paragraph --></div>
                              <!-- /wp:group -->
                              <!-- wp:spacer {"height":"21px"} -->
                              <div style="height:21px" aria-hidden="true" class="wp-block-spacer"></div>
                              <!-- /wp:spacer -->
                              <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                              <div class="wp-block-group"><!-- wp:image {"id":358,"sizeSlug":"full","linkDestination":"none"} -->
                                <figure class="wp-block-image size-full">
                                  <img src="' . esc_url($theme_directory) . '/assets/images/icon-clock.png" alt="Clock Icon" class="wp-image-358"/>
                                </figure>
                                <!-- /wp:image -->
                                <!-- wp:spacer {"height":"21px","width":"0px","style":{"layout":{"selfStretch":"fixed","flexSize":"32px"}}} -->
                                <div style="height:21px;width:0px" aria-hidden="true" class="wp-block-spacer"></div>
                                <!-- /wp:spacer -->
                                <!-- wp:paragraph -->
                                <p>10 AM – 5 PM</p>
                                <!-- /wp:paragraph --></div>
                              <!-- /wp:group -->
                              <!-- wp:spacer {"height":"20px"} -->
                              <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
                              <!-- /wp:spacer -->
                              <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                              <div class="wp-block-group"><!-- wp:image {"id":360,"sizeSlug":"full","linkDestination":"none"} -->
                                <figure class="wp-block-image size-full">
                                  <img src="' . esc_url($theme_directory) . '/assets/images/icon-location.png" alt="Location Icon" class="wp-image-360"/>
                                </figure>
                                <!-- /wp:image -->
                                <!-- wp:spacer {"height":"21px","width":"0px","style":{"layout":{"selfStretch":"fixed","flexSize":"32px"}}} -->
                                <div style="height:21px;width:0px" aria-hidden="true" class="wp-block-spacer"></div>
                                <!-- /wp:spacer -->
                                <!-- wp:paragraph -->
                                <p>2323 NW Street One, Miami, Florida</p>
                                <!-- /wp:paragraph --></div>
                              <!-- /wp:group -->
                              <!-- wp:spacer {"height":"24px"} -->
                              <div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
                              <!-- /wp:spacer -->
                              <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                              <div class="wp-block-group"><!-- wp:image {"id":359,"sizeSlug":"full","linkDestination":"none"} -->
                                <figure class="wp-block-image size-full">
                                  <img src="' . esc_url($theme_directory) . '/assets/images/icon-envelope.png" alt="Envelope Icon" class="wp-image-359"/>
                                </figure>
                                <!-- /wp:image -->
                                <!-- wp:spacer {"height":"21px","width":"0px","style":{"layout":{"flexSize":"32px","selfStretch":"fixed"}}} -->
                                <div style="height:21px;width:0px" aria-hidden="true" class="wp-block-spacer"></div>
                                <!-- /wp:spacer -->
                                <!-- wp:paragraph -->
                                <p>info@site.com</p>
                                <!-- /wp:paragraph --></div>
                              <!-- /wp:group -->
                            </div>
                            <!-- /wp:column -->
                          </div>
                          <!-- /wp:columns -->',
      'category' => 'About',
      'inserter'    => true,
    )
  );
}
add_action('init', 'car_dealer_show_register_my_about_pattern');

function car_dealer_show_register_my_why_pattern()
{
  $theme_directory = get_template_directory_uri();
  $pattern_content = '
        <!-- wp:group {"align":"full","style":{"color":{"background":"#f5eac1"},"spacing":{"padding":{"top":"6vw","bottom":"6vw","left":"6vw","right":"6vw"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-group alignfull has-background" style="background-color:#f5eac1;padding-top:6vw;padding-right:6vw;padding-bottom:6vw;padding-left:6vw">
            <!-- wp:group {"style":{"spacing":{"blockGap":"16px","padding":{"right":"0","left":"0"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
            <div class="wp-block-group" style="padding-right:0;padding-left:0">
                <!-- wp:paragraph {"style":{"typography":{"lineHeight":"0.9","fontSize":"3.9vw","fontStyle":"normal","fontWeight":"700","textTransform":"none","textDecoration":"none","letterSpacing":"0px"},"color":{"text":"#000000"}}} -->
                <p class="has-text-color" style="color:#000000;font-size:3.9vw;font-style:normal;font-weight:700;letter-spacing:0px;line-height:0.9;text-decoration:none;text-transform:none"><strong>WHY CHOOSE US</strong></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
            <!-- wp:spacer {"height":"30px"} -->
            <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->
            <!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"3vw","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
            <div class="wp-block-group alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0vw","left":"0vw"},"margin":{"top":"0","bottom":"0"}},"layout":{"selfStretch":"fit","flexSize":null},"border":{"width":"0px","style":"none"}}} -->
                <div class="wp-block-columns alignwide" style="border-style:none;border-width:0px;margin-top:0;margin-bottom:0">
                    <!-- wp:column {"width":"50%"} -->
                    <div class="wp-block-column" style="flex-basis:50%">
                        <!-- wp:paragraph {"style":{"color":{"text":"#000000"},"typography":{"fontSize":"17px"}}} -->
                        <p class="has-text-color" style="color:#000000;font-size:17px"><strong>EASY FINANCING OPTIONS</strong><br>Our hassle-free finance department is dedicated to finding financial solutions that save you money.</p>
                        <!-- /wp:paragraph -->
                        <!-- wp:paragraph {"style":{"color":{"text":"#000000"},"typography":{"fontSize":"17px"}}} -->
                        <p class="has-text-color" style="color:#000000;font-size:17px"><strong>DIVERSE SELECTION OF BRANDS</strong><br>We offer a wide variety of popular vehicles, including top models from BMW and Ford.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:column -->
                    <!-- wp:column {"width":"50%"} -->
                    <div class="wp-block-column" style="flex-basis:50%">
                        <!-- wp:image {"id":546,"sizeSlug":"large","linkDestination":"none"} -->
                        <figure class="wp-block-image size-large"><img src="' . esc_url($theme_directory) . '/assets/images/car-30984_1280-1024x512.png" alt="" class="wp-image-546"/></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
                <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"3vw"}}}} -->
                <div class="wp-block-columns alignwide">
                    <!-- wp:column {"width":"50%"} -->
                    <div class="wp-block-column" style="flex-basis:50%">
                        <!-- wp:image {"id":542,"sizeSlug":"large","linkDestination":"none"} -->
                        <figure class="wp-block-image size-large"><img src="' . esc_url($theme_directory) . '/assets/images/car-158239_1280-1024x512.png" alt="" class="wp-image-542"/></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:column -->
                    <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
                        <!-- wp:spacer {"height":"2vw"} -->
                        <div style="height:2vw" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->
                        <!-- wp:paragraph {"style":{"color":{"text":"#000000"},"typography":{"fontSize":"17px"}}} -->
                        <p class="has-text-color" style="color:#000000;font-size:17px"><strong>TRUSTED BY THOUSANDS</strong><br>With 10 new deals available daily and 350 offers on our site, we are a trusted choice for a community of thousands.</p>
                        <!-- /wp:paragraph -->
                        <!-- wp:paragraph {"style":{"color":{"text":"#000000"},"typography":{"fontSize":"17px"}}} -->
                        <p class="has-text-color" style="color:#000000;font-size:17px"><strong>AUTO SERVICE &amp; MAINTENANCE</strong><br>Our service department ensures your vehicle is well-maintained to keep you safe on the road for many more years to come.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    ';
  register_block_pattern(
    'car-dealer-show/why',
    array(
      'title'   => esc_attr__('Why Choose Us', 'car-dealer-show'),
      'content' => $pattern_content,
      'inserter' => true, // Adicionado aqui
    )
  );
}



function car_dealer_show_register_my_faq_pattern()
{
  $theme_directory = get_template_directory_uri();
  register_block_pattern(
    'car-dealer-show/faq',
    array(
      'title'       => esc_attr__('FAQ', 'car-dealer-show'),
      'categories'  => array('faq'), // Apenas 'faq', sem duplicação
      'description' => esc_attr__('A section with frequently asked questions for car dealership services.', 'car-dealer-show'),
      'content'     => '<!-- wp:paragraph {"placeholder":"Content…"} -->
                          <p></p>
                          <!-- /wp:paragraph -->
                          <!-- wp:media-text {"mediaId":520,"mediaLink":"' . esc_url($theme_directory) . '/assets/images/ai-generated-7703434_1280/","mediaType":"image","mediaWidth":33,"verticalAlignment":"center"} -->
                          <div class="wp-block-media-text is-stacked-on-mobile is-vertically-aligned-center" style="grid-template-columns:33% auto">
                              <figure class="wp-block-media-text__media"><img src="' . esc_url($theme_directory) . '/assets/images/ai-generated-7703434_1280-1024x682.jpg" alt="" class="wp-image-520 size-full"/></figure>
                              <div class="wp-block-media-text__content">
                                  <!-- wp:details -->
                                  <details class="wp-block-details"><summary>How can I book a test drive?</summary>
                                      <!-- wp:paragraph {"placeholder":"Type / to add a hidden block"} -->
                                      <p>You can book a test drive through our website by filling out the test drive request form or by calling us directly. Our team will get in touch to confirm the date and time.</p>
                                      <!-- /wp:paragraph -->
                                  </details>
                                  <!-- /wp:details -->
                                  <!-- wp:details -->
                                  <details class="wp-block-details"><summary>What documents are required to purchase a vehicle?</summary>
                                      <!-- wp:paragraph {"placeholder":"Type / to add a hidden block"} -->
                                      <p>To purchase a vehicle, you\'ll need a valid driver\'s license, proof of insurance, and financing documents if applicable.</p>
                                      <!-- /wp:paragraph -->
                                  </details>
                                  <!-- /wp:details -->
                                  <!-- wp:details -->
                                  <details class="wp-block-details"><summary>Do you offer financing options?</summary>
                                      <!-- wp:paragraph {"placeholder":"Type / to add a hidden block"} -->
                                      <p>Yes, we offer a range of financing options to suit your needs. Our finance team can help you find a plan that works best for you.</p>
                                      <!-- /wp:paragraph -->
                                  </details>
                                  <!-- /wp:details -->
                              </div>
                          </div>
                          <!-- /wp:media-text -->',
      'keywords'    => array('car dealer', 'FAQ', 'questions'),
      'inserter'    => true,
    )
  );
}
add_action('init', 'car_dealer_show_register_my_faq_pattern');



/**
 * Register custom block patterns and categories for Car Dealer Show theme.
 *
 * */
function car_dealer_show_register_404_pattern()
{
  $theme_directory_uri = get_template_directory_uri();
  $text_page_not_found    = esc_html__('Page Not Found', 'car-dealer-show');
  $image_404_url          = esc_url($theme_directory_uri . '/assets/images/404.png');
  $alt_magnifying_glass   = esc_attr__('Magnifying glass indicating a page not found error', 'car-dealer-show');
  $text_404_code_not_found = esc_html__('404 - Not Found', 'car-dealer-show');
  $text_oops_message      = esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'car-dealer-show');

  // Este é o ponto crucial. A string precisa ser EXATAMENTE como o WordPress espera.
  // Note a ausência de quebras de linha e espaços extras em muitos lugares.
  $content_404_html = sprintf(
    '<!-- wp:cover {"dimRatio":0,"isDark":false,"layout":{"type":"constrained"}} -->' .
      '<div class="wp-block-cover is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->' .
      '<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"36px"},"spacing":{"marginBottom":"var:preset|spacing|20"}}} -->' .
      '<h1 class="wp-block-heading has-text-align-center" style="font-size:36px">%1$s</h1>' .
      '<!-- /wp:heading -->' .
      '<!-- wp:image {"width":"200px","sizeSlug":"large","linkDestination":"none","align":"center","style":{"spacing":{"margin":{"bottom":"20px"}}}} -->' .
      '<figure class="wp-block-image aligncenter size-large is-resized" style="margin-bottom:20px"><img src="%2$s" alt="%3$s" style="width:200px"/></figure>' .
      '<!-- /wp:image -->' .
      '<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"32px"}}} -->' .
      '<h2 class="wp-block-heading has-text-align-center" style="font-size:32px">%4$s</h2>' .
      '<!-- /wp:heading -->' .
      '<!-- wp:paragraph {"align":"center"} -->' .
      '<p class="has-text-align-center">%5$s</p>' .
      '<!-- /wp:paragraph --></main>' .
      '<!-- /wp:group --></div></div>' .
      '<!-- /wp:cover -->',
    $text_page_not_found,        // %1$s
    $image_404_url,              // %2$s
    $alt_magnifying_glass,       // %3$s
    $text_404_code_not_found,    // %4$s
    $text_oops_message           // %5$s
  );

  if (function_exists('register_block_pattern')) {
    register_block_pattern(
      'car_dealer_show/404-content',
      array(
        'title'       => esc_html__('404 Page Content Layout', 'car-dealer-show'),
        'description' => _x('The main content layout for the 404 (Not Found) page, including title, image, and text.', 'Block pattern description', 'car-dealer-show'),
        'content'     => $content_404_html,
        'categories'  => array('car-dealer-show-pages', 'pages'),
        'keywords'    => array('404', 'not found', 'error', 'page', 'missing'),
        'inserter'    => true,
      )
    );
  }
}
add_action('init', 'car_dealer_show_register_404_pattern');
