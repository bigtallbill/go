<?php
/**
 * Created by PhpStorm.
 * User: bigtallbill
 * Date: 3/26/15
 * Time: 10:50 PM
 */

namespace Bigtallbill\Go\Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GoCommand extends Command
{
    protected function configure()
    {
        $this->setName('to')->addArgument('bookmark');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        passthru('ssh -i ~/.ssh/alan2.pem root@54.83.1.105');
    }
}
