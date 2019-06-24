<?php


namespace App\DocumentTemplates;

use BWF\DocumentTemplates\TemplateDataSources\TemplateDataSource;
use BWF\DocumentTemplates\TemplateDataSources\TemplateDataSourceFactory;

trait NewsletterTemplateData
{
    protected $foods = [
        [
            'id' => '1',
            'description' => 'Cheeseburger',
            'price' => 10
        ],
        [
            'id' => '2',
            'description' => 'Mango pudding',
            'price' => 20
        ],
        [
            'id' => '3',
            'description' => 'Mushroom gravy',
            'price' => 30
        ],
        [
            'id' => '4',
            'description' => 'Bacon sandwich',
            'price' => 40
        ],
    ];

    /**
     * @return TemplateDataSource[]
     */
    protected function getFood()
    {
        $dataSources = [];

        foreach ($this->foods as $food) {
            $dataSources[] = TemplateDataSourceFactory::build($food, 'food');
        }

        return collect($dataSources);
    }
}