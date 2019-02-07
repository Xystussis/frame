<?php

namespace Frame\Core;

use Frame\Contracts\Loader;
use Frame\Core\Loader\MiddlewareLoader;
use Frame\Core\Loader\ViewLoader;

class Application
{
    public function init(): void
    {
        $loaders = [
            MiddlewareLoader::class,
            ViewLoader::class
        ];
        foreach ($loaders as $loader) {
            $this->load(new $loader());
        }

    }

    private function load(Loader $loader): void
    {
        $loader->load();
    }


    public function finalize(): void
    {
        //@TODO view renderer.
    }

}