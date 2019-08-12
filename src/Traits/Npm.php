<?php

namespace Lwwcas\Builder\Traits;

trait Npm
{
    /**
     * Get the npm command for the environment.
     *
     * @return string
     */
    protected function findNpm() : string
    {
        return 'npm';
    }
}
