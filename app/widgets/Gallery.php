<?php

namespace app\widgets;

use app\helpers\Html;
use app\models\Section;
use davidhirtz\yii2\media\helpers\Sizes;

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
            $isWide = in_array($i, [3, 4]);

            $options = [
                'enableWrapperHeight' => false,
                'pictureOptions' => [
                    'sizes' => Sizes::format([
                        'sm' => '100vw',
                        $isWide ? 'min(740px,50vw)' : 'min(370px,25vw)',
                    ]),
                    'transformations' => $isWide
                        ? ['xs', 'sm', 'md', 'lg']
                        : ['xs', 'sm', 'md'],
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
                'class' => $isWide ? 'gallery-wide' : null,
            ]);

            $i = $i < 6 ? ($i + 1) : 1;
        }

        return $content;
    }
}
