<?php

namespace app\modules\admin\widgets\forms;

use app\models\Asset;

/**
 * @property Asset $model
 */
class AssetActiveForm extends \davidhirtz\yii2\cms\modules\admin\widgets\forms\AssetActiveForm
{
    public function init(): void
    {
        $this->fields = $this->model->isSectionAsset()
            ? [
                'status',
                'type',
                'content',
                'alt_text',
                'link',
            ]
            : [
                'status',
                'type',
                'alt_text',
            ];

        parent::init();
    }
}
