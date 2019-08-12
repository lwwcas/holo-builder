<?php

namespace Lwwcas\Holo\Commands\Install;

use Lwwcas\Holo\Traits\Runable;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GoogleChromeInstall extends Command
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
            ->setName('install:chrome')
            ->setDescription('Install Google Chrome');
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

        $process = new Process('wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb');
        $this->runProcess($process, $output);

        $process = new Process('sudo dpkg -i google-chrome-stable_current_amd64.deb');
        $this->runProcess($process, $output);

        $output->writeln("<comment>Google Chrome successfully installed. ✔</comment>");
    }

}
