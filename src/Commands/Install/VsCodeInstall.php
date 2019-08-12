<?php

namespace Lwwcas\Holo\Commands\Install;

use Lwwcas\Holo\Traits\Runable;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class VsCodeInstall extends Command
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
            ->setName('install:vscode')
            ->setDescription('Install visual studio code');
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

        $process = new Process('wget -q https://packages.microsoft.com/keys/microsoft.asc -O- | sudo apt-key add -');
        $this->runProcess($process, $output);

        $process = new Process('sudo add-apt-repository "deb [arch=amd64] https://packages.microsoft.com/repos/vscode stable main"');
        $this->runProcess($process, $output);

        $process = new Process('sudo apt update');
        $this->runProcess($process, $output);

        $process = new Process('sudo apt install code');
        $this->runProcess($process, $output);

        $output->writeln("<comment>Visual studio code successfully installed. ✔</comment>");
    }

}
