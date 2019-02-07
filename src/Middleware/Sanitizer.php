<?php

namespace Frame\Middleware;

use Frame\Contracts\Middleware;

class Sanitizer extends Middleware
{
    /**
     * Sanitize the input
     */
    public function handle(): void
    {
        $this->next();
    }

}