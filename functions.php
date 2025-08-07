<?php

/**
 * Car-Dealer-Show functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Car-Dealer-Show
 * @since Car-Dealer-Show 1.0
 */
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
if (!defined('CAR_DEALER_SHOW_URL')) {
  define('CAR_DEALER_SHOW_URL', get_template_directory_uri());
}
function car_dealer_show_categories()
{
  $categories = [
    'car-dealer-show/faq' => ['label' => __('FAQ', 'car-dealer-show')],
    'car-dealer-show/services' => ['label' => __('Services', 'car-dealer-show')],
    'car-dealer-show/page' => ['label' => __('Pages', 'car-dealer-show')],
    'car-dealer-show/about' => ['label' => __('About', 'car-dealer-show')],
  ];
  foreach ($categories as $slug => $args) {
    if (!WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($slug)) {
      register_block_pattern_category($slug, $args);
    }
  }
}
add_action('init', 'car_dealer_show_categories');
function car_dealer_show_get_pattern_content_from_file($pattern_file_path)
{
  $theme_dir = realpath(get_template_directory());
  $real_path = realpath($pattern_file_path);
  if (!$real_path || strpos($real_path, $theme_dir) !== 0) {
    if (defined('WP_DEBUG') && WP_DEBUG) {
      trigger_error(esc_html__('Invalid pattern file path: ', 'car-dealer-show') . esc_html($pattern_file_path), E_USER_WARNING);
    }
    return '';
  }
  if (!file_exists($real_path)) {
    if (defined('WP_DEBUG') && WP_DEBUG) {
      trigger_error(esc_html__('Pattern file not found: ', 'car-dealer-show') . esc_html($real_path), E_USER_WARNING);
    }
    return '';
  }
  ob_start();
  include $real_path;
  return ob_get_clean();
}

function car_dealer_show_register_all_patterns()
{
  static $has_run = false;

  if ($has_run) {
    return;
  }

  $has_run = true;


  $patterns = [
    'header-default'        => ['title' => __('Default Header', 'car-dealer-show'), 'categories' => ['car-dealer-show/page']],
    'footer-default'        => ['title' => __('Default Footer', 'car-dealer-show'), 'categories' => ['car-dealer-show/page']],
    'services'              => ['title' => __('Services Section', 'car-dealer-show'), 'categories' => ['car-dealer-show/services']],
    'deals'                 => ['title' => __('Buy/Sell Deals', 'car-dealer-show'), 'categories' => ['car-dealer-show/services']],
    'about'                 => ['title' => __('About Us', 'car-dealer-show'), 'categories' => ['car-dealer-show/about']],
    'why'                   => ['title' => __('Why Choose Us', 'car-dealer-show'), 'categories' => ['car-dealer-show/about']],
    'faq'                   => ['title' => __('FAQ Section', 'car-dealer-show'), 'categories' => ['car-dealer-show/faq']],
    '404-content'           => ['title' => __('404 Page Content', 'car-dealer-show'), 'categories' => ['car-dealer-show/page']],
    'template-query-loop'   => ['title' => __('Post List', 'car-dealer-show'), 'categories' => ['query']]

  ];

  foreach ($patterns as $slug => $details) {
    $pattern_name = "car-dealer-show/{$slug}";


    if (WP_Block_Patterns_Registry::get_instance()->is_registered($pattern_name)) {
      continue;
    }

    $content = car_dealer_show_get_pattern_content_from_file(get_theme_file_path("/patterns/{$slug}.php"));

    if (empty($content)) {
      if (defined('WP_DEBUG') && WP_DEBUG) {
        trigger_error(
          esc_html__('Skipping pattern registration: Content is empty for pattern file: ', 'car-dealer-show') . esc_html($slug) . '.php',
          E_USER_WARNING
        );
      }
      continue;
    }

    register_block_pattern(
      $pattern_name,
      [
        'title'       => $details['title'],
        'content'     => $content,
        'categories'  => $details['categories'],
      ]
    );
  }
}
add_action('init', 'car_dealer_show_register_all_patterns');
if (!function_exists('car_dealer_show_block_styles')) :
  function car_dealer_show_block_styles()
  {
    $block_styles = [
      'core/details' => [
        'name' => 'arrow-icon-details',
        'label' => esc_attr__('Arrow icon', 'car-dealer-show'),
        'style_handle' => 'car-dealer-show-arrow-icon-details',
      ],
      'core/post-terms' => [
        'name' => 'pill',
        'label' => esc_attr__('Pill', 'car-dealer-show'),
        'style_handle' => 'car-dealer-show-post-terms-pill',
      ],
      'core/list' => [
        'name' => 'checkmark-list',
        'label' => esc_attr__('Checkmark', 'car-dealer-show'),
        'style_handle' => 'car-dealer-show-checkmark-list',
      ],
      'core/navigation-link' => [
        'name' => 'arrow-link',
        'label' => esc_attr__('With arrow', 'car-dealer-show'),
        'style_handle' => 'car-dealer-show-arrow-link',
      ],
      'core/heading' => [
        'name' => 'asterisk',
        'label' => esc_attr__('With asterisk', 'car-dealer-show'),
        'style_handle' => 'car-dealer-show-heading-asterisk',
      ],
    ];
    $style_path = get_theme_file_path('assets/css/block-styles.css');
    $style_src = get_theme_file_uri('assets/css/block-styles.css');
    foreach ($block_styles as $block => $args) {
      register_block_style($block, [
        'name' => $args['name'],
        'label' => $args['label'],
      ]);
      if (file_exists($style_path)) {
        wp_enqueue_block_style($block, [
          'handle' => $args['style_handle'],
          'src' => $style_src,
          'path' => $style_path,
          'ver' => wp_get_theme()->get('Version'),
        ]);
      } elseif (defined('WP_DEBUG') && WP_DEBUG) {
        trigger_error(esc_html__('Block style file not found: ', 'car-dealer-show') . esc_html($style_path), E_USER_WARNING);
      }
    }
  }
