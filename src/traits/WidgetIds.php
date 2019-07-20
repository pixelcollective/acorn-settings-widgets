<?php

namespace TinyPixel\Settings\Traits;

/**
 * WidgetIds
 *
 * @author  Kelly Mears <kelly@tinypixel.dev>
 * @license MIT
 * @since   1.0.0
 */
trait WidgetIds
{
     /**
     * Widget IDs
     *
     * @var array
     */
    public $widgetIds = [
        'pages'           => 'WP_Widget_Pages',
        'calendar'        => 'WP_Widget_Calendar',
        'archives'        => 'WP_Widget_Archives',
        'links'           => 'WP_Widget_Links',
        'media_audio'     => 'WP_Widget_Media_Audio',
        'media_video'     => 'WP_Widget_Media_Video',
        'media_image'     => 'WP_Widget_Media_Image',
        'media_gallery'   => 'WP_Widget_Media_Gallery',
        'meta'            => 'WP_Widget_Meta',
        'search'          => 'WP_Widget_Search',
        'text'            => 'WP_Widget_Text',
        'categories'      => 'WP_Widget_Categories',
        'recent_posts'    => 'WP_Widget_Recent_Posts',
        'recent_comments' => 'WP_Widget_Recent_Comments',
        'rss'             => 'WP_Widget_RSS',
        'tag_cloud'       => 'WP_Widget_Tag_Cloud',
        'menu'            => 'WP_Nav_Menu_Widget',
        'custom_html'     => 'WP_Widget_Custom_HTML',
    ];
}
