<?php


namespace App\DocumentTemplates;

use App\User;
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplate;
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateInterface;

class DemoDocumentTemplate2 implements DocumentTemplateInterface
{
    use DocumentTemplate;
    use DemoTemplateData;

    protected function dataSources()
    {
        return [
            $this->dataSource($this->getTestObject(), 'test'),
        ];
    }

}