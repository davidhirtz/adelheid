<?php

use app\controllers\SiteController;
use davidhirtz\yii2\cms\models\Asset;
use davidhirtz\yii2\cms\models\builders\EntrySiteRelationsBuilder;
use davidhirtz\yii2\cms\models\Entry;
use davidhirtz\yii2\cms\models\Section;
use davidhirtz\yii2\cms\modules\admin\widgets\forms\AssetActiveForm;
use davidhirtz\yii2\cms\modules\admin\widgets\forms\EntryActiveForm;
use davidhirtz\yii2\cms\widgets\Canvas;
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
            AssetActiveForm::class => \app\modules\admin\widgets\forms\AssetActiveForm::class,
            Entry::class => \app\models\Entry::class,
            EntryActiveForm::class => \app\modules\admin\widgets\forms\EntryActiveForm::class,
            EntrySiteRelationsBuilder::class => \app\models\builders\EntrySiteRelationsBuilder::class,
            Section::class => \app\models\Section::class,

            Canvas::class => [
                'captionOptions' => [
                    'class' => 'caption prose flex flex-col justify-center text-center',
                ],
            ],
            HtmlValidator::class => [
                'allowedClasses' => ['btn'],
                'allowedHtmlTags' => ['h1', 'h2', 'h3'],
                'allowTables' => true,
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
                    'width' => 620,
                ],
                'md' => [
                    'width' => 1240,
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