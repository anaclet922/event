<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
| contrvoller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'home/_404';
$route['translate_uri_dashes'] = FALSE;


$route['_404'] = 'home/_404';
$route['admin-home'] = 'admin/home';
$route['account-home'] = 'user/home';
$route['login'] = 'user/login';
$route['logout'] = 'user/logout';
$route['register'] = 'user/register';
$route['forgot-password'] = 'user/forgot_password';
$route['change-user-password'] = 'user/change_user_password';
$route['change-user-profile'] = 'user/change_user_profile';
$route['change-user-info'] = 'user/change_user_info';
$route['post-register-user'] = 'user/post_register';
$route['categories'] = 'user/manage_categories';
$route['new-event'] = 'user/new_event';
$route['add-new-category'] = 'category/add_new_category';
$route['category-delete/(:num)'] = 'category/category_delete/$1';
$route['update-category'] = 'category/update_category';
$route['post-event'] = 'event/post_event';
$route['preview-event/(:num)'] = 'user/preview_event/$1';
$route['manage-events'] = 'user/manage_events';
$route['edit-event/(:num)'] = 'user/edit_event/$1';
$route['manage-events'] = 'user/manage_events';
$route['event-delete/(:num)'] = 'event/event_delete/$1';




//profile
$route['my-profile'] = 'user/my_profile';
 



//front
$route['event-item/(:num)'] = 'home/event_item/$1';
$route['pay-ticket'] = 'event/pay_ticket';
$route['payment-callback-flutterwave'] = 'event/payment_callback_flutterwave';
$route['show-bought-tickets/(:any)'] = 'home/show_bought_tickets/$1';


$route['sys-settings'] = 'setting/sys_settings';
$route['settings-change-logo'] = 'setting/settings_change_logo';
$route['settings-change-favicon'] = 'setting/settings_change_favicon';
$route['settings-change-info'] = 'setting/settings_change_info';
$route['settings-change-footer-address'] = 'setting/settings_change_footer_address';
$route['settings-change-site-email'] = 'setting/settings_change_site_email';
$route['settings-change-terms-condition'] = 'setting/settings_change_terms_condition';
$route['settings-change-flutterwave'] = 'setting/settings_change_flutterwave';
$route['settings-change-currency'] = 'setting/settings_change_currency';
$route['settings-change-footer-about'] = 'setting/settings_change_footer_about';
$route['settings-change-social-media'] = 'setting/settings_change_social_media';
$route['settings-change-privacy-policy'] = 'setting/settings_change_privacy_policy';
$route['settings-change-total-seats'] = 'setting/settings_change_total_seats';
$route['settings-change-news-per-page'] = 'setting/settings_change_news_per_page';

$route['stripePost'] = "stripe/stripePost";



//tickets & revenue
$route['tickets'] = 'ticket/tickets';
$route['revenue'] = 'ticket/revenue'; 
$route['users'] = 'user/users';
$route['add-new-user'] = 'user/add_new_user';
$route['delete-user/(:num)'] = 'user/delete_user/$1';
$route['update-user'] = 'user/update_user';
$route['re-send-ticket/(:num)'] = 'ticket/re_send_ticket/$1';
$route['pages'] = 'page/index';

$route['change-page-visibility/(:num)'] = 'page/change_page_visibility/$1';


$route['post-subscriber'] = 'subscriber/post_subscriber';

$route['news'] = 'news/index';
$route['news/(:num)'] = 'news/index';
$route['news-cp'] = 'news/news_cp';

$route['news/update-news/(:num)'] = 'news/update_news/$1';

$route['article/(:any)'] = 'news/view/$1';
$route['delete-news/(:num)'] = 'news/delete_news/$1';

//$route['show-ticket']


//mobile api
$route['get-tickets'] = 'api/get_gickets';
$route['check-ticket-valid'] = 'api/check_ticket_valid';