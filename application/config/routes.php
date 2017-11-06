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
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index.html'] = 'home/index';
$route['about-us.html'] = 'home/about';
$route['recycle.html'] = 'home/recycle';
$route['business.html'] = 'home/business';
$route['gallery.html'] = 'home/gallery';
$route['contact.html'] = 'home/contact';

$route['^en/(.+)$'] = "$1";
$route['^id/(.+)$'] = "$1";

// '/en' and '/fr' URIs -> use default controller

$route['^en$'] = $route['default_controller'];
$route['^id$'] = $route['default_controller'];


// Admin Page ...............................................
// $route['admin'] =  'admin/banner';
$route['admin/login.html'] =  'admin/authentication';
$route['admin/dashboard.html'] =  'admin/dashboard/index/';
$route['admin/logout.html'] =  'admin/authentication/logout';
$route['admin/login.html'] =  'admin/authentication/login_process';

$route['admin/banner.html'] =  'admin/banner';
// $route['admin/banner-text.html'] = 'admin/bannertext';
// $route['admin/info-summary.html'] = 'admin/infosummary';
// $route['admin/footer.html'] = 'admin/footer';
// $route['admin/downloadable.html'] = 'admin/downloadable';
// $route['admin/tagline.html'] = 'admin/tagline';
// $route['admin/city-area.html'] = 'admin/cityarea';
// $route['admin/buy.html'] = 'admin/buy';
// $route['admin/banner-page.html'] = 'admin/bannerpage';
// $route['admin/contact-us.html'] = 'admin/contactus';
// $route['admin/blog.html'] = 'admin/blog';
$route['admin/user.html'] = 'admin/user';
// $route['admin/sell.html'] = 'admin/sell';
// $route['admin/logout.html'] = 'admin/authentication/logout';
// $route['admin/about.html'] = 'admin/about';
// $route['admin/testimony.html'] = 'admin/testimony';
// $route['admin/rent.html'] = 'admin/rent';

