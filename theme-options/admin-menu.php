<?php
    /* This code is heavily ripped off from this tutorial
     * http://www.sitepoint.com/wordpress-options-panel/
     */
    add_action('admin_menu', 'create_theme_options_page');
    add_action('admin_head', 'admin_register_head');
    
    function admin_register_head() {
        $url = get_bloginfo('template_directory') . '/theme-options/options.css';
        echo "<link rel='stylesheet' href='$url' />";
    }

    function create_theme_options_page() {
        add_theme_page('Theme Options', 'Theme Options', 'administrator', 'options.php', 'build_options_page');
    }

    function build_options_page() {
?>
        <div id="theme-options-wrap">
            <div class="icon32" id="icon-tools"><br />
            </div>
            <h1>Doğrulat Theme Options</h1>
            <br />
           <form method="post" action="options.php" enctype="multipart/form-data">
                <?php settings_fields('theme_options'); ?>
                <?php do_settings_sections(__FILE__); ?> 
                <p class="submit">
                    <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
                </p>
            </form>
        </div>
<?php
    }

    add_action('admin_init', 'register_and_build_fields');

    function register_and_build_fields() {
        register_setting('theme_options', 'theme_options', 'validate_setting');
        add_settings_section('main_section', 'Main Settings', 'section_cb', __FILE__);
        add_settings_field('email', 'Contact Email:', 'email_setting', __FILE__, 'main_section');
        add_settings_field('header_logo_url', 'Header Logo URL:', 'header_logo_url_setting', __FILE__, 'main_section');
        add_settings_field('favicon_url', 'Favicon URL:', 'favicon_url_setting', __FILE__, 'main_section');
        add_settings_field('facebook_url', 'Facebook URL:', 'facebook_url_setting', __FILE__, 'main_section');
        add_settings_field('twitter_url', 'Twitter URL:', 'twitter_url_setting', __FILE__, 'main_section');
        add_settings_field('display_language_switcher', 'Show Language Switcher:', 'display_language_switcher_setting', __FILE__, 'main_section');
    }

    function validate_setting($theme_options) {
        return $theme_options;
    }

    function section_cb() {}

    function email_setting() {
        $options = get_option('theme_options');
        echo "<input name='theme_options[email]' type='text' value='{$options['email']}' />";
    }

    function header_logo_url_setting() {
        $options = get_option('theme_options');
        echo "<input name='theme_options[header_logo_url]' type='text' value='{$options['header_logo_url']}' />";
    }

    function favicon_url_setting() {
        $options = get_option('theme_options');
        echo "<input name='theme_options[favicon_url]' type='text' value='{$options['favicon_url']}' />";
    }

    function facebook_url_setting() {
        $options = get_option('theme_options');
        echo "<input name='theme_options[facebook_url]' type='text' value='{$options['facebook_url']}' />";
    }

    function twitter_url_setting() {
        $options = get_option('theme_options');
        echo "<input name='theme_options[twitter_url]' type='text' value='{$options['twitter_url']}' />";
    }

    function display_language_switcher_setting() {
        $options = get_option('theme_options');
        $is_checked = $options['display_language_switcher'] == true ? "checked" : "";
        echo "<input name='theme_options[display_language_switcher]' type='checkbox' ". $is_checked. " />";
    }
?>