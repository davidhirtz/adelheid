<?php

namespace app\models;

use davidhirtz\yii2\media\models\traits\MetaImageTrait;
use davidhirtz\yii2\skeleton\validators\DynamicRangeValidator;

/**
 * @property int $theme
 * @property int $layout
 */
class Asset extends \davidhirtz\yii2\cms\models\Asset
{
    use MetaImageTrait;

    final public const THEME_DEFAULT = 1;
    final public const THEME_WHITE = self::THEME_DEFAULT;
    final public const THEME_BLACK = 2;

    final public const LAYOUT_DEFAULT = 1;
    final public const LAYOUT_CENTERED = self::LAYOUT_DEFAULT;
    final public const LAYOUT_LEFT = 2;
    final public const LAYOUT_BOTTOM = 3;

    public function rules(): array
    {
        return [
            ...parent::rules(),
            [
                ['theme', 'layout'],
                DynamicRangeValidator::class,
            ],
        ];
    }

    public function getCaptionCssClasses(): array
    {
        return self::getLayouts()[$this->layout]['cssClass'] ?? [];
    }

    public function getCssClass(): string
    {
        return trim(parent::getCssClass() . ' ' . (self::getThemes()[$this->theme]['cssClass'] ?? ''));
    }

    public static function getLayouts(): array
    {
        return [
            self::LAYOUT_CENTERED => [
                'name' => 'Zentriert/Mittig',
                'cssClass' => ['justify-center-sm', 'text-center'],
            ],
            self::LAYOUT_BOTTOM => [
                'name' => 'Zentriert/Unten',
            ],
            self::LAYOUT_LEFT => [
                'name' => 'Links/Unten',
                'cssClass' => ['text-left-sm'],
            ],
        ];
    }

    public static function getThemes(): array
    {
        return [
            self::THEME_WHITE => [
                'name' => 'Weiß',
                'cssClass' => 'inverted',
            ],
            self::THEME_BLACK => [
                'name' => 'Schwarz',
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            ...parent::attributeLabels(),
            'theme' => 'Farbe',
            'layout' => 'Layout',
        ];
    }
}
