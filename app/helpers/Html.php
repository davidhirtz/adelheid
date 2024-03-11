<?php

namespace app\helpers;

use davidhirtz\yii2\cms\models\Entry;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class Html extends \yii\helpers\Html
{
    public static function a($text, $url = null, $options = []): string
    {
        if (!$url) {
            return parent::tag('span', $text, $options);
        }

        if (is_array($url)) {
            $url = Url::toRoute($url);
        }

        $host = trim(parse_url($url, PHP_URL_HOST) ?? '');

        if ((!empty($host) && $host !== Yii::$app->getRequest()->getHostName())) {
            $options['target'] ??= '_blank';
            $options['rel'] ??= 'noopener';
        }

        if (str_contains($url, '/uploads/')) {
            $options['download'] = true;
        }

        return parent::a($text, $url, $options);
    }

    public static function link(Entry $model, array $options = []): string
    {
        $text = ArrayHelper::remove($options, 'text', $model->name);
        return static::a(static::encode($text), $model->getRoute(), $options);
    }
}
