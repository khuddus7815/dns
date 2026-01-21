<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Custom Routing
$route['category_list/(:any)'] = 'Main/category_page/$1';
$route['product/(:num)'] = 'Main/product_detail/$1';
$route['order_summary'] = 'Main/order_summary';
$route['cart'] = 'Main/cart';
$route['wishlist'] = 'Main/wishlist';
$route['contact'] = 'Main/contact';
$route['checkout'] = 'Main/checkout';
$route['about_us'] = 'Main/about_us';
$route['forgot_password'] = 'Main/forgot_password';
$route['profile'] = 'Main/profile_spa';
$route['profile_old'] = 'Main/profile'; // Keep old route for backward compatibility
$route['notifications'] = 'Main/notifications';
// $route['category'] = 'Main/category_page';
$route['product'] = 'Main/product_detail';

//custom routing

$route['products/(:num)'] = 'Main/products/$1';
$route['search_product/(:any)'] = 'Main/search_product/$1';
$route['order_detail/(:num)'] = 'Main/order_detail/$1';
$route['category/(:num)'] = 'Main/category_detail/$1';
$route['occasion/(:num)'] = 'Main/occasion_detail/$1';
$route['cartitems/delete/(:num)'] = 'Main/deleteCartItems/$1';
$route['invoice/view/(:num)'] = 'Main/invoice_view/$1';
$route['invoice/download/(:num)'] = 'Main/invoice_download/$1';




// Admin Controller Routes
$route['Admin'] = 'AuthController/index';
$route['admin/dashboard'] = 'Admin/index';
$route['logout'] = 'Admin/logout';
$route['admin/invoices'] = 'Admin/invoices';
$route['admin/invoice/view/(:num)'] = 'Admin/admin_invoice_view/$1';
$route['admin/upload_logo'] = 'Admin/upload_logo';

// Category
$route['admin/category'] = 'Admin/category';
$route['admin/add_category'] = 'Admin/add_category';
$route['admin/subcategory'] = 'Admin/subcategory';
$route['admin/addsubcategory'] = 'Admin/add_subcategory';
$route['admin/editsubcategory'] = 'Admin/edit_subcategory';
$route['admin/subcategory/delete/(:num)'] = 'Admin/delete_subcategory/$1';



// Product
$route['admin/product'] = 'Admin/product';
$route['admin/addproduct'] = 'Admin/add_product';
$route['admin/editproduct'] = 'Admin/editProduct';
$route['admin/product/delete/(:num)'] = 'Admin/deleteProduct/$1';

// Occasion
$route['admin/occasion'] = 'Admin/occasions';
$route['admin/add_occasion'] = 'Admin/add_occasion';
$route['admin/edit_occasion'] = 'Admin/edit_occasion';
$route['admin/occasion/delete/(:num)'] = 'Admin/deleteOccasion/$1';


$route['admin/users'] = 'Admin/users';



// User Controller Routes
$route['login'] = 'Users/index';
$route['users/logout'] = 'Users/logout';

$route['register'] = 'Users/register';
$route['addtoCart'] = 'Users/addtoCart';

// API Routes
$route['api/products/subcategories/(:num)'] = 'Api/get_productbySubcategories/$1';
$route['api/addons/category/(:num)'] = 'Api/get_addonsbyCategory/$1';
$route['api/subcategory/category/(:num)'] = 'Api/getsubcategory_bycategoryid/$1';
$route['api/addons/subcategory/(:num)'] = 'Api/get_addons_by_subcategory_id/$1';
$route['api/product/addtocart'] = 'Api/addToCart';
$route['api/product/addontocart'] = 'Api/addonToCart';
$route['api/checkCartStatus'] = 'Api/checkCartStatus';
$route['api/getWishlistCount'] = 'Api/getWishlistCount';
$route['api/user/cartcount'] = 'Api/getCartCount';
$route['api/admin/product/filter'] = 'Admin/filterProductsData';
$route['api/admin/user/active'] = 'Users/updateactive';
$route['api/admin/category/delete/(:num)'] = 'Admin/delete_category/$1';
$route['api/admin/category/edit/(:num)'] = 'Admin/get_category/$1';
$route['api/quantity/update/(:num)'] = 'Api/cartQuantitybyid/$1';
$route['api/user/cartcount'] = 'Api/getCartCount';
$route['api/user/cartitems'] = 'Api/get_cartitems';
$route['api/login'] = 'Api/login';
$route['api/register'] = 'Api/register';
$route['api/profile/(:num)'] = 'Api/get_profile/$1';
$route['api/product/(:num)'] = 'Admin/get_productdata/$1';
$route['api/occasion/(:num)'] = 'Admin/get_occasiondata/$1';
$route['api/subcategory/(:num)'] = 'Admin/get_subcategorydata/$1';
$route['api/admin_notifications_get_recent'] = 'Api/admin_notifications_get_recent';
$route['api/admin_notifications_mark_read'] = 'Api/admin_notifications_mark_read';
$route['api/admin_notifications_mark_all_read'] = 'Api/admin_notifications_mark_all_read';
$route['admin/notifications'] = 'Admin/notifications';
$route['admin/order_details/(:num)'] = 'Admin/order_details/$1';





$route['api/admin/edit_category'] = 'Admin/edit_category/';
$route['404_override'] = 'Errors';
