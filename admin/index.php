<?php

/*
 * --------------------------------------------------------------------
 * app path
 * --------------------------------------------------------------------
 */

//define: dùng để khai báo hắng

$app_path = dirname(__FILE__); //lấy ra forder chứa file index.php => project/ismart.com/admin
define('APPPATH', $app_path); // APPATH = "project/ismart.com/admin"
/*
 * --------------------------------------------------------------------
 * core path
 * --------------------------------------------------------------------
 */
$core_folder = 'core';
define('COREPATH', APPPATH.DIRECTORY_SEPARATOR.$core_folder); // COREPATH = "APPPATH/$core_folder" = "project/ismart.com/admin/core"

/*
 * --------------------------------------------------------------------
 * modules path
 * --------------------------------------------------------------------
 */
$modules_folder = 'modules';
define('MODULESPATH', APPPATH.DIRECTORY_SEPARATOR.$modules_folder); // =>MODULESPATH ="project/ismart.com/admin/modules"


/*
 * --------------------------------------------------------------------
 * helper path
 * --------------------------------------------------------------------
 */

$helper_folder = 'helper';
define('HELPERPATH', APPPATH.DIRECTORY_SEPARATOR.$helper_folder); // =>HELPERPATH = "project/ismart.com/admin/helper"


/*
 * --------------------------------------------------------------------
 * library path
 * --------------------------------------------------------------------
 */
$lib_folder= 'libraries';
define('LIBPATH', APPPATH.DIRECTORY_SEPARATOR.$lib_folder); //=>  LIBPATH= "project/ismart.com/admin/libraries"


/*
 * --------------------------------------------------------------------
 * layout path
 * --------------------------------------------------------------------
 */
$layout_folder= 'layout';
define('LAYOUTPATH', APPPATH.DIRECTORY_SEPARATOR.$layout_folder); // tuong tu

/*
 * --------------------------------------------------------------------
 * config path
 * --------------------------------------------------------------------
 */
$config_folder= 'config';
define('CONFIGPATH', APPPATH.DIRECTORY_SEPARATOR.$config_folder); // tuong tu

require COREPATH.DIRECTORY_SEPARATOR.'appload.php'; // project/ismart.com/admin/core/appload.php
