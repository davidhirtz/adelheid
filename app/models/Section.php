<?php

namespace app\models;

use davidhirtz\yii2\skeleton\validators\HtmlValidator;
use Yii;

/**
 * @property-read Entry $entry {@see static::getEntry()}
 * @property-read Entry[] $entries {@see static::getEntries()}
 */
class Section extends \davidhirtz\yii2\cms\models\Section
{
    final public const TYPE_COLUMN = self::TYPE_DEFAULT;
    final public const TYPE_HEADLINE = 2;
    final public const TYPE_COLUMN_SMALL = 3;
    final public const TYPE_FULL_WIDTH = 4;
    final public const TYPE_VISUAL = 10;
    final public const TYPE_GALLERY = 12;
    final public const TYPE_PRICE_GRID = 20;

    public static function getTypes(): array
    {
        $assetOptions = [

        ];

        return [
            self::TYPE_HEADLINE => [
                'name' => 'Überschrift',
                'hiddenFields' => ['content', '#assets'],
                'viewFile' => '_headlines',
            ],
            self::TYPE_COLUMN => [
                'name' => 'Spalte',
                'cssClass' => 'w-12 w-6-sm box',
                'hiddenFields' => ['name'],
                'sizes' => [
                    'xs' => '100vw',
                    'min(620px,50vw)',
                ],
                'transformations' => ['xs', 'sm', 'md'],
            ],
            self::TYPE_COLUMN_SMALL => [
                'name' => 'Spalte (klein)',
                'cssClass' => 'w-12 w-6-sm w-3-md box text-center',
                'hiddenFields' => ['name'],
                'sizes' => [
                    'xs' => '100vw',
                    'sm' => 'min(620px,50vw)',
                    'min(250px,25vw)',
                ],
                'transformations' => ['xs', 'sm', 'md'],
            ],
            self::TYPE_FULL_WIDTH => [
                'name' => 'Zentriert',
                'cssClass' => 'w-12 box text-center',
                'hiddenFields' => ['name'],
                'sizes' => '100vw',
                'transformations' => ['xs', 'sm', 'md'],
            ],
            self::TYPE_VISUAL => [
                'name' => 'Visual',
                'cssClass' => 'w-12 w-6-sm',
                'hiddenFields' => ['name'],
                'sizes' => 'min(1480px,100vw)',
                'transformations' => ['xs', 'sm', 'md', 'lg', 'xl'],
                'viewFile' => '_visuals',
            ],
            self::TYPE_GALLERY => [
                'name' => 'Galerie',
                'viewFile' => '_galleries',
            ],
            self::TYPE_PRICE_GRID => [
                'name' => 'Preise',
                'hiddenFields' => ['#assets'],
                'viewFile' => '_prices',
            ]
        ];
    }
}
