<?php


namespace App;


class Package
{
    protected $name;
    protected $description;
    protected $version;

    /**
     * Package constructor.
     * @param string $rawPackageObject
     */
    public function __construct($rawPackageObject)
    {
        $this->name = $rawPackageObject->name;
        $this->version = $rawPackageObject->version;
        $this->description = $rawPackageObject->description;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }


}