<?php


namespace App\DocumentTemplates;

use App\User;
use BWF\DocumentTemplates\MailTemplates\MailTemplate;
use BWF\DocumentTemplates\MailTemplates\MailTemplateInterface;

class NewsletterTemplate implements MailTemplateInterface
{
    use MailTemplate;
    use NewsletterTemplateData;

    protected function dataSources()
    {
        return [
            $this->dataSource($this->foods[0], 'food', true, 'foods'),
            $this->dataSource(new User(), 'user'),
        ];
    }

}