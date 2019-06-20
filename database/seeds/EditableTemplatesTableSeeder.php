<?php

use Illuminate\Database\Seeder;

class EditableTemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documentTemplate = \BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateModel::create([
            'name' => 'Invoice',
            'document_class' => \App\DocumentTemplates\InvoiceTemplate::class,
            'layout' => 'InvoiceTemplate.html.twig'
        ]);

        $documentTemplate->save();


        \BWF\DocumentTemplates\EditableTemplates\EditableTemplate::create([
            'document_template_id' => $documentTemplate->id,
            'name' => 'order_items',
            'content' => '
                <p>{% for order in orders %}</p>
                
                <div class="invoice-item">
                <p><i class="uil uil-cart">&nbsp;</i></p>
                
                <p class="item">{{order.description}}</p>
                
                <p class="item item-price">${{order.price}}</p>
                </div>
                
                <p>{% endfor %}</p>'
        ])->save();
    }
}