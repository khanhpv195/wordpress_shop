<?php
/**
 * WordPress Export Administration Screen
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Bootstrap */
$product = $_POST['products'];
global $wpdb;
$limit = 10;
$offset = 0;
$table = $wpdb->prefix . 'posts';
$sql = "SELECT post_title as title FROM {$table} WHERE `post_type` = 'product' LIMIT %d OFFSET %d";
$data = $wpdb->get_results($wpdb->prepare($sql, $limit, $offset), ARRAY_A); //
echo json_encode($data);
