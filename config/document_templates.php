<?php

return [

    'layout_path' => resource_path('templates'),

    /**
     * Twig sandbox configuration
     *
     * @see https://twig.symfony.com/doc/2.x/api.html#sandbox-extension
     */
    'template_sandbox' => [
        'allowedTags' => ['for'],
        'allowedFilters' => ['escape'],
        'allowedMethods' => [],
        'allowedProperties' => ['*'],
        'allowedFunctions' => []
    ],
    /**
     * Twig environment configuration
     *
     * @see https://twig.symfony.com/doc/2.x/api.html#environment-options
     */
    'twig' => [
        'environment' => [
            'debug' => false,
            'charset' => 'utf-8',
            'base_template_class' => '\Twig\Template',
            'cache' => false,
            'auto_reload' => false,
            'strict_variables' => false,
            'autoescape' => false,
            'optimizations' => -1
        ]
    ],

    'model_class' => \BWF\DocumentTemplates\DocumentTemplates\DocumentTemplateModel::class,

    'base_url' => 'document-templates',

    'pdf_renderer' => \BWF\DocumentTemplates\Renderers\BrowsershotPdfRenderer::class
];
