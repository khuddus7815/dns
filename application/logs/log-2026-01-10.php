<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-10 19:50:56 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it C:\xampp\htdocs\dns\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2026-01-10 19:50:56 --> Unable to connect to the database
ERROR - 2026-01-10 19:51:08 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it C:\xampp\htdocs\dns\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2026-01-10 19:51:08 --> Unable to connect to the database
ERROR - 2026-01-10 19:51:50 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it C:\xampp\htdocs\dns\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2026-01-10 19:51:50 --> Unable to connect to the database
ERROR - 2026-01-10 19:58:47 --> Query error: Table 'dns.category' doesn't exist in engine - Invalid query: SELECT * from category
ERROR - 2026-01-10 19:58:55 --> Query error: Table 'dns.category' doesn't exist in engine - Invalid query: SELECT * from category
ERROR - 2026-01-10 19:59:52 --> Query error: Table 'dns.category' doesn't exist in engine - Invalid query: SELECT * from category
ERROR - 2026-01-10 21:01:45 --> Query error: Table 'dns.delivery_charges' doesn't exist - Invalid query: SELECT *
FROM `delivery_charges`
ERROR - 2026-01-10 21:15:11 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\dns\application\views\product_detail.php 77
ERROR - 2026-01-10 21:15:11 --> Severity: Warning --> Undefined property: stdClass::$amount C:\xampp\htdocs\dns\application\views\product_detail.php 78
ERROR - 2026-01-10 21:22:58 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\dns\application\views\product_detail.php 77
ERROR - 2026-01-10 21:22:58 --> Severity: Warning --> Undefined property: stdClass::$amount C:\xampp\htdocs\dns\application\views\product_detail.php 78
ERROR - 2026-01-10 21:50:18 --> Query error: Unknown column 'op.selling_price' in 'field list' - Invalid query: SELECT `o`.*, `op`.`product_name`, `op`.`product_image`, `op`.`quantity`, `op`.`price`, `op`.`selling_price`, `op`.`variant_weight`
FROM `orders` `o`
LEFT JOIN `order_product` `op` ON `op`.`order_id` = `o`.`id`
WHERE `o`.`user_id` = '47'
ORDER BY `o`.`id` DESC
ERROR - 2026-01-10 21:50:33 --> Query error: Unknown column 'op.selling_price' in 'field list' - Invalid query: SELECT `o`.*, `op`.`product_name`, `op`.`product_image`, `op`.`quantity`, `op`.`price`, `op`.`selling_price`, `op`.`variant_weight`
FROM `orders` `o`
LEFT JOIN `order_product` `op` ON `op`.`order_id` = `o`.`id`
WHERE `o`.`user_id` = '47'
ORDER BY `o`.`id` DESC
ERROR - 2026-01-10 21:50:37 --> Query error: Unknown column 'op.selling_price' in 'field list' - Invalid query: SELECT `o`.*, `op`.`product_name`, `op`.`product_image`, `op`.`quantity`, `op`.`price`, `op`.`selling_price`, `op`.`variant_weight`
FROM `orders` `o`
LEFT JOIN `order_product` `op` ON `op`.`order_id` = `o`.`id`
WHERE `o`.`user_id` = '47'
ORDER BY `o`.`id` DESC
ERROR - 2026-01-10 21:51:33 --> Query error: Unknown column 'op.selling_price' in 'field list' - Invalid query: SELECT `o`.*, `op`.`product_name`, `op`.`product_image`, `op`.`quantity`, `op`.`price`, `op`.`selling_price`, `op`.`variant_weight`
FROM `orders` `o`
LEFT JOIN `order_product` `op` ON `op`.`order_id` = `o`.`id`
WHERE `o`.`user_id` = '47'
ORDER BY `o`.`id` DESC
ERROR - 2026-01-10 21:53:28 --> Query error: Table 'dns.coupons' doesn't exist - Invalid query: SELECT *
FROM `coupons`
ERROR - 2026-01-10 21:58:38 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\dns\application\views\product_detail.php 77
ERROR - 2026-01-10 21:58:38 --> Severity: Warning --> Undefined property: stdClass::$amount C:\xampp\htdocs\dns\application\views\product_detail.php 78
ERROR - 2026-01-10 21:59:55 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\dns\application\views\admin\delivery_charges.php 77
ERROR - 2026-01-10 21:59:55 --> Severity: Warning --> Undefined property: stdClass::$amount C:\xampp\htdocs\dns\application\views\admin\delivery_charges.php 79
ERROR - 2026-01-10 22:01:32 --> Query error: Unknown column 'name' in 'field list' - Invalid query: INSERT INTO `delivery_charges` (`name`, `amount`, `status`) VALUES ('standard', '20', 1)
