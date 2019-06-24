<?php

namespace App\Http\Controllers;

use App\DemoDocumentTemplateModel;
use App\DocumentTemplates\DemoDocumentTemplate;
use App\DocumentTemplates\DemoDocumentTemplate2;
use App\DocumentTemplates\DemoTemplateData;
use App\DocumentTemplates\InvoiceTemplate;
use App\DocumentTemplates\NewsletterTemplate;
use App\DocumentTemplates\NewsletterTemplateData;
use App\User;
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateFactory;
use BWF\DocumentTemplates\Http\Controllers\DocumentTemplatesController;
use Illuminate\Http\Request;

class DemoDocumentTemplatesController extends DocumentTemplatesController
{
    use DemoTemplateData;
    use NewsletterTemplateData;

    protected $documentClasses = [
//        DemoDocumentTemplate::class,
        InvoiceTemplate::class,
        NewsletterTemplate::class
    ];

    public function show(Request $request, $id)
    {

        $documentTemplateModel = DemoDocumentTemplateModel::findOrFail($id);
        $documentTemplate = DocumentTemplateFactory::build($documentTemplateModel);

        $documentTemplate->addTemplateData(User::first(), 'user');
        $documentTemplate->addTemplateData($this->getTestOrders(), 'orders');
        $documentTemplate->addTemplateData($this->getFood(), 'foods');

        return $documentTemplate->render();

    }
}
