<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-08-14 01:24:30 --> Severity: error --> Exception: syntax error, unexpected ''" alt="Product 1" class="prod' (T_CONSTANT_ENCAPSED_STRING) /var/www/html/flora/application/controllers/Main.php 279
ERROR - 2024-08-14 01:27:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: select p.* from product p inner join category ct on ct.id = p.category_id inner join subcategory sb on sb.id = p.subcategory_id where active = 1 and (p.product_name like '%ferr%' or ct.category_name like '%ferr%'
ERROR - 2024-08-14 01:27:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: select p.* from product p inner join category ct on ct.id = p.category_id inner join subcategory sb on sb.id = p.subcategory_id where active = 1 and (p.product_name like '%ferre%' or ct.category_name like '%ferre%'
ERROR - 2024-08-14 01:29:35 --> Query error: Column 'active' in where clause is ambiguous - Invalid query: select p.* from product p inner join category ct on ct.id = p.category_id inner join subcategory sb on sb.id = p.subcategory_id where active = 1 and (p.product_name like '%ferr%' or ct.category_name like '%ferr%')
ERROR - 2024-08-14 02:13:33 --> Severity: Notice --> Trying to get property of non-object /var/www/html/flora/application/controllers/Main.php 293
ERROR - 2024-08-14 02:13:33 --> Severity: Notice --> Trying to get property of non-object /var/www/html/flora/application/controllers/Main.php 301
ERROR - 2024-08-14 02:13:33 --> Severity: Notice --> Undefined variable:  /var/www/html/flora/application/controllers/Main.php 302
ERROR - 2024-08-14 02:13:33 --> Severity: Notice --> Trying to get property of non-object /var/www/html/flora/application/controllers/Main.php 302
ERROR - 2024-08-14 02:13:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2024-08-14 02:16:57 --> Severity: Notice --> Undefined variable: product_name /var/www/html/flora/application/controllers/Main.php 286
ERROR - 2024-08-14 02:16:57 --> Severity: 4096 --> Object of class stdClass could not be converted to string /var/www/html/flora/application/controllers/Main.php 301
ERROR - 2024-08-14 02:16:57 --> Severity: Notice --> Undefined variable:  /var/www/html/flora/application/controllers/Main.php 301
ERROR - 2024-08-14 02:16:57 --> Severity: Notice --> Trying to get property of non-object /var/www/html/flora/application/controllers/Main.php 301
ERROR - 2024-08-14 02:16:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2024-08-14 02:18:24 --> Severity: 4096 --> Object of class stdClass could not be converted to string /var/www/html/flora/application/controllers/Main.php 301
ERROR - 2024-08-14 02:18:24 --> Severity: Notice --> Undefined variable:  /var/www/html/flora/application/controllers/Main.php 301
ERROR - 2024-08-14 02:18:24 --> Severity: Notice --> Trying to get property of non-object /var/www/html/flora/application/controllers/Main.php 301
ERROR - 2024-08-14 02:18:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from subcategory where subcategory.category_id=
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property CI_URI::$config is deprecated C:\xampp\htdocs\flora\system\core\URI.php 102
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property CI_Router::$uri is deprecated C:\xampp\htdocs\flora\system\core\Router.php 128
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$benchmark is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$hooks is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$config is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$log is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$utf8 is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$uri is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$exceptions is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$router is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$output is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$security is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$input is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$lang is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$db is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 397
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property CI_DB_mysqli_driver::$failover is deprecated C:\xampp\htdocs\flora\system\database\DB_driver.php 372
ERROR - 2024-08-14 10:27:33 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 303
ERROR - 2024-08-14 10:27:33 --> Severity: Warning --> session_set_cookie_params(): Session cookie parameters cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 328
ERROR - 2024-08-14 10:27:33 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 355
ERROR - 2024-08-14 10:27:33 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 365
ERROR - 2024-08-14 10:27:33 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 366
ERROR - 2024-08-14 10:27:33 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 367
ERROR - 2024-08-14 10:27:33 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 368
ERROR - 2024-08-14 10:27:33 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 426
ERROR - 2024-08-14 10:27:33 --> Severity: Warning --> session_set_save_handler(): Session save handler cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 110
ERROR - 2024-08-14 10:27:33 --> Severity: Warning --> session_start(): Session cannot be started after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 137
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$session is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 1284
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$encryption is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 1284
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$Product_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$Occasions_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$Category_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$Cart_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$Subcategory is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:27:33 --> Severity: 8192 --> Creation of dynamic property Main::$form_validation is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 1284
ERROR - 2024-08-14 10:27:33 --> Query error: Table 'flora.category' doesn't exist - Invalid query: SELECT * from category
ERROR - 2024-08-14 10:27:33 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\flora\system\core\Exceptions.php:272) C:\xampp\htdocs\flora\system\core\Common.php 571
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property CI_Router::$uri is deprecated C:\xampp\htdocs\flora\system\core\Router.php 128
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$benchmark is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$hooks is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$config is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$log is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$utf8 is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$uri is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$router is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$exceptions is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$output is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$security is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$input is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$lang is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$db is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 397
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property CI_DB_mysqli_driver::$failover is deprecated C:\xampp\htdocs\flora\system\database\DB_driver.php 372
ERROR - 2024-08-14 10:28:55 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 303
ERROR - 2024-08-14 10:28:55 --> Severity: Warning --> session_set_cookie_params(): Session cookie parameters cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 328
ERROR - 2024-08-14 10:28:55 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 355
ERROR - 2024-08-14 10:28:55 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 365
ERROR - 2024-08-14 10:28:55 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 366
ERROR - 2024-08-14 10:28:55 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 367
ERROR - 2024-08-14 10:28:55 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 368
ERROR - 2024-08-14 10:28:55 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 426
ERROR - 2024-08-14 10:28:55 --> Severity: Warning --> session_set_save_handler(): Session save handler cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 110
ERROR - 2024-08-14 10:28:55 --> Severity: Warning --> session_start(): Session cannot be started after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 137
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$session is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 1284
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$encryption is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 1284
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$Product_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$Occasions_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$Category_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$Cart_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$Subcategory is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:28:55 --> Severity: 8192 --> Creation of dynamic property Main::$form_validation is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 1284
ERROR - 2024-08-14 10:28:55 --> Query error: Table 'flora.category' doesn't exist - Invalid query: SELECT * from category
ERROR - 2024-08-14 10:28:55 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\flora\system\core\Exceptions.php:272) C:\xampp\htdocs\flora\system\core\Common.php 571
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$benchmark is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$hooks is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$config is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$log is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$utf8 is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$uri is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$router is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$output is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$security is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$input is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$lang is deprecated C:\xampp\htdocs\flora\system\core\Controller.php 83
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$db is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 397
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property CI_DB_mysqli_driver::$failover is deprecated C:\xampp\htdocs\flora\system\database\DB_driver.php 372
ERROR - 2024-08-14 10:29:13 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 303
ERROR - 2024-08-14 10:29:13 --> Severity: Warning --> session_set_cookie_params(): Session cookie parameters cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 328
ERROR - 2024-08-14 10:29:13 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 355
ERROR - 2024-08-14 10:29:13 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 365
ERROR - 2024-08-14 10:29:13 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 366
ERROR - 2024-08-14 10:29:13 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 367
ERROR - 2024-08-14 10:29:13 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 368
ERROR - 2024-08-14 10:29:13 --> Severity: Warning --> ini_set(): Session ini settings cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 426
ERROR - 2024-08-14 10:29:13 --> Severity: Warning --> session_set_save_handler(): Session save handler cannot be changed after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 110
ERROR - 2024-08-14 10:29:13 --> Severity: Warning --> session_start(): Session cannot be started after headers have already been sent C:\xampp\htdocs\flora\system\libraries\Session\Session.php 137
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$session is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 1284
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$encryption is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 1284
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$Product_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$Occasions_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$Category_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$Cart_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$Subcategory is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 359
ERROR - 2024-08-14 10:29:13 --> Severity: 8192 --> Creation of dynamic property Main::$form_validation is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 1284
ERROR - 2024-08-14 10:29:13 --> Query error: Table 'flora.category' doesn't exist - Invalid query: SELECT * from category
ERROR - 2024-08-14 10:29:13 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\flora\system\core\Exceptions.php:272) C:\xampp\htdocs\flora\system\core\Common.php 571
ERROR - 2024-08-14 10:29:28 --> Severity: 8192 --> Creation of dynamic property CI_DB_mysqli_driver::$failover is deprecated C:\xampp\htdocs\flora\system\database\DB_driver.php 372
ERROR - 2024-08-14 10:29:28 --> Query error: Table 'flora.category' doesn't exist - Invalid query: SELECT * from category
ERROR - 2024-08-14 10:29:59 --> Query error: Table 'flora.category' doesn't exist - Invalid query: SELECT * from category
ERROR - 2024-08-14 10:50:21 --> Severity: error --> Exception: Call to undefined method Cart_Model::get_allcart() C:\xampp\htdocs\flora\application\controllers\Main.php 41
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$load is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$benchmark is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$hooks is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$config is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$log is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$utf8 is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$uri is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$router is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$output is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$security is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$input is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$lang is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$db is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$session is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$encryption is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$Product_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$Occasions_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$Category_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$Cart_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$Subcategory is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:18 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$form_validation is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$load is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$benchmark is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$hooks is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$config is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$log is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$utf8 is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$uri is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$router is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$output is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$security is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$input is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$lang is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$db is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$session is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$encryption is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$Product_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$Occasions_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$Category_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$Cart_model is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$Subcategory is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
ERROR - 2024-08-14 14:17:28 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$form_validation is deprecated C:\xampp\htdocs\flora\system\core\Loader.php 932
