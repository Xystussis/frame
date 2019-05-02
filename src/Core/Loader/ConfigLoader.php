<?php
/**
 * User: Pierre van Horick
 * Project: frame
 * File: ConfigLoader.php
 * Date: 2019/05/02
 * Time: 16:58
 */

namespace Frame\Core\Loader;

use Frame\Contracts\Loader;
use Frame\Core\JsonConfig;

class ConfigLoader implements Loader
{
    public function load(): void
    {

        $rawConfigString = file_get_contents(BASE_DIR . '/' . 'config.json');
        $config = json_decode($rawConfigString);
        application()->setConfig(new JsonConfig($config));
    }
}