<?php

namespace Tan\Command;


use Tan\Provider\ProviderInterface;

class DefaultCommand implements CommandInterface
{

    public function setProvider(ProviderInterface $provider)
    {

    }

    public function run()
    {
        return [
            "Welcome in the CLI Symfony repo viewer",
            "Pass one the command (pull, issue, release) as a param and the magic will happen",
            "Like: php index.php --command pull"
        ];
    }
}