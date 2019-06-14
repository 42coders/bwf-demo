<?php


namespace App\DocumentTemplates;

use BWF\DocumentTemplates\TemplateDataSources\TemplateDataSource;
use BWF\DocumentTemplates\TemplateDataSources\TemplateDataSourceFactory;

trait DemoTemplateData
{
    protected $testOrders = [
        [
            'id' => '1',
            'description' => 'Package Basic',
            'price' => 10
        ],
        [
            'id' => '2',
            'description' => 'Package Pro',
            'price' => 20
        ],
        [
            'id' => '3',
            'description' => 'Package Advanced',
            'price' => 30
        ],
    ];

    /**
     * @return TemplateDataSource[]
     */
    protected function getTestOrders()
    {
        $dataSources = [];

        foreach ($this->testOrders as $item) {
            $dataSources[] = TemplateDataSourceFactory::build($item, 'order');
        }

        return collect($dataSources);
    }

    /**
     * @return \stdClass
     */
    protected function getTestObject()
    {
        $testObject = new \stdClass();
        $testObject->title = '';
        $testObject->name = '';

        return $testObject;
    }
}