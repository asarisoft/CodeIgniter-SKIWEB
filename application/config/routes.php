<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['^en$'] = $route['default_controller'];
$route['^id$'] = $route['default_controller'];


// Admin Page ...............................................
$route['admin/login.html'] =  'admin/authentication';
$route['admin/logout.html'] =  'admin/authentication/logout';
$route['admin/login.html'] =  'admin/authentication/login_process';

$route['admin/banner.html'] =  'admin/banner';
$route['admin/menu.html'] = 'admin/menu';
$route['admin/gallery.html'] = 'admin/gallery';
$route['admin/footer.html'] = 'admin/footer';
$route['admin/banner-page.html'] = 'admin/bannerpage';
$route['admin/page-content.html'] = 'admin/pagecontent';
$route['admin/user.html'] = 'admin/user';
$route['admin/contact.html'] = 'admin/contact';
$route['admin/about.html'] = 'admin/about';


