<?php

namespace app\widgets;

use app\helpers\Html;
use app\models\Asset;

/**
 * @property Asset|null $asset
 */
class Canvas extends \davidhirtz\yii2\cms\widgets\Canvas
{
    public function init(): void
    {
        parent::init();

        Html::addCssClass($this->captionOptions, ['prose']);

        if ($cssClass = $this->asset?->getCssClass()) {
            Html::addCssClass($this->wrapperOptions, $cssClass);
        }
    }

    protected function renderCaption(): string
    {
        $caption = parent::renderCaption();

        return $caption
            ? Html::tag('div', $caption, [
                'class' => [
                    'box',
                    'caption',
                    'flex',
                    'flex-col',
                    'justify-end',
                    'text-center',
                    ...$this->asset->getCaptionCssClasses(),
                ]
            ])
            : '';
    }
}