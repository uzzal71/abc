<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'login';
$route['LOGOUT'] = 'admin/loout';
$route['admin'] = 'admin';

/**
** FILE MENU ROUTES
**/
$route['DASHBOARD'] = 'file/dashboard';
$route['CREATE-USER'] = 'file/create_user';
$route['CHANGE-PASSWORD'] = 'file/change_password';
$route['CHANGE-PASSWORD-SAVE'] = 'admin/change_password_save';
$route['LOGOUT'] = 'file/user_logout';

/**
** USER MENU ROUTES
**/
$route['CREATE-USER'] = 'user/create_user';
$route['USER-SAVE'] = 'user/user_save';
$route['USER-LIST'] = 'user/user_list';
$route['USER-EDIT/(:any)'] = 'user/user_edit/$1';
$route['USER-UPDATE/(:any)'] = 'user/user_update/$1';
$route['USER-DELETE/(:any)'] = 'user/user_delete/$1';

/**
** CIRCLE MENU ROUTES
**/
$route['CREATE-CIRCLE'] = 'circle/add_circle';
$route['CIRCLE-SAVE'] = 'circle/circle_save';
$route['CIRCLE-LIST'] = 'circle/circle_list';
$route['CIRCLE-EDIT/(:any)'] = 'circle/circle_edit/$1';
$route['CIRCLE-UPDATE/(:any)'] = 'circle/circle_update/$1';
$route['CIRCLE-DELETE/(:any)'] = 'circle/circle_delete/$1';

/**
** REGION MENU ROUTES
**/
$route['CREATE-REGION'] = 'region/add_region';
$route['REGION-SAVE'] = 'region/region_save';
$route['REGION-LIST'] = 'region/region_list';
$route['REGION-EDIT/(:any)'] = 'region/region_edit/$1';
$route['REGION-UPDATE/(:any)'] = 'region/region_update/$1';
$route['REGION-DELETE/(:any)'] = 'region/region_delete/$1';

/**
** SITE MENU ROUTES
**/
$route['CREATE-SITE'] = 'site/add_site';
$route['SITE-SAVE'] = 'site/site_save';
$route['SITE-LIST'] = 'site/site_list';
$route['SITE-EDIT/(:any)'] = 'site/site_edit/$1';
$route['SITE-UPDATE/(:any)'] = 'site/site_update/$1';
$route['SITE-DELETE/(:any)'] = 'site/site_delete/$1';

/**
** NODE TYPE MENU ROUTES
**/
$route['CREATE-NODE-TYPE'] = 'node_type/add_node_type';
$route['NODE-TYPE-SAVE'] = 'node_type/node_type_save';
$route['NODE-TYPE-LIST'] = 'node_type/node_type_list';
$route['NODE-TYPE-EDIT/(:any)'] = 'node_type/node_type_edit/$1';
$route['NODE-TYPE-UPDATE/(:any)'] = 'node_type/node_type_update/$1';
$route['NODE-TYPE-DELETE/(:any)'] = 'node_type/node_type_delete/$1';

/**
** DEVICE MENU ROUTES
**/

$route['CREATE-DEVICE'] = 'device/add_device';
$route['DEVICE-SAVE'] = 'device/device_save_data';
$route['DEVICE-LIST'] = 'device/device_list';
$route['DEVICE-EDIT/(:any)'] = 'device/device_edit/$1';
$route['DEVICE-UPDATE/(:any)'] = 'device/device_update/$1';
$route['DEVICE-DELETE/(:any)'] = 'device/device_delete/$1';

/**
** IO CARD MENU ROUTES
**/
$route['CREATE-IO-NUMBER'] = 'io_card/io_number_add';
$route['IO-NUMBER-SAVE'] = 'io_card/io_number_create';
$route['IO-NUMBER-LIST'] = 'io_card/io_number_list';
$route['IO-NUMBER-EDIT/(:any)'] = 'io_card/io_number_edit/$1';
$route['IO-NUMBER-UPDATE/(:any)'] = 'io_card/io_number_update/$1';
$route['IO-NUMBER-DELETE/(:any)'] = 'io_card/io_number_delete/$1';
$route['IO-NUMBER-OFF/(:any)'] = 'io_card/io_number_off/$1';
$route['IO-NUMBER-ON/(:any)'] = 'io_card/io_number_on/$1';
$route['CREATE-IO-INPUT'] = 'io_card/io_input_add';
$route['IO-INPUT-SAVE'] = 'io_card/io_input_save';
$route['IO-INPUT-LIST'] = 'io_card/io_input_list';
$route['IO-INPUT-EDIT/(:any)'] = 'io_card/io_input_edit/$1';
$route['IO-INPUT-UPDATE/(:any)'] = 'io_card/io_input_update/$1';
$route['IO-INPUT-DELETE/(:any)'] = 'io_card/io_input_delete/$1';
/**
** DATA RANGE MENU ROUTES
**/
$route['CREATE-DATA-RANGE'] = 'data_range/data_range_add';
$route['DATA-RANGE-SAVE'] = 'data_range/data_range_save';
$route['DATA-RANGE-LIST'] = 'data_range/data_range_list';
$route['DATA-RANGE-EDIT/(:any)'] = 'data_range/data_range_edit/$1';
$route['DATA-RANGE-UPDATE/(:any)'] = 'data_range/data_range_update/$1';
$route['DATA-RANGE-DELETE/(:any)'] = 'data_range/data_range_delete/$1';

/**
** DATA SHEET MENU ROUTES
**/
$route['SITE-ALARM-LIST'] = 'data_sheet/site_alarm';
$route['SITE-ALARM-DISPLAY/(:any)'] = 'data_sheet/site_alarm_display/$1';
$route['UPDATED-SITE-DATA'] = 'data_sheet/updated_site_data';
$route['SEARCH-SITE-DATA'] = 'data_sheet/search_site_data';

/**
** REPORT MENU ROUTES
**/
$route['REPORT-SEARCH'] = 'report/report_search';
$route['SEARCH-REPORT-RESULT'] = 'report/search_report_result';


/**
**
**/
$route['SMS-SEND'] = 'send_sms/send';
$route['SMS-SEND-sms'] = 'send_sms/sms';
$route['SMS-SUCCESS'] = 'send_sms/success';


$route['404_override'] = 'error';
$route['translate_uri_dashes'] = FALSE;
//