endif;
add_action('init', 'car_dealer_show_block_styles');
if (!function_exists('car_dealer_show_block_stylesheets')) :
  function car_dealer_show_block_stylesheets()
  {
    $style_path = get_theme_file_path('assets/css/button-outline.css');
    if (file_exists($style_path)) {
      wp_enqueue_block_style(
        'core/button',
        [
          'handle' => 'car-dealer-show-button-style-outline',
          'src'    => get_theme_file_uri('assets/css/button-outline.css'),
          'ver'    => wp_get_theme()->get('Version'),
          'path'   => $style_path,
        ]
      );
    } elseif (defined('WP_DEBUG') && WP_DEBUG) {
      trigger_error(esc_html__('Block style file not found: ', 'car-dealer-show') . esc_html($style_path), E_USER_WARNING);
    }
  }
endif;
add_action('init', 'car_dealer_show_block_stylesheets');
$dashboard_file = get_template_directory() . '/dashboard/dashboard.php';
if (file_exists($dashboard_file)) {
  require_once $dashboard_file;
} elseif (defined('WP_DEBUG') && WP_DEBUG) {
  trigger_error(esc_html__('Dashboard file not found: ', 'car-dealer-show') . esc_html($dashboard_file), E_USER_WARNING);
}

function car_dealer_show_theme_enqueue_styles()
{
  wp_enqueue_style(
    'car-dealer-show-style',
    get_stylesheet_uri(),
    [],
    wp_get_theme()->get('Version')
  );
}
add_action('wp_enqueue_scripts', 'car_dealer_show_theme_enqueue_styles');

function car_dealer_show_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
  add_theme_support('align-wide');
  add_theme_support('responsive-embeds');
  add_theme_support('wp-block-styles');
  add_theme_support('editor-styles');

  $editor_styles = [
    'style.css',
    'assets/css/editor-style.css',
  ];

  foreach ($editor_styles as $style) {
    $style_path = get_theme_file_path($style);
    if (file_exists($style_path)) {
      add_editor_style($style);
    } elseif (defined('WP_DEBUG') && WP_DEBUG) {
      trigger_error(esc_html__('Editor style file not found: ', 'car-dealer-show') . esc_html($style_path), E_USER_WARNING);
    }
  }
}
add_action('after_setup_theme', 'car_dealer_show_setup');
