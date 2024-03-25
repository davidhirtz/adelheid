<?php

namespace app\widgets;

use app\helpers\Html;
use app\models\Entry;
use davidhirtz\yii2\cms\widgets\Canvas;
use davidhirtz\yii2\cms\widgets\Gallery;

class Preview extends Gallery
{
    public ?Entry $entry = null;

    public bool $lazyLoading = true;

    public function init(): void
    {
        $this->assets = $this->entry->getVisibleAssets();
        $this->limit = 1;

        parent::init();
    }

    protected function renderAssetsInternal(array $assets): string
    {
        foreach ($assets as $asset) {
            return Canvas::widget([
                'asset' => $asset,
                'pictureOptions' => [
                    'imgOptions' => [
                        'loading' => $this->lazyLoading ? 'lazy' : 'eager',
                    ],
                ],
                'template' => '{media}',
                'wrapperOptions' => [
                    'class' => [
                        'canvas',
                        'square',
                    ],
                ],
            ]);
        }

        return Html::tag('div', '', ['class' => 'empty']);
    }
}