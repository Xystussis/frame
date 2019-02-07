<?php
/**
 * User: Pierre van Horick
 * Project: frame
 * File: Middleware.php
 * Date: 2019/02/07
 * Time: 18:46
 */

namespace Frame\Contracts;


abstract class Middleware
{
    protected $successor;

    abstract public function handle(): void;

    /**
     * Perform the next handle in the chain (if one exists)
     */
    public function next(): void
    {
        if ($this->successor) {
            $this->successor->handle();
        }
    }

    /**
     * Set the Middleware's successor, and return that successor (for method chaining convenience)
     * @param Middleware $handler
     * @return Middleware
     */
    public function setSuccessor(Middleware $handler): Middleware
    {
        $this->successor = $handler;
        return $handler;
    }
}