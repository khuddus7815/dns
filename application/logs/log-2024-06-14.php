<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-06-14 14:45:54 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:45:55 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:45:57 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:45:58 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:45:59 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:45:59 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:45:59 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:45:59 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:45:59 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:45:59 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:45:59 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:45:59 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:00 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:00 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:00 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:00 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:13 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:16 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:16 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:16 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:17 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:17 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:17 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:17 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:18 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:19 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:20 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:20 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:21 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:21 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:21 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:21 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:21 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:21 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:22 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:22 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:23 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:25 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:46:28 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price as cart_price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:51:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'product.id AS id, product.product_name, product.price, 
                       p' at line 3 - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,combined_data.price as cart_price
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-14 14:52:08 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'combined_data.price' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT combined_data.user_id, combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,combined_data.price as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
