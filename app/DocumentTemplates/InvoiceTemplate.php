<?php


namespace App\DocumentTemplates;

use App\User;
use BWF\DocumentTemplates\MailTemplates\MailTemplate;
use BWF\DocumentTemplates\MailTemplates\MailTemplateInterface;

class InvoiceTemplate implements MailTemplateInterface
{
    use MailTemplate;
    use DemoTemplateData;

    protected function dataSources()
    {
        return [
            $this->dataSource($this->testOrders[0], 'order', true, 'orders'),
            $this->dataSource(new User(), 'user'),
        ];
    }

}