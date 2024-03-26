<?php

namespace app\widgets;

use app\helpers\Html;
use app\models\Section;
use davidhirtz\yii2\cms\widgets\Gallery;

/**
 * CSS classes used: hidden, hidden-sm, block-sm
 */
class Crossfade extends Gallery
{
    public Section $section;
    public bool $enableWrapperHeight = true;

    public function init(): void
    {
        $this->assets ??= $this->section->getVisibleAssets();

        Html::addCssClass($this->options, [
            'images',
        ]);

        parent::init();
    }

    protected function renderAssetsInternal(array $assets): string
    {
        if (count($assets) == 1) {
            $content = Canvas::widget([
                'asset' => current($assets),
            ]);

            return Html::tag('div', $content, $this->options);
        }

        $content = '';

        if ($assets) {
            $i = 0;

            Html::addCssClass($this->options, [
                'crossfade',
                'canvas',
                'z-1',
            ]);

            if ($this->enableWrapperHeight) {
                Html::addCssStyle($this->options, [
                    'padding-top' => current($assets)->file->getHeightPercentage() . '%',
                ]);
            }

            foreach ($assets as $asset) {
                $options = [
                    'enableWrapperHeight' => false,
                    'pictureOptions' => [
                        'imgOptions' => [
                            'loading' => $asset->position < 2 ? 'eager' : 'lazy',
                        ],
                    ],
                    'wrapperOptions' => [
                        'class' => [
                            'crossfade-item',
                            'canvas',
                            'cover',
                        ],
                    ],
                ];

                if (!$i++) {
                    $options['wrapperOptions']['class'][] = 'active';
                    $options['wrapperOptions']['class'][] = 'preloaded';
                }

                $content .= Canvas::widget([
                    'asset' => $asset,
                    ...$options,
                ]);
            }

            $content = Html::tag('div', $content, $this->options);
        }

        return $content;
    }
}
