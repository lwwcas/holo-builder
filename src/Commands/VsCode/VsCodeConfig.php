<?php

namespace Lwwcas\Holo\Commands\VsCode;

use Lwwcas\Holo\Traits\Runable;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class VsCodeConfig extends Command
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
            ->setName('vscode:config')
            ->setDescription('Set configuration on Visual Studio Code');
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

        // Copy all config to Visual Studio Code
        $process = new Process('cp ~/.holo/.vscode/settings.json ~/.config/Code/User/settings.json');
       $this->runProcess($process, $output);

        $output->writeln("<comment>Visual Studio Configuration is Done. ✔</comment>");

    }

}
