<?php

namespace Frame\Core\Loader;

use Frame\Contracts\Loader;

class HelperLoader implements Loader
{
    public function load(): void
    {

        $files = glob(__DIR__.'/../../Helpers/*.php');
        foreach ($files as $file) {
            require_once $file;
        }
//        var_dump($files);
    }
}