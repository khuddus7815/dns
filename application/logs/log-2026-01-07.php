<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-07 19:40:38 --> Query error: Cannot delete or update a parent row: a foreign key constraint fails (`dns`.`subcategory`, CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)) - Invalid query: DELETE FROM `category`
WHERE `id` = '15'
ERROR - 2026-01-07 19:40:52 --> Query error: Cannot delete or update a parent row: a foreign key constraint fails (`dns`.`subcategory`, CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)) - Invalid query: DELETE FROM `category`
WHERE `id` = '15'
ERROR - 2026-01-07 19:45:27 --> Query error: Cannot delete or update a parent row: a foreign key constraint fails (`dns`.`subcategory`, CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)) - Invalid query: DELETE FROM `category`
WHERE `id` = '15'
ERROR - 2026-01-07 19:48:37 --> Query error: Cannot delete or update a parent row: a foreign key constraint fails (`dns`.`occasion_product`, CONSTRAINT `occasion_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)) - Invalid query: DELETE FROM `product`
WHERE `category_id` = '15'
ERROR - 2026-01-07 20:07:26 --> Query error: Cannot delete or update a parent row: a foreign key constraint fails (`dns`.`occasion_product`, CONSTRAINT `occasion_product_ibfk_1` FOREIGN KEY (`occasion_id`) REFERENCES `occasion` (`id`)) - Invalid query: DELETE FROM `occasion`
WHERE `id` = '15'
