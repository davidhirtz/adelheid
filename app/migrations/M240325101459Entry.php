<?php

namespace app\migrations;

use app\models\Entry;
use davidhirtz\yii2\skeleton\db\traits\MigrationTrait;
use yii\db\Migration;

/**
* @noinspection PhpUnused
*/
class M240325101459Entry extends Migration
{
    use MigrationTrait;

    public function safeUp(): void
    {
        $this->addColumn(Entry::tableName(), 'theme', $this->tinyInteger(1)
        ->unsigned()
        ->notNull()
        ->defaultValue(Entry::TYPE_DEFAULT));
    }

    public function safeDown(): void
    {
        $this->dropColumn(Entry::tableName(), 'theme');
    }
}