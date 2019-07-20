<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Comments
    |--------------------------------------------------------------------------
    |
    | Modify functionality related to comments
    |
    */

    'comments'  => ['disabled' => true],

    /*
    |----------------------------------------------------------------------
    | Widgets
    |----------------------------------------------------------------------
    |
    | Filter widgets available for selection
    | when configuring WordPress widget areas
    |
    */

    'widgets' => [
        'archives'        => true,
        'calendar'        => true,
        'categories'      => true,
        'custom_html'     => true,
        'links'           => true,
        'media_audio'     => true,
        'media_image'     => true,
        'media_gallery'   => true,
        'media_video'     => true,
        'meta'            => true,
        'pages'           => true,
        'search'          => true,
        'text'            => true,
        'recent_posts'    => true,
        'recent_comments' => true,
        'rss'             => true,
        'tag_cloud'       => true,
        'menu'            => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Footer
    |--------------------------------------------------------------------------
    |
    | Modify the behavior and appearance of the WordPress dashboard.
    |
    */

    'footer' => [
        'disabled' => false,
        'modify'   => 'Powered by Acorn',
    ],

    /*
    |--------------------------------------------------------------------------
    | "Howdy"
    |--------------------------------------------------------------------------
    |
    | There's a new sherrif in town 🤠
    |
    */

    'howdy' => [
        'disabled'    => false,
        'modify_text' => 'Hello,', // trailing space is unnecessary
    ],

    'screen_options' => ['disabled' => false],
    'help' => ['disabled' => false],

    /*
    |----------------------------------------------------------------------
    | Admin Dashboard
    |----------------------------------------------------------------------
    |
    | Filter widgets available for selection
    | when configuring WordPress widget areas
    |
    */

    'dashboard' => [
        'columns' => 3,
        'widgets' => [

        ],
    ],
];
