<?php
/**
 * User: Pierre van Horick
 * Project: frame
 * File: TwigAdapter.php
 * Date: 2019/02/07
 * Time: 20:10
 */

namespace Frame\Adapters\View;

use Frame\Contracts\View;

class TwigAdapter implements View
{
    protected $view;

    public function render(): string
    {
        return $this->view;
    }

    public function loadFile(string $filename, ?array $params = []): View
    {
        $loader = new \Twig_Loader_Filesystem(BASE_DIR.'/views');
        $twig = new \Twig_Environment($loader, [
            'cache' => BASE_DIR.'/view_cache',
        ]);

        $this->view = $twig->render($filename, $params);
        return $this;
    }

    public function loadString(string $view, ?array $params = []): View
    {
        $loader = new \Twig_Loader_Array([
            'view' => $view,
        ]);
        $twig = new \Twig_Environment($loader);

        $this->view = $twig->render('view', $params);
        return $this;
    }

}