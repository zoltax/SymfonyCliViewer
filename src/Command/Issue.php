<?php

namespace Tan\Command;


use Tan\Provider\ProviderInterface;

class Issue implements CommandInterface
{

    /**
     * @var ProviderInterface
     */
    private $provider;

    public function setProvider(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function run()
    {

        $pulls = $this->provider->issues();

        $formattedPulls = array_map(
            function ($pull) {
                return  sprintf("Pull request(#%d) by %s: %s", $pull['number'], $pull['user'], $pull['title']);
            },
            $pulls
        );

        return $formattedPulls;

    }
}