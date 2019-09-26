<?php

namespace Lwwcas\Holo\Commands\VsCode;

use Lwwcas\Holo\Traits\Runable;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class VsCodeBuilder extends Command
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
            ->setName('vscode:build')
            ->setDescription('Set up Visual Studio Code with everything you need');
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

        $greetInput = new ArrayInput([]);

        $command = $this->getApplication()->find('vscode:font');
        $command->run($greetInput, $output);

        $command = $this->getApplication()->find('vscode:extensions');
        $command->run($greetInput, $output);

        $command = $this->getApplication()->find('vscode:config');
        $command->run($greetInput, $output);
        
        $process = new Process('composer global require friendsofphp/php-cs-fixer');
        $this->runProcess($process, $output);

        $output->writeln("<comment>Builder successfully installed. ✔</comment>");

    }

}
