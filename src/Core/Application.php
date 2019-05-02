<?php

namespace Frame\Core;

use Frame\Contracts\Config;
use Frame\Contracts\Loader;
use Frame\Core\Loader\ConfigLoader;
use Frame\Core\Loader\HelperLoader;
use Frame\Core\Loader\MiddlewareLoader;
use Frame\Core\Loader\ViewLoader;

class Application
{
    protected $config;

    public function init(): void
    {
        $_ENV['app'] = $this;
        $loaders = [
            HelperLoader::class,
            MiddlewareLoader::class,
            ViewLoader::class,
            ConfigLoader::class
        ];
        foreach ($loaders as $loader) {
            $this->load(new $loader());
        }
//        var_dump(application()->getConfig()->get('database.drivers.mysql.username', 'username'));
    }

    private function load(Loader $loader): void
    {
        $loader->load();
    }


    public function finalize(): void
    {
        print $_ENV['view']->render();
    }

    /**
     * Set the Config Object for the application
     * @param Config $config
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config ?? new JsonConfig(null);
    }


}

