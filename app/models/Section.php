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
    final public const TYPE_FULL_WIDTH = 2;
    final public const TYPE_VISUAL = 10;

    public static function getTypes(): array
    {
        $assetOptions = [

        ];

        return [
            self::TYPE_COLUMN => [
                'name' => 'Spalte',
                'cssClass' => 'w-12 w-6-sm box',
                'hiddenFields' => [],
                'sizes' => [],
                'transformations' => [],
            ],
            self::TYPE_VISUAL => [
                'name' => 'Visual',
                'cssClass' => 'w-12 w-6-sm',
                'hiddenFields' => ['name'],
                'sizes' => 'min(1480px,100vw)',
                'transformations' => ['xs', 'sm', 'md', 'lg', 'xl'],
                'viewFile' => '_visuals',
            ],
        ];
    }
}
