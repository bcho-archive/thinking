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
$static_url_filter = new Twig_SimpleFilter('static_url', function($str) {
    return STATIC_PATH . $str;
});
$twig->addFilter($static_url_filter);

/**
 * url_filter
 *
 * A url builder.
 * e.g.,
 *
 *      /blog/post/id/1 | url
 *      =>  SITE_PATH/index.php?s=/blog/post/id/1
 *
 *      1 | url(prefix='post/id/', base='blog')
 *      =>  SITE_PATH/index.php?s=/blog/post/id/1
 */
$url_filter = new Twig_SimpleFilter('url', function($str, $prefix=null,
                                                    $base=null) {
    if ($prefix === null) {
        $prefix = '';
    } else {
        $prefix = trim($prefix, '/') . '/';
    }
    if ($base === null) {
        $base = '';
    } else {
        $base = trim($base, '/') . '/';
    }
    $str = trim($str, '/');
    return SITE_PATH . 'index.php?s=/' . $base . $prefix . $str;
});
$twig->addFilter($url_filter);

/* End of file utils.php */
