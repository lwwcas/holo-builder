<?php

namespace Lwwcas\Holo\Commands;

use Lwwcas\Holo\Traits\Runable;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SelfUpdateCommand extends Command
{
    use Runable;

    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('self:update')
            ->setDescription('upgrade holo to latest version');
    }

    /**
     * Execute the command.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $process = new Process('cd ~/.holo git pull origin master');
        $this->runProcess($process, $output);

        $process = new Process('cd ~/.holo composer update');
        $this->runProcess($process, $output);

        $output->writeln("<comment>Holo was successfully updated ✔</comment>");
    }

}
