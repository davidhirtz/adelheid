<?php

namespace app\models;

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
    final public const TYPE_TEXT_COLUMNS = 5;
    final public const TYPE_ROW = 6;
    final public const TYPE_HEADLINE_CENTERED = 8;
    final public const TYPE_VISUAL = 10;
    final public const TYPE_GALLERY = 12;
    final public const TYPE_ENTRIES = 20;

    public static function getTypes(): array
    {
        return [
            self::TYPE_HEADLINE => [
                'name' => 'Überschrift',
                'cssClass' => 'text-center text-left-sm',
                'hiddenFields' => ['content', '#assets'],
                'viewFile' => '_headlines',
            ],
            self::TYPE_HEADLINE_CENTERED => [
                'name' => 'Überschrift (zentriert)',
                'cssClass' => 'text-center',
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
            self::TYPE_TEXT_COLUMNS => [
                'name' => 'Textspalten',
                'cssClass' => 'w-12 box text-columns-sm',
                'hiddenFields' => ['name'],
                'sizes' => 'min(1360px,100vw)',
                'transformations' => ['xs', 'sm', 'md', 'lg', 'xl'],
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
            self::TYPE_ROW => [
                'name' => 'Zeile',
                'hiddenFields' => ['name'],
                'sizes' => [
                    'sm' => '100wv',
                    'min(740px,50vw)',
                ],
                'transformations' => ['xs', 'sm', 'md', 'lg'],
                'viewFile' => '_rows',
            ],
            self::TYPE_FULL_WIDTH => [
                'name' => 'Zentriert',
                'cssClass' => 'w-12 box text-center',
                'hiddenFields' => ['name'],
                'sizes' => 'min(1360px,100vw)',
                'transformations' => ['xs', 'sm', 'md', 'lg', 'xl'],
            ],
            self::TYPE_VISUAL => [
                'name' => 'Visual',
                'cssClass' => 'w-12 w-6-sm',
                'hiddenFields' => ['name', 'content'],
                'sizes' => 'min(1480px,100vw)',
                'transformations' => ['xs', 'sm', 'md', 'lg', 'xl'],
                'viewFile' => '_visuals',
            ],
            self::TYPE_GALLERY => [
                'name' => 'Galerie',
                'hiddenFields' => ['name', 'content'],
                'viewFile' => '_galleries',
            ],
            self::TYPE_ENTRIES => [
                'name' => 'Untereinträge',
                'hiddenFields' => ['name', 'content', '#assets'],
                'visible' => fn (self $section) => $section->entry->entry_count > 0,
                'viewFile' => '_entries',
            ]
        ];
    }
}
