<?php

namespace App\Helpers;

class Version
{
    protected $version = '';

    /**
     * Version constructor.
     */
    public function __construct()
    {
        if (empty($this->version)) {
            $this->version = $this->loadVersion();
        }
    }

    public function get()
    {
        return $this->version;
    }

    private function loadVersion()
    {
        $composerObject = $this->loadFromFile();
        return $composerObject->version ?? '';
    }

    private function loadFromFile(): \stdClass
    {
        return json_decode(file_get_contents(base_path() . '/composer.json'));
    }
}