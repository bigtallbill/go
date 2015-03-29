<?php
/**
 * Created by PhpStorm.
 * User: bigtallbill
 * Date: 3/28/15
 * Time: 9:53 AM
 */

namespace Bigtallbill\Go;


class GoTest extends \PHPUnit_Framework_TestCase {

    /** @var Go */
    protected $go;

    protected function setUp()
    {
        $this->go = new Go();
        $this->go->setStorage(TEST_ASSETS_DIR . '/storage.json');
    }

    public function testGo()
    {
        $this->go->addBookmark('which-command', 'which php');

        ob_start();
        $this->go->go('which-command');
        $actual = ob_get_clean();

        $this->assertContains('php', $actual, 'the command should have outputted the php path');
    }

    public function testFind()
    {
        $this->go->setStorage(TEST_ASSETS_DIR . '/full-storage.json');
        $results = $this->go->find('d');
        $this->assertCount(2, $results);

        $results = $this->go->find('which');
        $this->assertCount(1, $results);
    }
}
