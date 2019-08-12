<?php

namespace Lwwcas\Holo\Traits;

use Symfony\Component\Process\Process;
use Symfony\Component\Console\Output\OutputInterface;

trait Runable
{
    /**
     * Executes the given process.
     *
     * @param  \Symfony\Component\Process\Process                $process
     * @param  \Symfony\Component\Console\Output\OutputInterface $output
     * @return void
     */
    protected function runProcess(Process $process, OutputInterface $output) : void
    {
        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            $process->setTty(true);
        }

        $process->run(function ($type, $line) use ($output) {
            $output->write($line);
        });
    }
}
