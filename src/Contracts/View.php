<?php
/**
 * User: Pierre van Horick
 * Project: frame
 * File: View.php
 * Date: 2019/02/07
 * Time: 20:09
 */

namespace Frame\Contracts;

interface View
{
    public function render(): string;

    public function loadFile(string $filename, ?array $params = []): View;

    public function loadString(string $view, ?array $params = []): View;
}