<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-11-18 05:34:22 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `op`.*, `p`.`product_img1` as `product_image`
FROM `order_products` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '75'
ERROR - 2025-11-18 06:45:19 --> Query error: Unknown column 'order_date' in 'order clause' - Invalid query: SELECT *
FROM `orders`
WHERE `user_id` = '50'
ORDER BY `order_date` DESC
ERROR - 2025-11-18 06:45:26 --> Query error: Unknown column 'order_date' in 'order clause' - Invalid query: SELECT *
FROM `orders`
WHERE `user_id` = '50'
ORDER BY `order_date` DESC
ERROR - 2025-11-18 06:45:42 --> Query error: Unknown column 'order_date' in 'order clause' - Invalid query: SELECT *
FROM `orders`
WHERE `user_id` = '45'
ORDER BY `order_date` DESC
ERROR - 2025-11-18 06:47:41 --> Severity: error --> Exception: Call to undefined method Users_model::get_user_by_id() C:\xampp\htdocs\flora\application\controllers\Admin.php 1223
ERROR - 2025-11-18 07:00:18 --> Severity: Warning --> Undefined variable $content C:\xampp\htdocs\flora\application\views\admin\common\templet.php 32
ERROR - 2025-11-18 07:00:28 --> Severity: Warning --> Undefined variable $content C:\xampp\htdocs\flora\application\views\admin\common\templet.php 32
ERROR - 2025-11-18 08:05:32 --> Severity: Warning --> Undefined property: stdClass::$first_name C:\xampp\htdocs\flora\application\views\admin\user_orders_list.php 10
ERROR - 2025-11-18 08:05:32 --> Severity: Warning --> Undefined property: stdClass::$last_name C:\xampp\htdocs\flora\application\views\admin\user_orders_list.php 10
ERROR - 2025-11-18 08:08:37 --> Severity: Warning --> Undefined property: stdClass::$first_name C:\xampp\htdocs\flora\application\views\admin\user_orders_list.php 10
ERROR - 2025-11-18 08:08:37 --> Severity: Warning --> Undefined property: stdClass::$last_name C:\xampp\htdocs\flora\application\views\admin\user_orders_list.php 10
ERROR - 2025-11-18 08:09:14 --> Severity: Warning --> Undefined property: stdClass::$first_name C:\xampp\htdocs\flora\application\views\admin\user_orders_list.php 10
ERROR - 2025-11-18 08:09:14 --> Severity: Warning --> Undefined property: stdClass::$last_name C:\xampp\htdocs\flora\application\views\admin\user_orders_list.php 10
ERROR - 2025-11-18 08:09:48 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `op`.*, `p`.`product_img1` as `product_image`
FROM `order_products` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '75'
ERROR - 2025-11-18 08:10:08 --> Severity: Warning --> Undefined property: stdClass::$first_name C:\xampp\htdocs\flora\application\views\admin\user_orders_list.php 10
ERROR - 2025-11-18 08:10:08 --> Severity: Warning --> Undefined property: stdClass::$last_name C:\xampp\htdocs\flora\application\views\admin\user_orders_list.php 10
ERROR - 2025-11-18 08:17:17 --> Severity: Warning --> Undefined property: stdClass::$order_id C:\xampp\htdocs\flora\application\views\admin\user_orders_list.php 63
ERROR - 2025-11-18 08:24:01 --> Severity: Warning --> Undefined variable $order_details C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 33
ERROR - 2025-11-18 08:24:01 --> Severity: Warning --> Undefined property: stdClass::$product_name C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 39
ERROR - 2025-11-18 08:24:01 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 39
ERROR - 2025-11-18 08:24:01 --> Severity: Warning --> Undefined property: stdClass::$product_img C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 40
ERROR - 2025-11-18 08:24:01 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 40
ERROR - 2025-11-18 08:24:01 --> Severity: Warning --> Undefined property: stdClass::$quantity C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 41
ERROR - 2025-11-18 08:24:01 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 41
ERROR - 2025-11-18 08:24:01 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 42
ERROR - 2025-11-18 08:24:01 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 42
ERROR - 2025-11-18 08:24:01 --> Severity: error --> Exception: sizeof(): Argument #1 ($value) must be of type Countable|array, null given C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 45
ERROR - 2025-11-18 08:25:12 --> Severity: Warning --> Undefined variable $order_details C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 33
ERROR - 2025-11-18 08:25:12 --> Severity: Warning --> Undefined property: stdClass::$product_name C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 39
ERROR - 2025-11-18 08:25:12 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 39
ERROR - 2025-11-18 08:25:12 --> Severity: Warning --> Undefined property: stdClass::$product_img C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 40
ERROR - 2025-11-18 08:25:12 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 40
ERROR - 2025-11-18 08:25:12 --> Severity: Warning --> Undefined property: stdClass::$quantity C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 41
ERROR - 2025-11-18 08:25:12 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 41
ERROR - 2025-11-18 08:25:12 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 42
ERROR - 2025-11-18 08:25:12 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 42
ERROR - 2025-11-18 08:25:12 --> Severity: error --> Exception: sizeof(): Argument #1 ($value) must be of type Countable|array, null given C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 45
ERROR - 2025-11-18 08:25:20 --> Severity: Warning --> Undefined variable $order_details C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 33
ERROR - 2025-11-18 08:25:20 --> Severity: Warning --> Undefined property: stdClass::$product_name C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 39
ERROR - 2025-11-18 08:25:20 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 39
ERROR - 2025-11-18 08:25:20 --> Severity: Warning --> Undefined property: stdClass::$product_img C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 40
ERROR - 2025-11-18 08:25:20 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 40
ERROR - 2025-11-18 08:25:20 --> Severity: Warning --> Undefined property: stdClass::$quantity C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 41
ERROR - 2025-11-18 08:25:20 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 41
ERROR - 2025-11-18 08:25:20 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 42
ERROR - 2025-11-18 08:25:20 --> Severity: 8192 --> json_decode(): Passing null to parameter #1 ($json) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 42
ERROR - 2025-11-18 08:25:20 --> Severity: error --> Exception: sizeof(): Argument #1 ($value) must be of type Countable|array, null given C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 45
ERROR - 2025-11-18 08:34:44 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `op`.*, `p`.`product_name`, `p`.`product_img1`
FROM `order_products` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '75'
ERROR - 2025-11-18 08:34:53 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `op`.*, `p`.`product_name`, `p`.`product_img1`
FROM `order_products` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '75'
ERROR - 2025-11-18 08:35:40 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `op`.*, `p`.`product_name`, `p`.`product_img1`
FROM `order_products` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '75'
ERROR - 2025-11-18 08:35:41 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `op`.*, `p`.`product_name`, `p`.`product_img1`
FROM `order_products` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '75'
ERROR - 2025-11-18 08:35:47 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `op`.*, `p`.`product_name`, `p`.`product_img1`
FROM `order_products` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '75'
ERROR - 2025-11-18 08:35:57 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `op`.*, `p`.`product_name`, `p`.`product_img1`
FROM `order_products` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '75'
ERROR - 2025-11-18 08:37:29 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:37:29 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:37:29 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:37:29 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:37:29 --> Severity: Warning --> Undefined property: stdClass::$address_details C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 119
ERROR - 2025-11-18 08:37:29 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 137
ERROR - 2025-11-18 08:37:29 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 137
ERROR - 2025-11-18 08:37:49 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:37:49 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:37:49 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:37:49 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:37:49 --> Severity: Warning --> Undefined property: stdClass::$address_details C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 119
ERROR - 2025-11-18 08:37:49 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 137
ERROR - 2025-11-18 08:37:49 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 137
ERROR - 2025-11-18 08:38:43 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:38:43 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:38:43 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:38:43 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 53
ERROR - 2025-11-18 08:38:43 --> Severity: Warning --> Undefined property: stdClass::$address_details C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 119
ERROR - 2025-11-18 08:38:43 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 137
ERROR - 2025-11-18 08:38:43 --> Severity: Warning --> Undefined property: stdClass::$selling_price C:\xampp\htdocs\flora\application\views\admin\orderdetails_page.php 137
ERROR - 2025-11-18 08:44:33 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `op`.*, `p`.`product_img1` as `product_image`
FROM `order_products` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '75'
ERROR - 2025-11-18 08:46:18 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `op`.*, `p`.`product_img1` as `product_image`
FROM `order_products` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '75'
ERROR - 2025-11-18 08:46:36 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `op`.*, `p`.`product_img1` as `product_image`
FROM `order_products` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '75'
ERROR - 2025-11-18 10:27:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2025-11-18 11:11:45 --> Severity: 8192 --> htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\flora\application\views\admin\index.php 209
ERROR - 2025-11-18 11:38:49 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 11:38:49 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 11:42:50 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\flora\application\views\category_detail.php 3
ERROR - 2025-11-18 11:47:19 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 11:47:19 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 11:47:19 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 615
ERROR - 2025-11-18 11:47:19 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 616
ERROR - 2025-11-18 12:00:44 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:00:44 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:00:44 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 615
ERROR - 2025-11-18 12:00:44 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 616
ERROR - 2025-11-18 12:01:32 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:01:32 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:01:32 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 615
ERROR - 2025-11-18 12:01:32 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 616
ERROR - 2025-11-18 12:01:40 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:01:40 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:01:40 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 615
ERROR - 2025-11-18 12:01:40 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 616
ERROR - 2025-11-18 12:02:05 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:02:05 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:02:23 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:02:23 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:04:59 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:04:59 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:05:09 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:05:09 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:05:09 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 615
ERROR - 2025-11-18 12:05:09 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 616
ERROR - 2025-11-18 12:06:14 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:06:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:06:14 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 615
ERROR - 2025-11-18 12:06:14 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 616
ERROR - 2025-11-18 12:07:04 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:07:04 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:07:04 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 615
ERROR - 2025-11-18 12:07:04 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 616
ERROR - 2025-11-18 12:16:07 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:16:07 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:16:07 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 615
ERROR - 2025-11-18 12:16:07 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 616
ERROR - 2025-11-18 12:16:46 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:16:46 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:16:46 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 615
ERROR - 2025-11-18 12:16:46 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 616
ERROR - 2025-11-18 12:17:29 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:17:29 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:17:29 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 615
ERROR - 2025-11-18 12:17:29 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 616
ERROR - 2025-11-18 12:28:42 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:28:42 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:28:42 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 613
ERROR - 2025-11-18 12:28:42 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 614
ERROR - 2025-11-18 12:28:57 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:28:57 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:28:57 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 613
ERROR - 2025-11-18 12:28:57 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 614
ERROR - 2025-11-18 12:37:40 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:37:40 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:37:40 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 613
ERROR - 2025-11-18 12:37:40 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 614
ERROR - 2025-11-18 12:42:03 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:42:03 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 12:42:03 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 613
ERROR - 2025-11-18 12:42:03 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 614
ERROR - 2025-11-18 18:04:09 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:04:09 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:04:09 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 613
ERROR - 2025-11-18 18:04:09 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 614
ERROR - 2025-11-18 18:06:22 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:06:22 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:07:08 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:07:08 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:07:18 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:07:18 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:07:20 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:07:20 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:10:34 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:10:34 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:11:20 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:11:20 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:12:42 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:12:42 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:12:47 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:12:47 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:12:52 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:12:52 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:13:00 --> Severity: error --> Exception: Division by zero C:\xampp\htdocs\flora\application\models\Cart_model.php 146
ERROR - 2025-11-18 18:14:12 --> Severity: error --> Exception: Division by zero C:\xampp\htdocs\flora\application\models\Cart_model.php 146
ERROR - 2025-11-18 18:14:14 --> Severity: error --> Exception: Division by zero C:\xampp\htdocs\flora\application\models\Cart_model.php 146
ERROR - 2025-11-18 18:14:16 --> Severity: error --> Exception: Division by zero C:\xampp\htdocs\flora\application\models\Cart_model.php 146
ERROR - 2025-11-18 18:14:23 --> Severity: error --> Exception: Division by zero C:\xampp\htdocs\flora\application\models\Cart_model.php 146
ERROR - 2025-11-18 18:14:24 --> Severity: error --> Exception: Division by zero C:\xampp\htdocs\flora\application\models\Cart_model.php 146
ERROR - 2025-11-18 18:14:24 --> Severity: error --> Exception: Division by zero C:\xampp\htdocs\flora\application\models\Cart_model.php 146
ERROR - 2025-11-18 18:14:26 --> Severity: error --> Exception: Division by zero C:\xampp\htdocs\flora\application\models\Cart_model.php 146
ERROR - 2025-11-18 18:16:22 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:16:22 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:16:29 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:16:29 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:16:50 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:16:50 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:17:10 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:17:10 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:17:12 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:17:12 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:21:14 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:21:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:21:14 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 613
ERROR - 2025-11-18 18:21:14 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 614
ERROR - 2025-11-18 18:21:16 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:21:16 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:21:16 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile.php 613
ERROR - 2025-11-18 18:21:16 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile.php 614
ERROR - 2025-11-18 18:23:36 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:23:36 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:23:38 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:23:38 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:23:40 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:23:40 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:23:54 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:23:54 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:23:56 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:23:56 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:24:06 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:24:06 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:24:10 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:24:10 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:24:14 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:27:57 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile_info.php 192
ERROR - 2025-11-18 18:27:57 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile_info.php 193
ERROR - 2025-11-18 18:28:12 --> Severity: error --> Exception: Call to undefined method Order_model::get_orders_by_user() C:\xampp\htdocs\flora\application\controllers\Main.php 603
ERROR - 2025-11-18 18:30:00 --> Query error: Table 'flora.order_products' doesn't exist - Invalid query: SELECT `o`.*, `p`.`product_img1`, `p`.`product_name`
FROM `orders` `o`
LEFT JOIN `order_products` `op` ON `op`.`order_id` = `o`.`order_id`
LEFT JOIN `product` `p` ON `p`.`id` = `op`.`product_id`
WHERE `o`.`user_id` = '48'
ORDER BY `o`.`order_id` DESC
ERROR - 2025-11-18 18:33:34 --> Query error: Unknown column 'o.order_id' in 'on clause' - Invalid query: SELECT `o`.*, `p`.`product_img1`, `p`.`product_name`
FROM `orders` `o`
LEFT JOIN `order_product` `op` ON `op`.`order_id` = `o`.`order_id`
LEFT JOIN `product` `p` ON `p`.`id` = `op`.`product_id`
WHERE `o`.`user_id` = '48'
ORDER BY `o`.`order_id` DESC
ERROR - 2025-11-18 18:33:35 --> Query error: Unknown column 'o.order_id' in 'on clause' - Invalid query: SELECT `o`.*, `p`.`product_img1`, `p`.`product_name`
FROM `orders` `o`
LEFT JOIN `order_product` `op` ON `op`.`order_id` = `o`.`order_id`
LEFT JOIN `product` `p` ON `p`.`id` = `op`.`product_id`
WHERE `o`.`user_id` = '48'
ORDER BY `o`.`order_id` DESC
ERROR - 2025-11-18 18:33:57 --> Query error: Unknown column 'o.order_id' in 'on clause' - Invalid query: SELECT `o`.*, `p`.`product_img1`, `p`.`product_name`
FROM `orders` `o`
LEFT JOIN `order_product` `op` ON `op`.`order_id` = `o`.`order_id`
LEFT JOIN `product` `p` ON `p`.`id` = `op`.`product_id`
WHERE `o`.`user_id` = '48'
ORDER BY `o`.`order_id` DESC
ERROR - 2025-11-18 18:34:04 --> Query error: Unknown column 'o.order_id' in 'on clause' - Invalid query: SELECT `o`.*, `p`.`product_img1`, `p`.`product_name`
FROM `orders` `o`
LEFT JOIN `order_product` `op` ON `op`.`order_id` = `o`.`order_id`
LEFT JOIN `product` `p` ON `p`.`id` = `op`.`product_id`
WHERE `o`.`user_id` = '48'
ORDER BY `o`.`order_id` DESC
ERROR - 2025-11-18 18:35:23 --> Query error: Unknown column 'p.product_img1' in 'field list' - Invalid query: SELECT `o`.*, `p`.`product_img1`, `p`.`product_name`
FROM `orders` `o`
LEFT JOIN `order_product` `op` ON `op`.`order_id` = `o`.`id`
WHERE `o`.`user_id` = '48'
ORDER BY `o`.`id` DESC
ERROR - 2025-11-18 18:36:47 --> Query error: Unknown column 'op.selling_price' in 'field list' - Invalid query: SELECT `o`.*, `op`.`order_id`, `op`.`product_name`, `op`.`product_image`, `op`.`quantity`, `op`.`price`, `op`.`selling_price`
FROM `orders` `o`
LEFT JOIN `order_product` `op` ON `op`.`order_id` = `o`.`id`
WHERE `o`.`user_id` = '48'
ORDER BY `o`.`id` DESC
ERROR - 2025-11-18 18:37:03 --> Query error: Unknown column 'op.selling_price' in 'field list' - Invalid query: SELECT `o`.*, `op`.`product_name`, `op`.`product_image`, `op`.`quantity`, `op`.`price`, `op`.`selling_price`
FROM `orders` `o`
LEFT JOIN `order_product` `op` ON `op`.`order_id` = `o`.`id`
WHERE `o`.`user_id` = '48'
ORDER BY `o`.`id` DESC
ERROR - 2025-11-18 18:39:49 --> Severity: Warning --> Undefined property: stdClass::$dob C:\xampp\htdocs\flora\application\views\profile_info.php 192
ERROR - 2025-11-18 18:39:49 --> Severity: Warning --> Undefined property: stdClass::$gender C:\xampp\htdocs\flora\application\views\profile_info.php 193
ERROR - 2025-11-18 18:42:49 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:42:49 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:43:00 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:43:00 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:43:12 --> Severity: Warning --> Undefined variable $occasions C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:43:12 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\flora\application\views\common\header.php 167
ERROR - 2025-11-18 18:43:39 --> Severity: error --> Exception: Call to undefined method Users_model::getAddressById() C:\xampp\htdocs\flora\application\controllers\Orders.php 94
ERROR - 2025-11-18 18:44:46 --> Could not find the language line "insert_batch() called with no data"
ERROR - 2025-11-18 18:49:49 --> Severity: error --> Exception: syntax error, unexpected identifier " " C:\xampp\htdocs\flora\application\controllers\Orders.php 103
ERROR - 2025-11-18 18:51:35 --> Could not find the language line "insert_batch() called with no data"
ERROR - 2025-11-18 18:51:39 --> Could not find the language line "insert_batch() called with no data"
ERROR - 2025-11-18 18:52:10 --> Could not find the language line "insert_batch() called with no data"
ERROR - 2025-11-18 18:53:43 --> Could not find the language line "insert_batch() called with no data"
ERROR - 2025-11-18 18:53:51 --> Could not find the language line "insert_batch() called with no data"
