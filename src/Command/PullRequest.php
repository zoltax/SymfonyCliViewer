<?php

namespace Tan\Command;


use Tan\Provider\ProviderInterface;

class PullRequest implements CommandInterface
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

        $pulls = $this->provider->pulls();

        $formattedPulls = array_map(
            function ($pull) {
                return  sprintf("Issue(#%d) by %s: %s", $pull['number'], $pull['user'], $pull['title']);
            },
            $pulls
        );

        return $formattedPulls;

    }
}