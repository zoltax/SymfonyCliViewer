<?php

namespace Tan;

use Tan\Command\CommandFactory;
use Tan\CommandLine\CommandLineProcessor;
use Tan\Provider\GitHub;

class Engine
{

    /**
     * @var CommandLineProcessor
     */
    private $commandLineProcessor = NULL;

    public function __construct()
    {
        $this->commandLineProcessor = new CommandLineProcessor;

    }

    public function run()
    {

        $commandName = $this->commandLineProcessor->getCommand();
        $command = (new CommandFactory())->get($commandName);

        $provider = new GitHub();
        $command->setProvider($provider);

        $data = $command->run();

        foreach ($data as $line) {
            echo $line . "\n";
        }

    }



}