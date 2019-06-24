<?php


namespace App\DocumentTemplates;

use App\User;
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplate;
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateInterface;

class NewsletterTemplate implements DocumentTemplateInterface
{
    use DocumentTemplate;
    use NewsletterTemplateData;

    protected function dataSources()
    {
        return [
            $this->dataSource($this->foods[0], 'food', true, 'foods'),
            $this->dataSource(new User(), 'user'),
        ];
    }

}