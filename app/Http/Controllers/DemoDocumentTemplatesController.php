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
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateModel;
use BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateModelInterface;
use BWF\DocumentTemplates\Http\Controllers\DocumentTemplatesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use BWF\DocumentTemplates\MailTemplates\TemplateMailable;

class DemoDocumentTemplatesController extends DocumentTemplatesController
{
    use DemoTemplateData;
    use NewsletterTemplateData;

    protected $documentClasses = [
//        DemoDocumentTemplate::class,
        InvoiceTemplate::class,
        NewsletterTemplate::class
    ];

    protected function getTemplateData()
    {
        return [
            'user' => User::first(),
            'orders' => $this->getTestOrders(),
            'foods' => $this->getFood(),
            'dates' => $this->getDates()
        ];
    }

    public function show(Request $request, $id)
    {

        $documentTemplateModel = DemoDocumentTemplateModel::findOrFail($id);
        $documentTemplate = DocumentTemplateFactory::build($documentTemplateModel);

        $templateData = $this->getTemplateData();

        foreach ($templateData as $name => $data) {
            $documentTemplate->addTemplateData($data, $name);
        }

        return $documentTemplate->render();

    }

    public function email(Request $request, DocumentTemplateModel $documentTemplate)
    {
        $user = User::first();
        Mail::to($user)->send(new TemplateMailable($documentTemplate, $this->getTemplateData()));

        return back();
    }
}
