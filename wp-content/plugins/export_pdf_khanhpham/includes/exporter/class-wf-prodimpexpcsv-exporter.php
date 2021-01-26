<?php
if (!defined('ABSPATH')) {
    exit;
}
$postID = $_POST['products'];

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style type="text/css">
        body{
            justify-content: center;
            display:flex;
            margin:0;
            padding:0;
        }
        .wrapper{
        width: 612px; 
        flex-direction: column;
        display:flex;
        }
        .header{
            flex:1;
            height:792px;
        }
        .content{
            flex:1;
            height:auto;
            padding:10px
        }
        img{width: inherit;}
        .left{width:50%;float:left;height:50px}
        .right{width:50%;float:right;height:50px}

        </style>
    </head>
    <body>
    
        <div class="wrapper">
            <div class="header">
                <img  src="<?php echo plugins_url(basename(plugin_dir_path(WF_ProdImpExpCsv_FILE))) . '/images/background01.jpg'; ?>"  />
            </div>
            <div class="content">
            <?php 
                   global $wpdb;
                   if (!empty($_POST['products'])) { // introduced specific product from export page
                    $selected_product_ids = implode(', ', array_map('intval', $_POST['products']));
                    }

                   $sql = "SELECT
                   p.ID,
                   p.post_title,
                   MAX( CASE WHEN pm1.meta_key = '_regular_price' THEN pm1.meta_value ELSE NULL END ) AS regular_price,
                   MAX( CASE WHEN pm1.meta_key = '_sale_price' THEN pm1.meta_value ELSE NULL END ) AS sale_price 
               FROM
                   wp_posts p
                   LEFT JOIN wp_postmeta pm1 ON ( pm1.post_id = p.ID )
               WHERE
                   p.post_type IN ( 'product', 'product_variation' ) 
                   AND p.post_status = 'publish' 
                   AND p.post_content <> '' 
                   AND p.ID IN ($selected_product_ids) 
               GROUP BY
                   p.ID,
                   p.post_title";
               $result = $wpdb->get_results($sql);
            ?>
            <h2 class="right">I. MÓN GỎI</h2>
            <h2 class="left">ĐƠN GIÁ</h2>
          
            <?php foreach($result as $value){  ?>
              <div>
                <span><?php echo $value->post_title?></span>
                <span>350</span>
              </div>

            <?php };?>
            </div>
        </div>
     
    </body>
</html>
<?php die(); ?>