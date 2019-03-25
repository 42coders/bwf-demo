<?php


namespace App\DocumentTemplates;

use App\User;
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplate;
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateInterface;

class DemoDocumentTemplate implements DocumentTemplateInterface
{
    use DocumentTemplate;
    use DemoTemplateData;

    protected function dataSources()
    {
        return [
            $this->dataSource((new User()), 'user', true, 'users'),
            $this->dataSource($this->testOrders[0], 'order', true, 'orders'),
            $this->dataSource($this->getTestObject(), 'test'),
        ];
    }

}