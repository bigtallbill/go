<?php
/**
 * Created by PhpStorm.
 * User: bigtallbill
 * Date: 3/26/15
 * Time: 11:05 PM
 */

namespace Bigtallbill\Go\Commands;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('add')
            ->addArgument('name', InputArgument::REQUIRED)
            ->addArgument('value', InputArgument::REQUIRED);
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->loadConfig($input);
        $this->go->addBookmark($input->getArgument('name'), $input->getArgument('value'));
    }
}
