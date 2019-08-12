<?php

namespace Lwwcas\Holo\Traits;

trait Composer
{
    /**
     * Get the composer command for the environment.
     *
     * @return string
     */
    protected function findComposer() : string
    {
        if (file_exists(getcwd().'/composer.phar')) {
            return '"'.PHP_BINARY.'" composer.phar';
        }

        return 'composer';
    }
}
