<?php

namespace Lwwcas\Holo\Commands\VsCode;

use Lwwcas\Holo\Traits\Runable;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class VsCodeExtensions extends Command
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
            ->setName('vscode:extensions')
            ->setDescription('Install all extensions from visual studio code');
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
        // Install Extensions
        foreach ($this->extensions() as $extension) {
            $process = new Process('code --install-extension ' . $extension);
            $this->runProcess($process, $output);
        }

        $output->writeln("<comment>Extensions successfully installed. ✔</comment>");
    }

    /**
     * List of extensions for installation
     *
     * All extensions in this list will be automatically
     * installed in Visual Studio Code.
     * @return array
     */
    protected function extensions() : array
    {
        return [

            'ms-vscode.sublime-keybindings',
            'formulahendry.auto-close-tag',
            'mikestead.dotenv',
            'HookyQR.beautify',
            'eamodio.gitlens',
            'onecentlin.laravel-blade',
            'cjhowe7.laravel-blade',
            'spoeken.pasteandformat',
            'MehediDracula.php-constructor',
            'neilbrayfield.php-docblocker',
            'felixfbecker.php-intellisense',
            'MehediDracula.php-namespace-resolver',
            'Yish.php-snippets-for-vscode',
            'alefragnani.project-manager',
            'robinbentley.sass-indented',
            'bmewburn.vscode-intelephense-client',
            'ryannaddy.laravel-artisan',
            'onecentlin.laravel5-snippets',
            'codingyu.laravel-goto-view',
            'austenc.laravel-blade-spacer',
            'abusaidm.html-snippets',
            'abusaidm.html-snippets',
            'bradlc.vscode-tailwindcss',

        ];
    }

}
