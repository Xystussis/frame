<?php
/**
 * User: Pierre van Horick
 * Project: frame
 * File: Functions.php
 * Date: 2019/05/02
 * Time: 19:39
 */

use Frame\Core\Application;

/**
 * @return Application
 */
function application()
{
    $app = $_ENV['app'];
    return $app;
}

/**
 * @return \Frame\Contracts\Config
 */
function config()
{
    return \application()->getConfig();
}