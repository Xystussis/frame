<?php

namespace Frame\Core\Loader;

use Frame\Contracts\Loader;
use Frame\Contracts\Middleware;
use Frame\Middleware\Access;
use Frame\Middleware\Sanitizer;

class MiddlewareLoader implements Loader
{
    private function stripEnd($item)
    {
        return preg_replace('/(\.php){1}$/', '', $item);
    }

    private function loadBaseMiddleware(): void
    {
        $firstInstance = null;
        $middleware = array_map([$this, 'stripEnd'],
            array_filter(scandir(BASE_DIR . '/src/Middleware', 1), function ($item) {
                return !empty(preg_match('/(\.php){1}$/', $item));
            }) ?? []);

        $mCount = count($middleware);
        $currentInstance = null;
        if ($mCount > 0) {
            $className = "\\Frame\\Middleware\\" . $middleware[0];
            /**
             * @var Middleware $firstInstance
             */
            $firstInstance = new $className();
            $currentInstance = $firstInstance;

        }
        for ($i = 1; $i < $mCount; $i++) {
            $className = "\\Frame\\Middleware\\" . $middleware[$i];
            $currentInstance = $currentInstance->setSuccessor(new $className());
        }
        if ($firstInstance !== null) {
            $firstInstance->handle();
        }
    }

    public function load(): void
    {
        $primary = new Access();
        $primary->setSuccessor(new Sanitizer());

        $primary->handle();

        //Load any locally produced middleware
        if (is_dir(BASE_DIR.'/Middleware')) {
            $this->loadBaseMiddleware();
        }
    }
}