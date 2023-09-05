<?php

/**
 * Plugin Name:       Simple Button
 * Description:       Simple Button tutorial
 * Author:            Sergey Melkumyan
 * Version:           1.0.0
 * Text Domain:       simple-button
 * 
 */

if (!defined('ABSPATH')) {
    echo "ABSPATH !";
    exit;
}

class SimpleButton
{

    public function __construct()
    {
        // Add action hooks for loading assets and scripts
        add_action('wp_enqueue_scripts', array($this, 'load_assets'));
        add_shortcode('modal-button', array($this, 'load_shortcode'));
        add_action('wp_footer', array($this, 'load_scripts'));
    }

    // Function to enqueue CSS and JavaScript assets
    public function load_assets()
    {
        wp_enqueue_style(
            'simple-button',
            plugin_dir_url(__FILE__) . 'css/simple-button.css',
            array(),
            '1.0.0',
            'all'
        );

        wp_enqueue_script(
            'simple-button',
            plugin_dir_url(__FILE__) . 'js/simple-button.js',
            array('jquery'),
            '1.0.0',
            true
        );
    }

    // Shortcode function to display a button
    public function load_shortcode()
    { ?>
        <button class="btn btn-success btn-block w-100 test">Click</button>
    <?php }

    // Function to load JavaScript code in the footer
    public function load_scripts()
    { ?>
        <script>
            (function($) {
                // Add a click event handler for the button to show an alert
                $('button').click(function() {
                    alert('CLICKED !!');
                });
            })(jQuery);
        </script>
<?php }
}

// Instantiate the SimpleButton class to initialize the plugin
new SimpleButton;
