<?php
/*
Plugin Name: WordPress Plugin Example
Plugin URI: http://www.chriskdesigns.com/
Description: This is the example plugin for WordPress Plugin Bootcamp @ Desert Code Camp 2012.
Version: 1.0
Author: Chris Klosowski
Author URI: http://www.chriskdesigns.com/
License: GPLv2 or later
*/

class CKWPPExamplePlugin
{
    private static $ckwppe_instance;
    protected static $dataProduct;

    private function __construct()
    {
        $this->constants(); // Defines any constants used in the plugin
        $this->init();   // Sets up all the actions and filters
//        $this->getAllProduct();
    }

    public static function getInstance()
    {
        if (!self::$ckwppe_instance) {
            self::$ckwppe_instance = new CKWPPExamplePlugin();
        }

        return self::$ckwppe_instance;
    }

    private function constants()
    {
        define('CKWPPE_VERSION', '1.0');
        define('CKWPPE_TEXT_DOMAIN', 'ckwppe');
    }

    private function init()
    {
        // Register the options with the settings API
        add_action('admin_init', array($this, 'ckwppe_register_settings'));

        // Add the menu page
        add_action('admin_menu', array($this, 'ckwppe_setup_admin'));

        add_filter('the_content', array($this, 'ckwppe_add_like'));
        remove_action('wp_head', 'wp_generator');
        add_action('wp_head', array($this, 'alter_header'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin'));

    }

    function alter_header()
    {
        if (is_single()) {
            echo '<rel name="og:link" content="' . get_permalink() . '" />';
        }
    }


    public function ckwppe_register_settings()
    {
        register_setting('ckwppe-update-options', 'ckwppe_enable');
        register_setting('ckwppe-update-options', 'ckwppe_enable2');
    }

    public function ckwppe_setup_admin()
    {
        // Add our Menu Area
        add_options_page(__('Export PDF Khanh', CKWPPE_TEXT_DOMAIN),
            __('Export PDF Khanh', CKWPPE_TEXT_DOMAIN),
            'administrator', 'ckwppe-settings',
            array($this, 'export_pdf_khanh')
        );
    }

//    public function getAllProduct()
//    {
//        $args = array(
//            'post_type' => 'product',
//            'posts_per_page' => -1,
//            'post_status' => 'publish',
//            'meta_key'       => '_price',
//        );
//        $query = new WP_Query($args);
//    }

    public function enqueue_admin()
    {
        wp_register_style('my-plugin-select2-style', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css');
        wp_enqueue_style('my-plugin-select2-style');
        wp_register_script('my-plugin-select2-script', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js', array('jquery'));
        wp_enqueue_script('my-plugin-select2-script');
        wp_enqueue_script('my-plugin-script');
    }

    public function export_pdf_khanh()
    {
        ?>
        <div class="wrap">
            <div id="icon-options-general" class="icon32"></div>
            <h2>Plugin Create Catalog by Khanh</h2>
            <h1>Select your products</h1>
            <select data-security="<?php echo wp_create_nonce('search-products'); ?>" multiple style="width: 300px;"
                    class="bc-product-search"></select>
            <button class="show-selected-results">Show select results</button>
            <script>
                (function ($) {
                    $(function () {

                        $('.bc-product-search').select2({
                            ajax: {
                                url: ajaxurl, data: function (params) {
                                    return {
                                        term: params.term,
                                        action: 'woocommerce_json_search_products_and_variations',
                                        security: $(this).attr('data-security'),
                                    };
                                }, processResults: function (data) {
                                    console.log(data)
                                    var terms = [];

                                    if (data) {
                                        $.each(data, function (id, text) {
                                            terms.push({id: id, text: text});
                                        });
                                    }
                                    data = terms;
                                    return {results: terms};
                                }, cache: true
                            }
                        });
                        console.log(data)
                        $('.show-selected-results').on('click', function () {
                            var data = $('.bc-product-search').text();
                            console.log(data);
                        });

                    });
                })(jQuery)
            </script>
        </div>
        <?php
    }
}


$ckwpee = CKWPPExamplePlugin::getInstance();
