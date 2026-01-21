<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-13 18:48:15 --> Update Order Status Request: Order ID: 85, Status: 2
ERROR - 2026-01-13 18:48:15 --> Order Update Result: Success
ERROR - 2026-01-13 18:48:24 --> Update Order Status Request: Order ID: 85, Status: 0
ERROR - 2026-01-13 18:48:24 --> Order Update Result: Success
ERROR - 2026-01-13 18:49:29 --> Update Order Status Request: Order ID: 86, Status: 0
ERROR - 2026-01-13 18:49:29 --> Order Update Result: Success
ERROR - 2026-01-13 18:55:25 --> Update Order Status Request: Order ID: 86, Status: 2
ERROR - 2026-01-13 18:55:25 --> Order Update Result: Success
ERROR - 2026-01-13 18:55:33 --> Update Order Status Request: Order ID: 86, Status: 3
ERROR - 2026-01-13 18:55:33 --> Order Update Result: Success
ERROR - 2026-01-13 18:55:40 --> Update Order Status Request: Order ID: 86, Status: 0
ERROR - 2026-01-13 18:55:40 --> Order Update Result: Success
ERROR - 2026-01-13 18:58:15 --> Update Order Status Request: Order ID: 86, Status: 4
ERROR - 2026-01-13 18:58:15 --> Order Update Result: Success
ERROR - 2026-01-13 18:58:27 --> Update Order Status Request: Order ID: 86, Status: 0
ERROR - 2026-01-13 18:58:27 --> Order Update Result: Success
ERROR - 2026-01-13 19:09:35 --> Update Order Status Request: Order ID: 86, Status: 4
ERROR - 2026-01-13 19:09:35 --> Order Update Result: Success
ERROR - 2026-01-13 19:09:43 --> Update Order Status Request: Order ID: 86, Status: 0
ERROR - 2026-01-13 19:09:43 --> Order Update Result: Success
ERROR - 2026-01-13 19:09:43 --> Attempting to create cancellation notification for Order ID: 86
ERROR - 2026-01-13 19:09:43 --> Notification created with ID: 18
ERROR - 2026-01-13 19:45:06 --> Query error: Unknown column 'profile_pic' in 'field list' - Invalid query: UPDATE `users` SET `username` = 'Dnsadmin', `email` = 'dns@admin.com', `mobile` = '0', `profile_pic` = 'admin_48_1768333506.jpg'
WHERE `id` = '48'
ERROR - 2026-01-13 19:47:49 --> Query error: Cannot delete or update a parent row: a foreign key constraint fails (`dns`.`occasion_product`, CONSTRAINT `occasion_product_ibfk_1` FOREIGN KEY (`occasion_id`) REFERENCES `occasion` (`id`)) - Invalid query: DELETE FROM `occasion`
WHERE `id` = '15'
ERROR - 2026-01-13 19:49:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 19:50:10 --> Query error: Cannot delete or update a parent row: a foreign key constraint fails (`dns`.`cart`, CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)) - Invalid query: DELETE FROM `product`
WHERE `id` = '6'
ERROR - 2026-01-13 19:50:24 --> Query error: Cannot delete or update a parent row: a foreign key constraint fails (`dns`.`occasion_product`, CONSTRAINT `occasion_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)) - Invalid query: DELETE FROM `product`
WHERE `id` = '9'
ERROR - 2026-01-13 19:50:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 19:55:38 --> Severity: Warning --> Undefined variable $subcategory C:\xampp\htdocs\dns\application\views\category_detail.php 123
ERROR - 2026-01-13 19:55:38 --> Severity: Warning --> Attempt to read property "category_id" on null C:\xampp\htdocs\dns\application\views\category_detail.php 123
ERROR - 2026-01-13 19:58:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 19:58:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 19:59:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 20:00:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 20:00:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 20:00:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 20:01:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 20:01:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 20:01:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 20:03:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 20:04:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2026-01-13 20:19:00 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\dns\application\views\common\header.php 66
ERROR - 2026-01-13 20:24:32 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\dns\application\views\common\header.php 66
ERROR - 2026-01-13 20:51:35 --> Update Order Status Request: Order ID: 87, Status: 4
ERROR - 2026-01-13 20:51:35 --> Order Update Result: Success
ERROR - 2026-01-13 21:45:25 --> Severity: Warning --> Undefined property: stdClass::$product_img1 C:\xampp\htdocs\dns\application\views\admin\orderdetails_page.php 40
ERROR - 2026-01-13 21:45:31 --> Severity: Warning --> Undefined property: stdClass::$product_img1 C:\xampp\htdocs\dns\application\views\admin\orderdetails_page.php 40
ERROR - 2026-01-13 21:47:32 --> Severity: Warning --> Undefined property: stdClass::$product_img1 C:\xampp\htdocs\dns\application\views\admin\orderdetails_page.php 40
