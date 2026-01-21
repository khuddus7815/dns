<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-08-03 16:08:10 --> Query error: Unknown column 'addon_cart.unit' in 'field list' - Invalid query: SELECT combined_data.user_id,combined_data.unit,combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description,product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, addon_cart.unit ,cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id,  addon_cart.quantity, addon_cart.unit ,addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-08-03 16:09:33 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'combined_data.unit' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT combined_data.user_id,combined_data.unit,combined_data.product_id, 
                       SUM(combined_data.quantity) as quantity,SUM(combined_data.price) as cart_price,
                       product.id AS id, product.product_name, product.price, 
                       product.selling_price, product.description,product.product_img1
                FROM (
                    SELECT cart.user_id, cart.product_id, cart.unit ,cart.quantity,cart.price
                    FROM cart
                    WHERE cart.user_id = '41'
    
                    UNION ALL
    
                    SELECT addon_cart.user_id, addon_cart.addon_id AS product_id,  addon_cart.quantity, addon_cart.unit ,addon_cart.price 
                    FROM addon_cart
                    WHERE addon_cart.user_id = '41'
                ) AS combined_data
                LEFT JOIN product ON product.id = combined_data.product_id
                GROUP BY combined_data.user_id, combined_data.product_id
ERROR - 2024-08-03 16:13:49 --> Severity: Notice --> Trying to get property of non-object /var/www/html/flora/application/models/Cart_model.php 133
ERROR - 2024-08-03 16:13:49 --> Severity: Notice --> Trying to get property of non-object /var/www/html/flora/application/models/Cart_model.php 133
ERROR - 2024-08-03 16:13:50 --> Severity: Notice --> Trying to get property of non-object /var/www/html/flora/application/models/Cart_model.php 133
ERROR - 2024-08-03 16:16:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/flora/application/models/Cart_model.php 133
ERROR - 2024-08-03 16:16:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/flora/application/models/Cart_model.php 133
ERROR - 2024-08-03 16:16:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/flora/application/models/Cart_model.php 133
ERROR - 2024-08-03 16:24:56 --> Severity: Warning --> Division by zero /var/www/html/flora/application/models/Cart_model.php 135
