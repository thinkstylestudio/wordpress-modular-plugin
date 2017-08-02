<?php

namespace WPModular\Foundation\Modules;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use WPModular\Contracts\ApplicationContext\ApplicationContextContract;
use WPModular\Hooker\Hooker;

abstract class ModuleProvider
{
    protected $app = null;

    public function __construct(ApplicationContextContract $app)
    {
        $this->app = $app;
    }

    public function boot()
    {
        $namespace = $this->usesNamespace();
        $folder = new Filesystem(
            new Local(
                $this->usesFolder()
            )
        );

        $this->register();

        $this->app->create(
            Hooker::class,
            array($namespace, $folder)
        )->hookModules();
    }

    abstract public function register();
    abstract public function usesNamespace();
    abstract public function usesFolder();
}