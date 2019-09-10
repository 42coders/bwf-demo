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
                {% for order in orders %}
                    <tr>
                        <td>
                            {{order.description}}
                        </td>
                        <td>1</td>
                        <td>
                            €{{order.price}}
                        </td>
                    </tr>
                {% endfor %}
                '
        ])->save();

        $documentTemplate = \BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateModel::create([
            'name' => 'Newsletter',
            'document_class' => \App\DocumentTemplates\NewsletterTemplate::class,
            'layout' => 'DemoNewsletter.html.twig',
            'subject' => 'Hello, {{user.name}}'
        ]);

        $documentTemplate->save();


        \BWF\DocumentTemplates\EditableTemplates\EditableTemplate::create([
            'document_template_id' => $documentTemplate->id,
            'name' => 'food_list',
            'content' => '
                <ul>{% for food in foods %}
                    <li>{{food.description}}</li>
                    {% endfor %}
                </ul>'
        ])->save();

        \BWF\DocumentTemplates\EditableTemplates\EditableTemplate::create([
            'document_template_id' => $documentTemplate->id,
            'name' => 'greeting',
            'content' => '<p>Hi,&nbsp;{{user.name}}</p>'
        ])->save();
    }
}
