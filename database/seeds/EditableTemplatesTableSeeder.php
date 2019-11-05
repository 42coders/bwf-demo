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
    <table width="100%">
        <thead>
        <tr>
            <th>Description</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
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
                            </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">€60,-</td>
        </tr>
        </tfoot>
    </table>
                '
        ])->save();

        \BWF\DocumentTemplates\EditableTemplates\EditableTemplate::create([
            'document_template_id' => $documentTemplate->id,
            'name' => 'customer_details',
            'content' => '
                <h3>{{user.name}}</h3>
                <pre>
Street 15
123456 City
United Kingdom
</pre>
                '
        ])->save();
    }
}
