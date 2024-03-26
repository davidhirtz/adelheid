<?php

namespace app\migrations;

use app\models\Asset;
use davidhirtz\yii2\skeleton\db\traits\MigrationTrait;
use yii\db\Migration;

/**
 * @noinspection PhpUnused
 */

class M240326123247Asset extends Migration
{
    use MigrationTrait;

    public function safeUp(): void
    {
        $this->addColumn(Asset::tableName(), 'theme', $this->tinyInteger(1)
            ->unsigned()
            ->notNull()
            ->defaultValue(Asset::THEME_DEFAULT)
            ->after('content'));

        $this->addColumn(Asset::tableName(), 'layout', $this->tinyInteger(1)
            ->unsigned()
            ->notNull()
            ->defaultValue(Asset::LAYOUT_DEFAULT)
            ->after('theme'));
    }

    public function safeDown(): void
    {
        $this->dropColumn(Asset::tableName(), 'theme');
        $this->dropColumn(Asset::tableName(), 'layout');
    }
}