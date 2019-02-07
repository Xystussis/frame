<?php
/**
 * User: Pierre van Horick
 * Project: frame
 * File: View.php
 * Date: 2019/02/07
 * Time: 20:30
 */

namespace Frame\Core;


use Frame\Adapters\View\TwigAdapter;

class View implements \Frame\Contracts\View
{
    protected $viewPort;

    public function __construct()
    {
        //@TODO Put this in a config file somewhere
        $this->viewPort = new TwigAdapter();
    }

    public function render(): string
    {
        return $this->viewPort->render();
    }

    public function loadFile(string $filename, ?array $params = []): \Frame\Contracts\View
    {
        return $this->viewPort->loadFile($filename, $params);
    }

    public function loadString(string $view, ?array $params = []): \Frame\Contracts\View
    {
        return $this->viewPort->loadString($view, $params);
    }

}