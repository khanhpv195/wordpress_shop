<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<script>
    jQuery(document).ready(function (a) {
    "use strict";
            // Listen for click on toggle checkbox   
            jQuery( "body" ).on( "click", "#pselectall", function() {
                // Iterate each checkbox
                jQuery(':checkbox').each(function () {
                    this.checked = true;
                });
            });
             jQuery( "body" ).on( "click", "#punselectall", function() {
                // Iterate each checkbox
                jQuery(':checkbox').each(function () {
                    this.checked = false;
                });
            });
        });
</script>
<div class="pipe-main-box">
    <div class="tool-box bg-white p-20p pipe-view">
        <h3 class="title" style="font-size: 1.3em !important;font-weight: 600;"><?php _e('Export Settings', 'product-import-export-for-woo'); ?></h3>
        <p><?php _e('Chọn các sản phẩm muốn xuất sang menu PDF'); ?></p>
        <form action="<?php echo admin_url('admin.php?page=wf_woocommerce_csv_im_ex&action=export'); ?>" method="post">
            <table class="form-table">
                <tr>
                    <th>
                        <label for="v_prods"><?php _e('Products', 'product-import-export-for-woo'); ?></label>
                    </th>
                    <td>
                        <select class="wc-product-search" multiple="multiple" id="v_prods" name="products[]=" data-placeholder="<?php esc_attr_e('All Products', 'product-import-export-for-woo'); ?>"></select>

                        <p style="font-size: 12px"><?php _e('Filter the products to be exported', 'product-import-export-for-woo'); ?></p>
                    </td>
               </tr>
            </table>
            <p class="submit"><input type="submit" class="button button-primary" value="<?php _e('Export Products', 'product-import-export-for-woo'); ?>" /></p>
        </form>
    </div>
<div class="clearfix"></div>
</div>