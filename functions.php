<?php

(defined('ABSPATH')) || exit;

define('ZBA_VERSION', '1.0.7');

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

require_once ZBA_PATH . 'vendor/autoload.php';

require_once ZBA_CORE . '/accesses.php';
require_once ZBA_INCLUDES . '/theme_filter.php';
require_once ZBA_INCLUDES . '/theme-function.php';
require_once ZBA_INCLUDES . '/ajax.php';
require_once ZBA_INCLUDES . '/styles.php';
require_once ZBA_INCLUDES . '/init.php';
require_once ZBA_INCLUDES . '/jdf.php';

require_once ZBA_CLASS . '/ZBADB.php';
require_once ZBA_CLASS . '/ZBAOption.php';
require_once ZBA_INCLUDES . '/meta_boxs.php';

// require_once ZBA_INCLUDES . '/postype.php';
// require_once ZBA_CLASS . '/Iran_Area.php';
// require_once ZBA_INCLUDES . '/init_user_submit.php';

if (is_admin()) {
    require_once ZBA_CLASS . '/List_Table.php';
    require_once ZBA_INCLUDES . '/menu.php';
    require_once ZBA_INCLUDES . '/install.php';
    //     require_once ZBA_INCLUDES . '/edit_column_institute.php';
    //
    //     require_once ZBA_INCLUDES . '/handle_download.php';

}

// if (isset($_GET[ 'test' ])) {

// print_r($_GET);
// exit;

// }