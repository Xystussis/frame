<?php

namespace Frame\Core;

use Frame\Contracts\Loader;
use Frame\Core\Loader\MiddlewareLoader;

class Application
{
    public function init(): void
    {
        $loaders = [
            MiddlewareLoader::class
        ];
        foreach ($loaders as $loader) {
            $this->load(new $loader());
        }

    }

    private function load(Loader $loader)
    {
        $loader->load();
    }


    public function finalize(): void
    {
        //@TODO view renderer.
    }

}