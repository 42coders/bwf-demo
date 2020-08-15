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
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Facades\Auth;
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
            'user' => Auth::user(),
            'orders' => $this->getTestOrders(),
            'foods' => $this->getFood(),
            'dates' => $this->getDates(),
            'text'  => 'coders',
            'number' => 42
        ];
    }

    public function show(DocumentTemplateModelInterface $documentTemplateModel)
    {

        $documentTemplate = DocumentTemplateFactory::build($documentTemplateModel);

        $templateData = $this->getTemplateData();

        foreach ($templateData as $name => $data) {
            $documentTemplate->addTemplateData($data, $name);
        }

        return $documentTemplate->render();

    }

    public function pdf(Request $request, DocumentTemplateModelInterface $documentTemplateModel)
    {

        $documentTemplate = DocumentTemplateFactory::build($documentTemplateModel);

        $templateData = $this->getTemplateData();

        foreach ($templateData as $name => $data) {
            $documentTemplate->addTemplateData($data, $name);
        }

        $pdf = $documentTemplate->renderPdf(storage_path( 'app/' . $documentTemplateModel->name . '.pdf'));
        return response()->file($pdf);

    }

    /**
     * @param PendingMail $mailer
     * @return PendingMail
     */
    private function setBcc(PendingMail $mailer){

        $bccAddress = config('mail.bcc_address');

        if(empty($bccAddress)){
            return $mailer;
        }

        $bccUser = new User();
        $bccUser->email = $bccAddress;

        $mailer->bcc($bccUser);

        return $mailer;
    }

    /**
     * @param Request $request
     * @param DocumentTemplateModelInterface $documentTemplateModel
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function email(Request $request, DocumentTemplateModelInterface $documentTemplateModel)
    {
        $user = Auth::user();

        $mailer = Mail::to($user);
        $mailer = $this->setBcc($mailer);
        $mailer->send(new TemplateMailable($documentTemplateModel, $this->getTemplateData()));

        return back()->with('status', sprintf('The email has been sent to %s!', $user->email));
    }
}
