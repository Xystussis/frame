<?php

namespace Frame\Core\Loader;

use Frame\Contracts\Loader;
use Frame\Core\View;

class ViewLoader implements Loader
{
    public function load(): void
    {
        //Load our View according to our mapped route
        //Temporary Example.
        $view = new View();
        $view->loadFile('index.html', ['name' => 'User']);
        $_ENV['view'] = $view;
    }
}