<?php

namespace Tan\Command;


class CommandFactory
{

    public function get($name)
    {

        // sophisticated command selection algorithm

        switch ($name) {
            case 'pull':
                $class = new PullRequest();
                break;
            case 'issue':
                $class = new Issue();
                break;
            case 'release':
                $class = new Release();
                break;
            default:
                $class = new DefaultCommand();
                break;
        }

        return $class;

    }

}