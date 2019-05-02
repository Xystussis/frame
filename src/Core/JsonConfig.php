<?php
/**
 * User: Pierre van Horick
 * Project: frame
 * File: JsonConfig.php.php
 * Date: 2019/05/02
 * Time: 17:10
 */

namespace Frame\Core;

use Frame\Contracts\Config as ConfigContract;

class JsonConfig implements ConfigContract
{
    protected $config;

    public function __construct($config = null)
    {
        $this->config = $config;
    }

    public function get(string $configValue,?string $default = null)
    {
        if (!is_object($this->config)) {
            return $default;
        }
        $valueArray = explode('.', $configValue);
        $val = $this->config;
        foreach ($valueArray as $value) {
            if (is_object($val) && property_exists($val, $value)) {
                $val = $val->{$value};
            } elseif (is_array($val)) {
                for ($i = 0; $i < count($val); $i++) {
                    if (is_object($val[$i]) && property_exists($val[$i], $value)) {
                        $val = $val[$i]->{$value};
                    }
                }
            } else {
                $val = null;
                break;
            }
        }
        return $val ?? $default;
    }

//    public function set(String $configValue, )

}