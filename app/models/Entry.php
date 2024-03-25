<?php

namespace app\models;

use davidhirtz\yii2\cms\models\traits\FooterAttributeTrait;
use davidhirtz\yii2\cms\models\traits\MenuAttributeTrait;
use davidhirtz\yii2\skeleton\validators\DynamicRangeValidator;

/**
 * @property int $theme
 * @property-read Section[] $sections {@see static::getSections()}
 */
class Entry extends \davidhirtz\yii2\cms\models\Entry
{
    use MenuAttributeTrait;
    use FooterAttributeTrait;

    final public const THEME_DEFAULT = 1;
    final public const THEME_GRADIENT = 2;

    public function init(): void
    {
        $this->contentType = 'text';
        parent::init();
    }

    public function rules(): array
    {
        return [
            ...parent::rules(),
            [
                ['theme'],
                DynamicRangeValidator::class,
            ],
        ];
    }

    public function getCssClass(): string
    {
        return self::getThemes()[$this->theme]['cssClass'] ?? '';
    }

    public function hasDescendantsEnabled(): bool
    {
        return parent::hasDescendantsEnabled() && !$this->parent_id;
    }

    public function getThemes(): array
    {
        return [
            static::THEME_DEFAULT => [
                'name' => 'Standard',
            ],
            static::THEME_GRADIENT => [
                'name' => 'Farbverlauf',
                'cssClass' => 'gradient',
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            ...parent::attributeLabels(),
            'theme' => 'Design',
            'content' => 'Untertitel',
        ];
    }
}
