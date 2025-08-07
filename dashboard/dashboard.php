<?php

/**
 * @package Car-Dealer-Show
 * @since Car-Dealer-Show 1.0
 */

/**
 * Register Theme Dashboard.
 *
 * WARNING: This type of admin page is not allowed in themes on WordPress.org.
 * It must be removed for the theme to be approved.
 */

if (!defined('ABSPATH')) {
    exit;
}

function car_dealer_show_menu()
{
    add_theme_page(
        esc_attr__('Car Dealer Show', 'car-dealer-show'), // Page title
        esc_attr__('Car Dealer Theme', 'car-dealer-show'), // Menu title
        'edit_theme_options',
        'car_dealer_show',
        'car_dealer_show_dashboard'
    );
}
// You are adding the action twice, which is redundant. I am keeping only one.
add_action('admin_menu', 'car_dealer_show_menu');

function car_dealer_show_admin_theme_style()
{
    // A more secure way to get the page value.
    $page_value = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : '';
    if ($page_value === 'car_dealer_show') {
        wp_enqueue_style(
            'car_dealer_show_admin_styles',
            esc_url(get_template_directory_uri()) . '/assets/css/admin-styles.css',
            array(),
            wp_get_theme()->get('Version')
        );
    }
}
add_action('admin_enqueue_scripts', 'car_dealer_show_admin_theme_style');

function car_dealer_show_dashboard()
{
?>
    <div id="car-dealer-show-logo">
        <img alt="<?php esc_attr_e('Car Dealer Show Logo', 'car-dealer-show'); ?>" width="300" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.png" />
    </div>

    <div id="car-dealer-show-steps3">
        <div class="car-dealer-show-block-title">
            <img alt="<?php esc_attr_e('3 Steps Icon', 'car-dealer-show'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/3steps.png" />
            <br /><br />
            <?php esc_attr_e('Follow these 3 steps after installing the theme:', 'car-dealer-show'); ?>
        </div>
        <div class="car-dealer-show-help-container1">
            <div class="car-dealer-show-help-column car-dealer-show-help-column-1">
                <img alt="<?php esc_attr_e('Step 1 Icon', 'car-dealer-show'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/step1.png" />
                <h3><?php esc_html_e('Install Plugin', 'car-dealer-show'); ?></h3>
                <?php esc_attr_e('After activating the theme, install the optional free CarDealer plugin.', 'car-dealer-show'); ?>
                <br /><br />
                <?php echo esc_url('https://wordpress.org/plugins/cardealer'); ?>
                <br />
            </div>
            <div class="car-dealer-show-help-column car-dealer-show-help-column-2">
                <img alt="<?php esc_attr_e('Step 2 Icon', 'car-dealer-show'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/step2.png" />
                <h3><?php esc_html_e('Install Demo Data (optional)', 'car-dealer-show'); ?></h3>
                <?php esc_attr_e('To get the same look and feel of the demo site, install the demo data (only if you have a blank website now).', 'car-dealer-show'); ?>
                <br />
                <?php esc_attr_e('You can also download the free images used in our demo to add to your pages.', 'car-dealer-show'); ?>

                <br /><br />
                <?php echo esc_url('https://cardealerthemes.com/documentation/'); ?>
                <br />
            </div>
            <div class="car-dealer-show-help-column car-dealer-show-help-column-3">
                <img alt="<?php esc_attr_e('Step 3 Icon', 'car-dealer-show'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/step3.png" />
                <h3><?php esc_html_e('Theme Management', 'car-dealer-show'); ?></h3>
                <?php esc_attr_e('To manage the theme, click Appearance => Editor in the left menu.', 'car-dealer-show'); ?>
            </div>
        </div>
    </div>

    <div id="car-dealer-show-services3">
        <div class="car-dealer-show-block-title">
            <?php esc_attr_e('Help, Support, Troubleshooting:', 'car-dealer-show'); ?>
        </div>
        <div class="car-dealer-show-help-container1">
            <div class="car-dealer-show-help-column car-dealer-show-help-column-1">
                <img alt="<?php esc_attr_e('Support Icon', 'car-dealer-show'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/support.png" />
                <h3><?php esc_html_e('Help and More Tips', 'car-dealer-show'); ?></h3>
                <?php esc_attr_e('Visit the theme site for more information.', 'car-dealer-show'); ?>
                <br /><br />
            </div>
            <div class="car-dealer-show-help-column car-dealer-show-help-column-2">
                <img alt="<?php esc_attr_e('Service Configuration Icon', 'car-dealer-show'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/service_configuration.png" />
                <h3><?php esc_html_e('Online Guide, Support, Demo Video...', 'car-dealer-show'); ?></h3>
                <?php esc_attr_e('You will find our complete and updated online guide, demo video, link to support page, and more useful stuff on our site.', 'car-dealer-show'); ?>
                <br /><br />
                <?php echo esc_url('http://cardealerthemes.com'); ?>
            </div>
            <div class="car-dealer-show-help-column car-dealer-show-help-column-3">
                <img alt="<?php esc_attr_e('System Health Icon', 'car-dealer-show'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/system_health.png" />
                <h3><?php esc_html_e('Troubleshooting Guide', 'car-dealer-show'); ?></h3>
                <?php esc_attr_e('Using an old WordPress version, low memory, a plugin with JavaScript errors, or wrong permalink settings are some possible problems. Read this and discover how to fix them quickly!', 'car-dealer-show'); ?>
                <br /><br />
                <?php echo esc_url('http://siterightaway.net/troubleshooting/'); ?>
            </div>
        </div>
    </div>
<?php
}
