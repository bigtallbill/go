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

class ListCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('list-all', 'lists all bookmarks available');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->loadConfig($input);

        $bookmarks = $this->go->getBookmarks();
        $table = new Table($output);
        $table->setHeaders(['Bookmark', 'Command']);
        foreach ($bookmarks as $name => $command) {
            $table->addRow([$name, $command]);
        }
        $table->render();
    }
}
