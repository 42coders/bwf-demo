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
            'name' => 'Document Template',
            'document_class' => \BWF\DocumentTemplates\Tests\DocumentTemplates\DemoDocumentTemplate::class,
            'layout' => 'TestIterableDataSource.html.twig'
        ]);

        $documentTemplate->save();


        \BWF\DocumentTemplates\EditableTemplates\EditableTemplate::create([
            'document_template_id' => $documentTemplate->id,
            'name' => 'user_table_rows',
            'content' => '{% for user in users %}<tr><td>{{user.id}}</td><td>{{user.name}}</td></tr>{% endfor %}' . PHP_EOL . PHP_EOL.'<tr><td>{{test.name}}</td><td>{{test.title}}</td></tr>'
        ])->save();

        \BWF\DocumentTemplates\EditableTemplates\EditableTemplate::create([
            'document_template_id' => $documentTemplate->id,
            'name' => 'order_table_rows',
            'content' => '{% for order in orders %}<tr><td>{{order.id}}</td><td>{{order.description}}</td></tr>{% endfor %}' . PHP_EOL . PHP_EOL
        ])->save();
    }
}
