<?php
/**
 * Plugin Name: Display Message for client
 * Description: Allow to display a message on the client dashboard
 * Author: Adrien Nebon-Carle
 */


add_action('woocommerce_account_content', 'display_message_account_content');

function display_message_account_content() {
    $text_to_display = get_option('display_options');
    $display_it = get_option('to_display_option');
    if ($display_it == 1) {
        echo "<p>";
        echo esc_attr($text_to_display);
        echo "</p>";
    }
        
}


/**
 * Register our wporg_settings_init to the admin_init action hook.
 */
add_action('admin_init', 'display_settings_init');

/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */
 
/**
 * custom option and settings
 */
function display_settings_init() {
    // Register a new setting for "wporg" page.
    // register_setting( string $option_group, string $option_name, array $args = array() )
    register_setting('display', 'display_options');
    register_setting('display', 'to_display_option');
 
    // Register a new section in the "wporg" page.
    // add_settings_section( string $id, string $title, callable $callback, string $page )
    add_settings_section(
        'display_section_developers',
        __( 'Display text options', 'display' ),
        'display_section_developers_callback',
        'display'
    );
 
    // Register a new field in the "display_section_developers" section, inside the "wporg" page.
    // add_settings_field( string $id, string $title, callable $callback, string $page, string $section = 'default', array $args = array() )
    add_settings_field(
        'text_field', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
        __( 'Text to display', 'display' ),
        'text_field_cb',
        'display',
        'display_section_developers',
        array(
            'label_for'         => 'text_field',
            'class'             => 'display_row',
            'display_custom_data' => 'custom',
        )
    );

    add_settings_field(
        'checked_field',
        __('Display message ?', 'display'),
        'checked_field_cb',
        'display',
        'display_section_developers',
        array(
            'label_for'         => 'checked_field',
            'class'             => 'display_row',
            'display_custom_data' => 'custom',
        )
        
    );
}


function display_section_developers_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Enter your text and choose if you want do display it or not.', 'display' ); ?></p>
    <?php
}
 
 

/**
 * Text field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
 function text_field_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'display_options' );
    ?>
       <input type="text" name="display_options" value="<?php echo isset( $options ) ? esc_attr( $options ) : ''; ?>">
    <?php
}


function checked_field_cb( $args ) {
    $options = get_option('to_display_option');
    ?>
        <input type="checkbox" name="to_display_option" value="<?php echo isset($options) ? 1 : 0; ?>" <?php  echo ($options == '1') ? 'checked' : ''; ?>>
    <?php
}

/**
 * Register our display_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'display_options_page' );

/**
 * Add the top level menu page.
 * add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
 */
function display_options_page() {
    add_menu_page(
        'Display',
        'Display Options',
        'manage_options',
        'display',
        'display_options_page_html'
    );
}

 
/**
 * Top level menu callback function
 */
function display_options_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
 
    // add error/update messages
 
    // check if the user have submitted the settings
    // WordPress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'display_messages', 'display_message', __( 'Settings Saved', 'display' ), 'updated' );
    }
 
    // show error/update messages
    settings_errors( 'display_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg"
            settings_fields( 'display' );
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections( 'display' );
            // output save settings button
            submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
    <?php
}
