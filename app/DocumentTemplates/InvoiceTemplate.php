<?php


namespace App\DocumentTemplates;

use App\User;
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplate;
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateInterface;

class InvoiceTemplate implements DocumentTemplateInterface
{
    use DocumentTemplate;
    use DemoTemplateData;

    protected function dataSources()
    {
        return [
            $this->dataSource($this->testOrders[0], 'order', true, 'orders'),
            $this->dataSource(new User(), 'user'),
        ];
    }

}