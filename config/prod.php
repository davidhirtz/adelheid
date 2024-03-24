<?php

use app\controllers\SiteController;
use davidhirtz\yii2\cms\models\Asset;
use davidhirtz\yii2\cms\models\Entry;
use davidhirtz\yii2\cms\models\Section;
use davidhirtz\yii2\cms\modules\admin\widgets\forms\EntryActiveForm;
use davidhirtz\yii2\skeleton\validators\HtmlValidator;

return [
    'name' => 'Adelheid Friseur',
    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'sitemap' => [
            'models' => [
                Entry::class,
            ],
        ],
    ],
    'container' => [
        'definitions' => [
            Asset::class => \app\models\Asset::class,
            Entry::class => \app\models\Entry::class,
            Section::class => \app\models\Section::class,
            EntryActiveForm::class => \app\modules\admin\widgets\forms\EntryActiveForm::class,

            HtmlValidator::class => [
                'allowedHtmlTags' => ['h1', 'h2', 'h3'],
                'allowedClasses' => ['btn'],
            ],
        ],
    ],
    'language' => 'de',
    'modules' => [
        'cms' => [
            'enableNestedEntries' => true,
            'controllerMap' => [
                'site' => [
                    'class' => SiteController::class,
                ],
            ],
        ],
        'media' => [
            'transformations' => [
                'xs' => [
                    'width' => 374,
                ],
                'sm' => [
                    'width' => 768,
                ],
                'md' => [
                    'width' => 1024,
                ],
                'lg' => [
                    'width' => 1480,
                ],
                'xl' => [
                    'width' => 2960,
                ],
            ],
        ],
    ],
];