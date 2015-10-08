<?php
defined('XOOPS_ROOT_PATH') || exit('Restricted access');

return $config = array(
    'xoopartners_welcome'   => '',
    'xoopartners_main_mode' => 'list',
    'xoopartners_category'  => array(
        'use_categories' => 0,
        'display_mode'   => 'list',
        'main_menu'      => 0,
        'image_size'     => 100000,
        'image_width'    => 100,
        'image_height'   => 100,
    ),
    'xoopartners_partner'   => array(
        'display_mode' => 'blog',
        'limit_main'   => 5,
        'image_size'   => 100000,
        'image_width'  => 100,
        'image_height' => 100,
    ),
    'xoopartners_rld'       => array(
        'rld_mode'   => 'likedislike',
        'rate_scale' => 10,
    ),
);
