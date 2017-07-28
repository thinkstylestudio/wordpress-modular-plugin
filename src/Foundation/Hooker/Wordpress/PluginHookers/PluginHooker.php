<?php
/**
 * Second level of abstraction from concrete classes, this Hooker subclass
 * defines a type of hookers that register actions when plugin is activated/deactivated.
 *
 * @author Skazza
 */
namespace WPModular\Foundation\Hooker\Wordpress\PluginHookers;

use WPModular\Foundation\Hooker\Hooker;

abstract class PluginHooker extends Hooker
{
    /**
     * @var string Main file of the plugin, used to register/unregister actions.
     */
    protected $FILE = null;

    /**
     * Basic constructor to init the FILE constant.
     *
     * @author Skazza
     */
    public function __construct()
    {
        $this->FILE = app()->getRootPath() . DIRECTORY_SEPARATOR . app('env')->get('PLUGIN_SLUG') . '.php';
    }

    /**
     * Abstract method implemented from Hooker class.
     * It registers the action into WordPress core using the callWPRegisterer method.
     *
     * @param Object $data Not used here.
     * @param string|array $handler Already parsed handler function.
     * @author Skazza
     */
    protected function hookSpecific($data, $handler)
    {
        $this->callWPRegisterer($handler); /* Call the real WordPress function to register this action */
    }

    /**
     * Abstract method, implemented into PluginHooker subclasses.
     * This method receives the handler and calls the WordPress function to register the action
     * depending on the hook type.
     *
     * @param string|array $handler Already parsed handler function.
     * @author Skazza
     */
    protected abstract function callWPRegisterer($handler);
}