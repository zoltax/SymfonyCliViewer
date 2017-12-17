This a very simple CLI PHP application to show latest activity
of the Symfony project hosted on the Github.

In order to run it locally, clone this repository and install all dependencies by running  `composer install`

Executing php index.php will show you help text

You can run specific command by passing command name as a `command` param in cli.

Like: `php index.php --command pull`

Available commands:

`pull`

`issue`

`release`

Happy hacking