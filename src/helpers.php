<?php

if(!function_exists('app')) {
    function app($key = null)
    {
        global $appCtx;

        try {
            return (!is_null($key)) ? $appCtx->getService($key) : $appCtx;
        } catch (\Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException $e) {
            return null;
        }
    }
}

if(!function_exists('cache')) {
    /**
     * @return \WPModular\Cache\CacheService
     */
    function cache()
    {
        return app('cache');
    }
}

if(!function_exists('config')) {
    /**
     * @return mixed
     */
    function config($configString)
    {
        return app('config')->get($configString);
    }
}

if(!function_exists('env')) {
    /**
     * @return string
     */
    function env($key)
    {
        return app('env')->get($key);
    }
}

if(!function_exists('storage')) {
    /**
     * @return \League\Flysystem\Filesystem\Filesystem
     */
    function storage($name)
    {
        return app('filesystem')->storage($name);
    }
}

if(!function_exists('url')) {
    /**
     * @return \WPModular\Support\Url\UrlService
     */
    function url()
    {
        return app('url');
    }
}

if(!function_exists('render')) {
    /**
     * @return string
     */
    function render($viewName, $params = array(), $print = true)
    {
        return app('view')->render($viewName, $params, $print);
    }
}

if(!function_exists('wp_service')) {
    /**
     * @return \WPModular\Wordpress\WordpressService
     */
    function wp_service()
    {
        return app('wp');
    }
}
