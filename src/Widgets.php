<?php

namespace TinyPixel\Settings;

// WordPress
use function \add_action;
use function \register_widget;
use function \unregister_widget;

// Illuminate framework
use \Illuminate\Support\Collection;

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
     * Processes widgets which should be removed from the configuration file
     *
     * @param  \Illuminate\Support\Collection $widgets
     * @return \Illuminate\Support\Collection $widgets
     */
    public function processWidgets(Collection $widgets)
    {
        $disabledWidgets = Collection::make();

        $widgets->each(function ($widgetStatus, $widgetName) use ($disabledWidgets) {
            if ($widgetStatus == false) {
                $disabledWidgets->push($widgetName);
            }
        });

        return $disabledWidgets;
    }

    /**
     * Removes widgets which have been marked for removal
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
     * Adds additional widgets as defined in configuration
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
