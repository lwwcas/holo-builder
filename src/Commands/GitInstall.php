<?php

namespace Lwwcas\Holo\Commands;

use Lwwcas\Holo\Traits\Runable;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GitInstall extends Command
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
            ->setName('git:install')
            ->setDescription('Install git and generate a new ssh key');
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

        $process = new Process('sudo apt install git');
        $this->runProcess($process, $output);

        $process = new Process('ssh-keygen -t rsa -b 4096 -C "lucasduarte.job@gmail.com"');
        $this->runProcess($process, $output);

        $output->writeln("<comment>Git install. ✔</comment>");
        $output->writeln("<comment>SSH key generate. ✔</comment>");
    }

}
