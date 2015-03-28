<?php
/**
 * Created by PhpStorm.
 * User: bigtallbill
 * Date: 3/28/15
 * Time: 9:50 AM
 */

namespace Bigtallbill\Go;


class Go {

    /** @var string */
    protected $path;

    /** @var array */
    protected $storage = [];

    public function setStorage($path)
    {
        $this->path = $path;
    }

    private function loadStorage()
    {
        if (!file_exists($this->path)) {
            $this->saveStorage();
        }

        $this->storage = json_decode(file_get_contents($this->path), true);
    }

    private function saveStorage()
    {
        file_put_contents($this->path, json_encode($this->storage));
    }

    public function addBookmark($bookmark, $value)
    {
        $this->loadStorage();

        $this->storage[$bookmark] = $value;

        $this->saveStorage();
    }

    public function removeBookmark($bookmark)
    {
        $this->loadStorage();

        unset($this->storage[$bookmark]);

        $this->saveStorage();
    }

    public function go($bookmark)
    {
        $this->loadStorage();
        passthru($this->storage[$bookmark]);
    }
}
