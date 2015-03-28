<?php
/**
 * Created by PhpStorm.
 * User: bigtallbill
 * Date: 3/28/15
 * Time: 9:54 AM
 */

namespace Bigtallbill\Go\Commands;


use Bigtallbill\Go\Go;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

class BaseCommand extends Command{

    /** @var array */
    protected $config;

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->go = new Go();
    }

    protected function configure()
    {
        $configPathDefault = getenv("HOME") . '/.go.json';
        $this->addOption('config', 'c', InputOption::VALUE_REQUIRED, 'specify the config', $configPathDefault);
    }

    protected function loadConfig(InputInterface $input)
    {
        $this->go->setStorage($input->getOption('config'));
    }
}
