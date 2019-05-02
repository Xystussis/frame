<?php
/**
 * User: Pierre van Horick
 * Project: frame
 * File: JsonConfig.php.php
 * Date: 2019/05/02
 * Time: 18:09
 */

namespace Frame\Contracts;


interface Config
{
    public function get(string $item, ?string $default);
}