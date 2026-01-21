<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-06-16 19:43:04 --> Severity: Warning --> Division by zero /var/www/html/flora/application/models/Cart_model.php 132
ERROR - 2024-06-16 19:58:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM cart
                    WHERE cart.user_id = '41'
    
                   ' at line 7 - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.cart_id) as cart_id,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.id as cart_id, cart.user_id, cart.product_id, cart.quantity,cart.price,
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.id as cart_id, addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-16 19:58:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM cart
                    WHERE cart.user_id = '41'
    
                   ' at line 7 - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.cart_id) as cart_id,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.id as cart_id, cart.user_id, cart.product_id, cart.quantity,cart.price,
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.id as cart_id, addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-16 20:00:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM cart
                    WHERE cart.user_id = '41'
    
                   ' at line 7 - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.cart_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_id,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.id as cart_id, cart.user_id, cart.product_id, cart.quantity,cart.price,
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.id as cart_id, addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-16 20:00:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM cart
                    WHERE cart.user_id = '41'
    
                   ' at line 7 - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.id as cart_id, cart.user_id, cart.product_id, cart.quantity,cart.price,
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.id as cart_id, addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-16 20:01:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM cart
                    WHERE cart.user_id = '41'
    
                   ' at line 7 - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price,
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-16 20:02:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM cart
                    WHERE cart.user_id = '41'
    
                   ' at line 7 - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price,
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-16 20:04:17 --> Query error: Expression #3 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'combined_data.cart_id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.cart_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.id as cart_id, cart.user_id, cart.product_id, cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.id as cart_id, addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-16 20:11:40 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.cart_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.id as cart_id, cart.user_id, cart.product_id, cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-16 20:12:41 --> Query error: Expression #3 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'combined_data.cart_id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.cart_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.id as cart_id, cart.user_id, cart.product_id, cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.id as addon_id, addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
