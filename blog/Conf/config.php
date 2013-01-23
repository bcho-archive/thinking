<?php

require 'base.php';
require 'utils.php';

$config['current'] = 'debug';
$config['debug'] = array(
    'URL_MODEL' => 3,
    'URL_CASE_INSENSITIVE' => true,
    'DEFAULT_MODULE' => 'Blog',

    'HTML_CACHE_ON' => false,
    'DB_FIELDS_CACHE' => false,

    /* database settings */
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'thinking',
    'DB_USER' => 'thinking',
    'DB_PWD' => 'thinking',

    /* route */
    'URL_ROUTE_ON' => true,
    'URL_ROUTE_RULES' => array(
        '/:id' => 'Blog/post',
    ),

    /* app config */
    'HASH_SALT' => 'vtmer',
);

/* global config */

$config[$config['current']]['g'] = array(
    'blogname' => 'Once upon a time'
);

/* utils */
$config[$config['current']]['utils'] = array(
    'render' => $twig,
);

return $config[$config['current']];
