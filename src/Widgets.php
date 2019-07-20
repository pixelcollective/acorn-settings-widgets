<?php

namespace TinyPixel\Settings;

// WordPress
use function \add_action;
use function \unregister_widget;

// Illuminate framework
use \Illuminate\Support\Collection;
use \Illuminate\Support\Facades\View;

// Roots
use \Roots\Acorn\Application;

// Internal
use \TinyPixel\Settings\Traits\WidgetIds;

/**
 * Widgets
 *
 * @author  Kelly Mears <kelly@tinypixel.dev>
 * @license MIT
 * @since   1.0.0
 */
class Widgets
{
    /**
     * Widget IDs
     *
     * @var array $widgetIds
     */
    use Traits\WidgetIds;

    /**
     * Construct
     *
     * @param \Roots\Acorn\Application
     * @return object self
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        return $this;
    }

    /**
     * Initializes class
     *
     * @param Collection $config
     * @return void
     */
    public function init(Collection $config)
    {
        $this->settings = $config;

        $this->disabledWidgets = $this->processWidgets(Collection::make(
            $this->settings->get('default_widgets')
        ));

        $this->additionalWidgets = Collection::make(
            $this->settings->get('additional_widgets')
        );

        add_action('widgets_init', [$this, 'removeWidgets']);
        add_action('widgets_init', [$this, 'addWidgets']);
    }

    /**
     * Processes enabled widgets from configuration file
     *
     * @param \Illuminate\Support\Collection  $defaultWidgets
     * @return \Illuminate\Support\Collection $defaultWidgets
     */
    public function processWidgets(Collection $defaultWidgets)
    {
        $defaultWidgets->each(function ($widgetStatus, $widgetName) use ($defaultWidgets) {
            if ($widgetStatus == false) {
                $defaultWidgets->pop($widgetName);
            }
        });

        return $defaultWidgets;
    }

    /**
     * Removes widgets which are slated for removal
     *
     * @return void
     */
    public function removeWidgets()
    {
        $this->disabledWidgets->each(function ($widget) {
            unregister_widget($this->widgetIds[$widget]);
        });
    }

    /**
     * Adds additional widgets
     *
     * @return void
     */
    public function addWidgets()
    {
        $this->additionalWidgets->each(function ($widget) {
            if (class_exists($widget)) {
                register_widget($widget);
            }
        });
    }
}
