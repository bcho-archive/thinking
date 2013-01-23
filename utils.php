<?php
/**
 * utils.php
 *
 * Some utils
 */

require_once 'base.php';

/* twig template render */
require_once 'Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader =new Twig_Loader_Filesystem(APP_PATH . '/' . 'Tpl');
$twig = new Twig_Environment($loader);

/**
 * static_url_filter
 *
 * A static path builder via twig filter.
 */
$static_url_filter = new Twig_SimpleFilter('static_url', function ($str) {
    return STATIC_PATH . $str;
});
$twig->addFilter($static_url_filter);

/* End of file utils.php */
