<?php
/**
 * User: Pierre van Horick
 * Project: frame
 * File: Access.php
 * Date: 2019/02/07
 * Time: 19:34
 */

namespace Frame\Middleware;


use Frame\Contracts\Middleware;

class Access extends Middleware
{
    /**
     * Sanitize the input
     */
    public function handle(): void
    {
        $this->next();
    }
}