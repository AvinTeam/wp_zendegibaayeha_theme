<?php

(defined('ABSPATH')) || exit;
date_default_timezone_set('Asia/Tehran');

define('ZBA_VERSION', '1.2.2');

define('ZBA_PATH', get_template_directory() . "/");
define('ZBA_INCLUDES', ZBA_PATH . 'includes/');
define('ZBA_CLASS', ZBA_PATH . 'classes/');
define('ZBA_CORE', ZBA_PATH . 'core/');
define('ZBA_FUNCTION', ZBA_PATH . 'functions/');
define('ZBA_VIEWS', ZBA_PATH . 'views/');

define('ZBA_URL', get_template_directory_uri() . "/");
define('ZBA_ASSETS', ZBA_URL . 'assets/');
define('ZBA_CSS', ZBA_ASSETS . 'css/');
define('ZBA_JS', ZBA_ASSETS . 'js/');
define('ZBA_IMAGE', ZBA_ASSETS . 'image/');
define('ZBA_VENDOR', ZBA_ASSETS . 'vendor/');

define('ZBA_TIME_STAMP', 5 * 60);

require_once ZBA_PATH . 'vendor/autoload.php';

require_once ZBA_CORE . '/accesses.php';
require_once ZBA_INCLUDES . '/rest.php';
require_once ZBA_INCLUDES . '/theme_filter.php';
require_once ZBA_INCLUDES . '/theme-function.php';
require_once ZBA_INCLUDES . '/ajax.php';
require_once ZBA_INCLUDES . '/styles.php';
require_once ZBA_INCLUDES . '/init.php';
require_once ZBA_INCLUDES . '/jdf.php';

require_once ZBA_CLASS . '/ZBADB.php';
require_once ZBA_CLASS . '/Mr_clock_List_Tabel.php';

require_once ZBA_CLASS . '/ZBAOption.php';
require_once ZBA_INCLUDES . '/meta_boxs.php';

require_once ZBA_INCLUDES . '/postype.php';
require_once ZBA_INCLUDES . '/taxonomies.php';
require_once ZBA_INCLUDES . '/dashboard_widget.php';

if (is_admin()) {
    require_once ZBA_CLASS . '/List_Table.php';
    require_once ZBA_INCLUDES . '/menu.php';
    require_once ZBA_INCLUDES . '/install.php';
    require_once ZBA_INCLUDES . '/edit_column_ayeh.php';
    //     require_once ZBA_INCLUDES . '/handle_download.php';

}

if (isset($_GET[ 'test' ])) {

    echo get_option('android_link');

    exit;

}

$mr_times_set = get_option('mr_add_clock');
if (is_array($mr_times_set)) {
    foreach ($mr_times_set as $key => $value) {

        if (intval($key) + ZBA_TIME_STAMP < time()) {
            unset($mr_times_set[ $key ]);
        }
    }
    update_option('mr_add_clock', $mr_times_set);
}

// exit;
