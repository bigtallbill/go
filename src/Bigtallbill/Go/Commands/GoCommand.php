<?php
/**
 * Created by PhpStorm.
 * User: bigtallbill
 * Date: 3/26/15
 * Time: 10:50 PM
 */

namespace Bigtallbill\Go\Commands;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GoCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('to')
            ->addArgument('name', InputOption::VALUE_REQUIRED);
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->loadConfig($input);
        $this->go->go($input->getArgument('name'));
    }
}
