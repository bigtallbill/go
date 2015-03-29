<?php
/**
 * Created by PhpStorm.
 * User: bigtallbill
 * Date: 3/26/15
 * Time: 10:50 PM
 */

namespace Bigtallbill\Go\Commands;


use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FindCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('find')
            ->setDescription('finds existing bookmarks by search query')
            ->addArgument('query');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->loadConfig($input);

        $bookmarks = $this->go->find($input->getArgument('query'));
        $table = new Table($output);
        $table->setHeaders(['Bookmark', 'Command']);
        foreach ($bookmarks as $name => $command) {
            $table->addRow([$name, $command]);
        }
        $table->render();
    }
}
