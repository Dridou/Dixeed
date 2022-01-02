<?php
/**
 * Plugin Name: Display Message for client
 * Description: Allow to display a message on the client dashboard
 * Author: Adrien Nebon-Carle
 */

function display_message_account_content() {
    $html = '<h3>Title</h3>';
    echo $html;
}

add_action('woocommerce_account_content', 'display_message_account_content');