<?php

namespace Lwwcas\Holo\Commands\VsCode;

use Lwwcas\Holo\Traits\Runable;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class VsCodeFont extends Command
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
            ->setName('vscode:font')
            ->setDescription('Install monospaced font with programming ligatures');
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

        // Install Fira Code Font
        $process = new Process('sudo apt install fonts-firacode');
        $this->runProcess($process, $output);

        $output->writeln("<comment>Font successfully installed. ✔</comment>");
    }

}
