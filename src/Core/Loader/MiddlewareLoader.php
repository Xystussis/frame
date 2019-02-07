<?php

namespace Frame\Core\Loader;

use Frame\Contracts\Loader;

class MiddlewareLoader implements Loader
{
    private function stripEnd($item)
    {
        return preg_replace('/(\.php){1}$/', '', $item);
    }

    public function load(): void
    {
        $firstInstance = null;
        $middleware = array_map([$this, 'stripEnd'],
            array_filter(scandir(BASE_DIR . '/src/Middleware', 1), function ($item) {
                return !empty(preg_match('/(\.php){1}$/', $item));
            }));

        $mCount = count($middleware);

        if ($mCount > 0) {
            $className = "\\Frame\\Middleware\\" . $middleware[0];
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
}