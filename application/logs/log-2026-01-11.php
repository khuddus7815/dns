<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-11 11:34:15 --> Query error: Table 'dns.wishlist' doesn't exist - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `wishlist`
WHERE `user_id` = '47'
AND `product_id` = '162'
ERROR - 2026-01-11 11:51:29 --> Query error: Table 'dns.wishlist' doesn't exist - Invalid query: SELECT `w`.`id` as `wishlist_id`, `p`.*
FROM `wishlist` `w`
JOIN `product` `p` ON `w`.`product_id` = `p`.`id`
WHERE `w`.`user_id` = '47'
ERROR - 2026-01-11 11:52:46 --> Query error: Table 'dns.wishlist' doesn't exist - Invalid query: SELECT `w`.`id` as `wishlist_id`, `p`.*
FROM `wishlist` `w`
JOIN `product` `p` ON `w`.`product_id` = `p`.`id`
WHERE `w`.`user_id` = '47'
ERROR - 2026-01-11 11:56:38 --> Query error: Table 'dns.wishlist' doesn't exist - Invalid query: SELECT `w`.`id` as `wishlist_id`, `p`.*
FROM `wishlist` `w`
JOIN `product` `p` ON `w`.`product_id` = `p`.`id`
WHERE `w`.`user_id` = '47'
ERROR - 2026-01-11 11:58:10 --> Query error: Table 'dns.wishlist' doesn't exist - Invalid query: SELECT `w`.`id` as `wishlist_id`, `p`.*
FROM `wishlist` `w`
JOIN `product` `p` ON `w`.`product_id` = `p`.`id`
WHERE `w`.`user_id` = '47'
ERROR - 2026-01-11 18:22:57 --> Update Address Error: No changes were made to the address. Please check your data and try again.
ERROR - 2026-01-11 18:28:56 --> Update Address Error: Update query executed but no rows were affected. Please try again.
ERROR - 2026-01-11 18:30:54 --> Update address - No rows affected but address exists. ID: 77, User ID: 47
ERROR - 2026-01-11 18:30:54 --> Current DB data: {"id":"77","user_id":"47","address":"ajfhlsjdfhlakh","pincode":"7863496","phone":"987654322","alt_phone":null,"locality":"hdjahfhweu","city_twn":"ajhlfjhs","state_id":"0","landmark":null,"created_at":"2026-01-11 21:35:08","updated_at":"2026-01-11 21:35:08","fullname":"test"}
ERROR - 2026-01-11 18:30:54 --> Attempted update data: {"user_id":"47","fullname":"test","phone":"987654322","alt_phone":null,"locality":"hdjahfhweu","city_twn":"ajhlfjhs","landmark":null,"pincode":"7863496","address":"ajfhlsjdfhlakh","state_id":"Andhra Pradesh"}
ERROR - 2026-01-11 18:30:54 --> Update Address Error: Update completed but no changes were saved. The data may be identical or there may be a database constraint preventing the update.
ERROR - 2026-01-11 19:07:37 --> Query error: Unknown column 'delivery_charge' in 'field list' - Invalid query: INSERT INTO `orders` (`order_number`, `status`, `user_id`, `address_id`, `payment_mode`, `tot_amount`, `delivery_charge`, `delivery_method`, `discount_amount`, `coupon_code`, `razorpay_order_id`) VALUES ('6963f4f9640a31768158457', '0', '47', '76', 'RAZORPAY', 3154, '20.00', 'standard', '100.00', 'SAVE10', NULL)
ERROR - 2026-01-11 19:07:41 --> Query error: Unknown column 'delivery_charge' in 'field list' - Invalid query: INSERT INTO `orders` (`order_number`, `status`, `user_id`, `address_id`, `payment_mode`, `tot_amount`, `delivery_charge`, `delivery_method`, `discount_amount`, `coupon_code`, `razorpay_order_id`) VALUES ('6963f4fd2cbbc1768158461', '0', '47', '76', 'RAZORPAY', 3154, '20.00', 'standard', '100.00', 'SAVE10', NULL)
ERROR - 2026-01-11 19:10:32 --> Query error: Unknown column 'delivery_charge' in 'field list' - Invalid query: INSERT INTO `orders` (`order_number`, `status`, `user_id`, `address_id`, `payment_mode`, `tot_amount`, `delivery_charge`, `delivery_method`, `discount_amount`, `coupon_code`, `razorpay_order_id`) VALUES ('6963f5a8660fc1768158632', '0', '47', '76', 'RAZORPAY', 3154, '20.00', 'standard', '100.00', 'SAVE10', NULL)
ERROR - 2026-01-11 19:14:46 --> Query error: Unknown column 'delivery_charge' in 'field list' - Invalid query: INSERT INTO `orders` (`order_number`, `status`, `user_id`, `address_id`, `payment_mode`, `tot_amount`, `delivery_charge`, `delivery_method`, `discount_amount`, `coupon_code`) VALUES ('6963f6a69f9f51768158886', '0', '47', '76', 'RAZORPAY', 3154, '20.00', 'standard', '100.00', 'SAVE10')
ERROR - 2026-01-11 19:21:25 --> Query error: Unknown column 'delivery_charge' in 'field list' - Invalid query: INSERT INTO `orders` (`order_number`, `status`, `user_id`, `address_id`, `payment_mode`, `tot_amount`, `delivery_charge`, `delivery_method`, `discount_amount`, `coupon_code`, `razorpay_order_id`, `razorpay_payment_id`, `razorpay_signature`) VALUES ('6963f835b29b61768159285', '0', '47', '76', 'RAZORPAY', 3154, '20.00', 'standard', '100.00', 'SAVE10', NULL, NULL, NULL)
ERROR - 2026-01-11 19:21:52 --> Query error: Unknown column 'delivery_charge' in 'field list' - Invalid query: INSERT INTO `orders` (`order_number`, `status`, `user_id`, `address_id`, `payment_mode`, `tot_amount`, `delivery_charge`, `delivery_method`, `discount_amount`, `coupon_code`, `razorpay_order_id`, `razorpay_payment_id`, `razorpay_signature`) VALUES ('6963f85087dff1768159312', '0', '47', '76', 'RAZORPAY', 3154, '20.00', 'standard', '100.00', 'SAVE10', NULL, NULL, NULL)
ERROR - 2026-01-11 19:25:25 --> Query error: Unknown column 'delivery_charge' in 'field list' - Invalid query: INSERT INTO `orders` (`order_number`, `status`, `user_id`, `address_id`, `payment_mode`, `tot_amount`, `delivery_charge`, `delivery_method`, `discount_amount`, `coupon_code`, `razorpay_order_id`, `razorpay_payment_id`, `razorpay_signature`) VALUES ('6963f925194f61768159525', '0', '47', '76', 'RAZORPAY', 3154, '20.00', 'standard', '100.00', 'SAVE10', NULL, NULL, NULL)
ERROR - 2026-01-11 19:32:42 --> Razorpay CURL Error: SSL certificate problem: self-signed certificate in certificate chain
ERROR - 2026-01-11 19:32:42 --> Razorpay Order Creation Error: Network error: SSL certificate problem: self-signed certificate in certificate chain
ERROR - 2026-01-11 19:32:42 --> Stack Trace: #0 C:\xampp\htdocs\dns\system\core\CodeIgniter.php(533): Orders->create_razorpay_order()
#1 C:\xampp\htdocs\dns\index.php(290): require_once('C:\\xampp\\htdocs...')
#2 {main}
ERROR - 2026-01-11 20:30:20 --> Severity: Warning --> Undefined property: CI_Loader::$main C:\xampp\htdocs\dns\application\views\profile_partials\address_section.php 20
ERROR - 2026-01-11 20:30:20 --> Severity: error --> Exception: Call to a member function get_state_name() on null C:\xampp\htdocs\dns\application\views\profile_partials\address_section.php 20
ERROR - 2026-01-11 20:30:43 --> Severity: Warning --> Undefined property: CI_Loader::$main C:\xampp\htdocs\dns\application\views\profile_partials\address_section.php 20
ERROR - 2026-01-11 20:30:43 --> Severity: error --> Exception: Call to a member function get_state_name() on null C:\xampp\htdocs\dns\application\views\profile_partials\address_section.php 20
ERROR - 2026-01-11 20:30:52 --> Severity: Warning --> Undefined property: CI_Loader::$main C:\xampp\htdocs\dns\application\views\profile_partials\address_section.php 20
ERROR - 2026-01-11 20:30:52 --> Severity: error --> Exception: Call to a member function get_state_name() on null C:\xampp\htdocs\dns\application\views\profile_partials\address_section.php 20
ERROR - 2026-01-11 20:30:57 --> Severity: Warning --> Undefined property: CI_Loader::$main C:\xampp\htdocs\dns\application\views\profile_partials\address_section.php 20
ERROR - 2026-01-11 20:30:57 --> Severity: error --> Exception: Call to a member function get_state_name() on null C:\xampp\htdocs\dns\application\views\profile_partials\address_section.php 20
ERROR - 2026-01-11 20:31:00 --> Severity: Warning --> Undefined property: CI_Loader::$main C:\xampp\htdocs\dns\application\views\profile_partials\address_section.php 20
ERROR - 2026-01-11 20:31:00 --> Severity: error --> Exception: Call to a member function get_state_name() on null C:\xampp\htdocs\dns\application\views\profile_partials\address_section.php 20
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "address_id" on false C:\xampp\htdocs\dns\application\controllers\Main.php 153
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "product_image" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "product_name" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "quantity" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "order_number" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "created_at" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:17 --> Severity: 8192 --> strtotime(): Passing null to parameter #1 ($datetime) of type string is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $address C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "address" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:17 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "address_id" on false C:\xampp\htdocs\dns\application\controllers\Main.php 153
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "product_image" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "product_name" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "quantity" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "order_number" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "created_at" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:17 --> Severity: 8192 --> strtotime(): Passing null to parameter #1 ($datetime) of type string is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $address C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "address" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:17 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:18 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "address_id" on false C:\xampp\htdocs\dns\application\controllers\Main.php 153
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "product_image" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "product_name" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "quantity" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "order_number" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "created_at" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:18 --> Severity: 8192 --> strtotime(): Passing null to parameter #1 ($datetime) of type string is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $address C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "address" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:18 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 20:51:18 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "address_id" on false C:\xampp\htdocs\dns\application\controllers\Main.php 153
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "product_image" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "product_name" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "quantity" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "order_number" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "created_at" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:37 --> Severity: 8192 --> strtotime(): Passing null to parameter #1 ($datetime) of type string is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Undefined variable $address C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "address" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:37 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 20:51:37 --> Severity: Warning --> Attempt to read property "address_id" on false C:\xampp\htdocs\dns\application\controllers\Main.php 153
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "product_image" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "product_name" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "quantity" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "order_number" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "created_at" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:38 --> Severity: 8192 --> strtotime(): Passing null to parameter #1 ($datetime) of type string is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $address C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "address" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:38 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "address_id" on false C:\xampp\htdocs\dns\application\controllers\Main.php 153
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "product_image" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "product_name" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "quantity" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "order_number" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "created_at" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:38 --> Severity: 8192 --> strtotime(): Passing null to parameter #1 ($datetime) of type string is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $address C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "address" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:38 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 20:51:38 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "address_id" on false C:\xampp\htdocs\dns\application\controllers\Main.php 153
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "product_image" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "product_name" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "quantity" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "order_number" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "created_at" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 21:00:46 --> Severity: 8192 --> strtotime(): Passing null to parameter #1 ($datetime) of type string is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $address C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "address" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 21:00:46 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "address_id" on false C:\xampp\htdocs\dns\application\controllers\Main.php 153
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "product_image" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "product_name" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "quantity" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "order_number" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "created_at" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 21:00:46 --> Severity: 8192 --> strtotime(): Passing null to parameter #1 ($datetime) of type string is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $address C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "address" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 21:00:46 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 21:00:46 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "address_id" on false C:\xampp\htdocs\dns\application\controllers\Main.php 153
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "product_image" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 12
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "product_name" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 17
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "quantity" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 19
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 22
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "order_number" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 72
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "created_at" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 21:00:47 --> Severity: 8192 --> strtotime(): Passing null to parameter #1 ($datetime) of type string is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 74
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Undefined variable $address C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "address" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 79
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "payment_mode" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 84
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 21:00:47 --> Severity: 8192 --> number_format(): Passing null to parameter #1 ($num) of type float is deprecated C:\xampp\htdocs\dns\application\views\order_detail_page.php 92
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Undefined variable $order C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 21:00:47 --> Severity: Warning --> Attempt to read property "price" on null C:\xampp\htdocs\dns\application\views\order_detail_page.php 106
ERROR - 2026-01-11 21:12:01 --> Query error: Unknown column 'p.product_image' in 'field list' - Invalid query: SELECT `op`.*, `p`.`product_name`, `p`.`product_img1`, `p`.`product_image`, `p`.`selling_price`, `p`.`price` as `original_product_price`
FROM `order_product` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '79'
ERROR - 2026-01-11 21:12:24 --> Query error: Unknown column 'p.product_image' in 'field list' - Invalid query: SELECT `op`.*, `p`.`product_name`, `p`.`product_img1`, `p`.`product_image`, `p`.`selling_price`, `p`.`price` as `original_product_price`
FROM `order_product` `op`
LEFT JOIN `product` `p` ON `op`.`product_id` = `p`.`id`
WHERE `op`.`order_id` = '79'
ERROR - 2026-01-11 21:13:54 --> 404 Page Not Found: 
ERROR - 2026-01-11 21:13:54 --> 404 Page Not Found: 
ERROR - 2026-01-11 21:13:55 --> 404 Page Not Found: 
ERROR - 2026-01-11 22:00:19 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\admin\common\sidebar.php 8
ERROR - 2026-01-11 22:00:19 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\admin\common\sidebar.php 8
ERROR - 2026-01-11 22:03:06 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:06 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:13 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:13 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:15 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:15 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:17 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:17 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:24 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:24 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:28 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:28 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:03:31 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\common\preload.php 13
ERROR - 2026-01-11 22:03:31 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\common\preload.php 13
ERROR - 2026-01-11 22:03:47 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\common\preload.php 13
ERROR - 2026-01-11 22:03:47 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\common\preload.php 13
ERROR - 2026-01-11 22:04:10 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\common\preload.php 13
ERROR - 2026-01-11 22:04:10 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\common\preload.php 13
ERROR - 2026-01-11 22:04:14 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\common\preload.php 13
ERROR - 2026-01-11 22:04:14 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\common\preload.php 13
ERROR - 2026-01-11 22:04:19 --> Severity: Warning --> Undefined property: CI_Loader::$Settings_model C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:04:19 --> Severity: error --> Exception: Call to a member function get_setting() on null C:\xampp\htdocs\dns\application\views\admin\common\header.php 11
ERROR - 2026-01-11 22:08:10 --> Severity: 8192 --> Optional parameter $delivery_charge declared before required parameter $total_amount is implicitly treated as a required parameter C:\xampp\htdocs\dns\application\models\Invoice_model.php 14
ERROR - 2026-01-11 22:08:10 --> Severity: 8192 --> Optional parameter $discount_amount declared before required parameter $total_amount is implicitly treated as a required parameter C:\xampp\htdocs\dns\application\models\Invoice_model.php 0
ERROR - 2026-01-11 22:08:10 --> Severity: Warning --> Undefined variable $tot_amount C:\xampp\htdocs\dns\application\controllers\Orders.php 723
ERROR - 2026-01-11 22:08:10 --> Severity: Warning --> Undefined variable $delivery_cost C:\xampp\htdocs\dns\application\controllers\Orders.php 723
ERROR - 2026-01-11 22:08:10 --> Severity: Warning --> Undefined variable $discount_amount C:\xampp\htdocs\dns\application\controllers\Orders.php 723
ERROR - 2026-01-11 22:08:10 --> Severity: Warning --> Undefined variable $final_total C:\xampp\htdocs\dns\application\controllers\Orders.php 723
ERROR - 2026-01-11 22:08:10 --> Query error: Column 'subtotal' cannot be null - Invalid query: INSERT INTO `invoices` (`invoice_number`, `order_id`, `user_id`, `invoice_date`, `subtotal`, `delivery_charge`, `discount_amount`, `total_amount`, `status`) VALUES ('INV-20260111-69641F4A5D25F', '81', '47', '2026-01-11 22:08:10', NULL, NULL, NULL, NULL, 'active')
ERROR - 2026-01-11 22:08:41 --> Severity: 8192 --> Optional parameter $delivery_charge declared before required parameter $total_amount is implicitly treated as a required parameter C:\xampp\htdocs\dns\application\models\Invoice_model.php 14
ERROR - 2026-01-11 22:08:41 --> Severity: 8192 --> Optional parameter $discount_amount declared before required parameter $total_amount is implicitly treated as a required parameter C:\xampp\htdocs\dns\application\models\Invoice_model.php 0
ERROR - 2026-01-11 22:08:41 --> Severity: Warning --> Undefined variable $tot_amount C:\xampp\htdocs\dns\application\controllers\Orders.php 723
ERROR - 2026-01-11 22:08:41 --> Severity: Warning --> Undefined variable $delivery_cost C:\xampp\htdocs\dns\application\controllers\Orders.php 723
ERROR - 2026-01-11 22:08:41 --> Severity: Warning --> Undefined variable $discount_amount C:\xampp\htdocs\dns\application\controllers\Orders.php 723
ERROR - 2026-01-11 22:08:41 --> Severity: Warning --> Undefined variable $final_total C:\xampp\htdocs\dns\application\controllers\Orders.php 723
ERROR - 2026-01-11 22:08:41 --> Query error: Column 'subtotal' cannot be null - Invalid query: INSERT INTO `invoices` (`invoice_number`, `order_id`, `user_id`, `invoice_date`, `subtotal`, `delivery_charge`, `discount_amount`, `total_amount`, `status`) VALUES ('INV-20260111-69641F692AE13', '82', '47', '2026-01-11 22:08:41', NULL, NULL, NULL, NULL, 'active')
