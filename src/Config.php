<?php

namespace Core\Admin\Config;

use Core\Admin\Admin;
use Core\Admin\Extension;

class Config extends Extension
{
    /**
     * Load configure into laravel from database.
     *
     * @return void
     */
    public static function load()
    {
        foreach (ConfigModel::all(['name', 'value']) as $config) {
            config([$config['name'] => $config['value']]);
        }
    }

    /**
     * Bootstrap this package.
     *
     * @return void
     */
    public static function boot()
    {
        static::registerRoutes();

        Admin::extend('config', __CLASS__);
    }

    /**
     * Register routes for laravel-admin.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->resource('config', 'Core\Admin\Config\ConfigController');
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Config', 'config', 'fa-toggle-on', 2);

        parent::createPermission('Admin Config', 'ext.config', 'config*');
    }
}
