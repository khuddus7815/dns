<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-06-19 15:45:03 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.cart_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.id as cart_id, cart.user_id, cart.product_id, cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = NULL
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = NULL
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-19 15:50:40 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.cart_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.id as cart_id, cart.user_id, cart.product_id, cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = NULL
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = NULL
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-19 15:50:50 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.cart_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.id as cart_id, cart.user_id, cart.product_id, cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = NULL
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = NULL
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-19 15:51:37 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.cart_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.id as cart_id, cart.user_id, cart.product_id, cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = NULL
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = NULL
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-19 15:53:00 --> Query error: Unknown column 'combined_data.cart_id' in 'field list' - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.cart_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = NULL
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = NULL
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-06-19 15:53:01 --> Query error: Unknown column 'combined_data.cart_id' in 'field list' - Invalid query: SELECT combined_data.user_id, combined_data.product_id,combined_data.cart_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description, product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = NULL
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = NULL
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
