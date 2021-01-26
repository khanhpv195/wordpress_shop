<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="woocommerce">
	<div class="icon32" id="icon-woocommerce-importer"><br></div>
    <h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
        <a href="<?php echo admin_url('admin.php?page=wf_woocommerce_csv_im_ex'); ?>" class="nav-tab <?php echo ('help' != $tab) ? 'nav-tab-active' : ''; ?>"><?php _e('Product Export', 'product-import-export-for-woo'); ?></a>

    </h2>
        	<?php
		switch ($tab) {


                        case "export":
			default :
				$this->admin_export_page();
			break;
		}
	?>
</div>