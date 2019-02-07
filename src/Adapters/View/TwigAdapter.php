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

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->view;
    }

    /**
     * @param string $filename
     * @param array|null $params
     * @return View
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function loadFile(string $filename, ?array $params = []): View
    {
        $loader = new \Twig_Loader_Filesystem(BASE_DIR . '/views');
        $twig = new \Twig_Environment($loader, [
            'cache' => BASE_DIR . '/view_cache',
        ]);

        $this->view = $twig->render($filename, $params);
        return $this;
    }

    /**
     * @param string $view
     * @param array|null $params
     * @return View
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
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