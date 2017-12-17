<?php

namespace Tan\CommandLine;


class CommandLineProcessor
{

    private $options = "c";

    private $longOptions = ["command:"];

    private $userOptions = [];

    public function __construct()
    {
        $this->getOptions();
    }

    private function getOptions()
    {
        $this->userOptions = getopt($this->options, $this->longOptions);
    }

    public function getCommand()
    {
        return isset($this->userOptions['command']) ? $this->userOptions['command'] : false;
    }


}