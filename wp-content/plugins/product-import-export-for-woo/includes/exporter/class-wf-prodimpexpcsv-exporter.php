<?php
if (!defined('ABSPATH')) {
    exit;
}

class WF_ProdImpExpCsv_Exporter
{

    /**
     * Product Exporter Tool
     */
    public static function do_export($post_type = 'product')
    {
        global $wpdb;
        $export_limit = !empty($_POST['limit']) ? intval($_POST['limit']) : 999999999;
        $export_count = 0;
        $limit = 100;
        $current_offset = !empty($_POST['offset']) ? intval($_POST['offset']) : 0;
        $product_limit = !empty($_POST['product_limit']) ? intval($_POST['product_limit']) : '';
        $selected_product_ids = '';

        if (!empty($_POST['products'])) { // introduced specific product from export page
            $selected_product_ids = implode(', ', array_map('intval', $_POST['products']));
        }
        if ($selected_product_ids) {
            $product_args = apply_filters('woocommerce_csv_product_export_args', array(
                'numberposts' => $limit,
                'post_status' => 'publish',
                'post_type' => array('product'),
                'orderby' => 'ID',
                'suppress_filters' => false,
                'order' => 'ASC',
                'offset' => $current_offset
            ));
            $parent_ids = array_map('intval', explode(',', $selected_product_ids));
            $child_ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE post_parent IN (" . implode(',', $parent_ids) . ");");
            $sel_ids = array_merge($parent_ids, $child_ids);
            $product_args['post__in'] = $sel_ids;
            $product_args['order'] = 'ASC';
            $products = get_posts($product_args);
            // Loop products
            foreach ($products as $product) {
                if ($product->post_parent == 0) $product->post_parent = '';
                $row = array();
                // Pre-process data
                $meta_data = get_post_custom($product->ID);
                $product->meta = new stdClass;
                $product->attributes = new stdClass;
                // Meta data
                $include_hidden_meta         = ! empty( $_POST['include_hidden_meta'] ) ? true : false;
                $exclude_hidden_meta_columns = include( 'data/data-wf-hidden-meta-columns.php' );

                foreach ( $meta_data as $meta => $value ) {
                    if ( ! $meta ) {
                        continue;
                    }

                    if ( $include_hidden_meta && in_array( $meta, $exclude_hidden_meta_columns ) ) {
                        continue;
                    }

                    $meta_value = maybe_unserialize( maybe_unserialize( $value[0] ) );

                    if ( is_array( $meta_value ) ) {
                        $meta_value = json_encode( $meta_value );
                    }


                    print_r($value);die();
                }

            }
        }
    }
}

?>
