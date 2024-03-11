<?php

namespace app\modules\admin\controllers;

use davidhirtz\yii2\cms\modules\ModuleTrait;
use Yii;

/**
 * Setup default entries via the backend.
 * @noinspection PhpUnused
 */
class SetupController extends \davidhirtz\yii2\cms\modules\admin\controllers\SetupController
{
    use ModuleTrait;

    public function getCategoryAttributes(): array
    {
        return [];
    }

    public function getEntryAttributes(): array
    {
        return [
            [
                'name' => 'Home',
                'slug' => static::getModule()->entryIndexSlug,
                'title' => Yii::$app->name,
                'show_in_menu' => true,
                'show_in_footer' => true,
            ],
            [
                'name' => 'Über uns',
                'slug' => 'ueber-uns',
                'show_in_menu' => true,
                'show_in_footer' => true,
            ],
            [
                'name' => 'Team',
                'show_in_menu' => true,
                'show_in_footer' => true,
            ],
            [
                'name' => 'Preise',
                'show_in_menu' => true,
                'show_in_footer' => true,
            ],
            [
                'name' => 'Kontakt',
                'show_in_menu' => true,
                'show_in_footer' => true,
            ],
            [
                'name' => 'Impressum',
                'show_in_footer' => true,
            ],

            [
                'name' => 'Datenschutz',
                'show_in_footer' => true,
            ],
        ];
    }
}
