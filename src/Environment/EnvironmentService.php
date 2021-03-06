<?php

namespace WPModular\Environment;

use WPModular\Environment\Adapters\DotAdapter;
use WPModular\Foundation\Services\Service;

/**
 * @method string get(string $key)
 * @method set(string $key, string $value)
 */
class EnvironmentService extends Service
{
    public function bootstrap()
    {
        $this->addMixin(
            $this->app->create(
                DotAdapter::class,
                array('path' => $this->app->getRootPath())
            )
        );
    }
}