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
use Symfony\Component\Console\Question\ChoiceQuestion;

class GoCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('to')
            ->addArgument('name', InputOption::VALUE_REQUIRED, 'The bookmark to run');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->loadConfig($input);

        $searchResults = $this->go->find($input->getArgument('name'));
        $searchResults = array_keys($searchResults);
        if (count($searchResults) > 1) {
            $answer = $this->askWhichBookmarkToUse($input, $output, $searchResults);
            $this->go->go($answer);

        } elseif (count($searchResults) > 0) {
            $this->go->go($searchResults[0]);
        }
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param $searchResults
     * @return mixed
     */
    protected function askWhichBookmarkToUse(InputInterface $input, OutputInterface $output, $searchResults)
    {
// ask the user which profile to explore
        $question = new ChoiceQuestion("multiple users found, please choose one", $searchResults, 0);
        $helper = $this->getHelper('question');
        $answer = $helper->ask($input, $output, $question);
        return $answer;
    }
}
