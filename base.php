<?php
/**
 * base.php
 *
 * Holds some useful infomations.
 */

define('BASE_PATH', getcwd() . '/');
define('APP_NAME', 'thinking');
define('APP_PATH', BASE_PATH . 'blog/');
define('APP_DEBUG', true);
define('CORE', APP_PATH . 'thinkphp/');
/* TODO get site path more elegant */
define('SITE_PATH', 'http://localhost/thinking/');
define('VENDOR_PATH', BASE_PATH . 'vendor/');
define('STATIC_PATH', SITE_PATH . 'static/');

set_include_path(get_include_path() . PATH_SEPARATOR . BASE_PATH);
set_include_path(get_include_path() . PATH_SEPARATOR . VENDOR_PATH);

/* End of file base.php */
