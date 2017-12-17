<?php

namespace Tan\Provider;

interface ProviderInterface
{
    public function pulls();

    public function issues();

    public function releases();

}