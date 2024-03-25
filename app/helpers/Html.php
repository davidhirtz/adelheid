<?php

namespace app\helpers;

use davidhirtz\yii2\cms\models\Entry;
use yii\helpers\ArrayHelper;

class Html extends \yii\helpers\Html
{
    public static function link(Entry $model, array $options = []): string
    {
        $text = ArrayHelper::remove($options, 'text', $model->name);
        return static::a(static::encode($text), $model->getRoute(), $options);
    }

    public static function nl2br(?string $content): string
    {
        return nl2br($content ?? '', true);
    }
}
