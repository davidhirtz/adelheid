<?php

namespace app\widgets;

use app\helpers\Html;
use app\models\Section;
use davidhirtz\yii2\cms\widgets\Canvas;

class Gallery extends \davidhirtz\yii2\cms\widgets\Gallery
{
    public Section $section;

    public function init(): void
    {
        $this->assets ??= $this->section->getVisibleAssets();
        parent::init();
    }

    protected function renderAssetsInternal(array $assets): string
    {
        $content = '';
        $i = 1;

        foreach ($assets as $asset) {
            $options = [
                'enableWrapperHeight' => false,
                'pictureOptions' => [
                    'imgOptions' => [
                    ],
                ],
                'wrapperOptions' => [
                    'class' => [
                        'canvas',
                        'cover',
                        'square',
                    ],
                ],
            ];

            $canvas = Canvas::widget([
                'asset' => $asset,
                ...$options,
            ]);

            $content .= Html::tag('div', $canvas, [
                'class' => in_array($i, [3, 4]) ? 'gallery-wide' : null,
            ]);

            $i = $i < 6 ? ($i + 1) : 1;
        }

        return $content;
    }
}
