<?php

namespace Tan\Command;

use Tan\Provider\ProviderInterface;

interface CommandInterface
{

    public function setProvider(ProviderInterface $provider);

    public function run();

}