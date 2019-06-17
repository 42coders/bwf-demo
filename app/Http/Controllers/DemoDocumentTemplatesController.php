<?php

namespace App\Http\Controllers;

use App\DemoDocumentTemplateModel;
use App\DocumentTemplates\DemoDocumentTemplate;
use App\DocumentTemplates\DemoDocumentTemplate2;
use App\DocumentTemplates\DemoTemplateData;
use App\DocumentTemplates\InvoiceTemplate;
use App\User;
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateFactory;
use BWF\DocumentTemplates\Http\Controllers\DocumentTemplatesController;
use Illuminate\Http\Request;

class DemoDocumentTemplatesController extends DocumentTemplatesController
{
    use DemoTemplateData;

    protected $documentClasses = [
//        DemoDocumentTemplate::class,
        InvoiceTemplate::class
    ];

    public function show(Request $request, $id)
    {

        $documentTemplateModel = DemoDocumentTemplateModel::findOrFail($id);
        $documentTemplate = DocumentTemplateFactory::build($documentTemplateModel);

        $testObject = new \stdClass();
        $testObject->title = 'This is the object\'s title';
        $testObject->name = 'This is the object\'s name';

        $documentTemplate->addTemplateData(User::all(), 'users');
        $documentTemplate->addTemplateData($this->getTestOrders(), 'orders');
        $documentTemplate->addTemplateData($testObject, 'test');

        return $documentTemplate->render();

    }
}
