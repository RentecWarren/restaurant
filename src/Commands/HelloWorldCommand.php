<?php

// 01 giving a name space
//Remember to set MyExample in the autoload.psr-4 in composer.json

namespace MyExample\Commands;

// 02 Importing the Command base class
use Symfony\Component\Console\Command\Command;
// 03 Importing the input/output interfaces
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

// 04 Defining the class extending the Command base class
class HelloWorldCommand extends Command
{
    // 05 Implementing the configure method
    protected function configure()
    {
        $this
            // 06 defining the command name
            ->setName('hello')
            // 07 defining the description of the command
            ->setDescription('Prints Hello')
            // 08 defining the help (shown with -h option)
            ->setHelp('This command prints a simple greeting.');
    }

    // 09 implementing the execute method
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // 10 using the Output for writing something
        $output->writeln("Hello, " . get_current_user() . "!");
        $output->writeln("It's " . date("l"));
        // 11 returning the success status
        return Command::SUCCESS;
    }
}