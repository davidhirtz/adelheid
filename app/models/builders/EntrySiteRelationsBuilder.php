<?php

namespace app\models\builders;

use app\models\Entry;
use app\models\Section;
use Yii;

/**
 * @property Entry $entry
 */
class EntrySiteRelationsBuilder extends \davidhirtz\yii2\cms\models\builders\EntrySiteRelationsBuilder
{
    protected function loadSectionEntries(): void
    {
        foreach ($this->entry->sections as $section) {
            if ($section->type == Section::TYPE_ENTRIES) {
                $this->loadChildEntries();
            }
        }

        parent::loadSectionEntries();
    }

    protected function loadChildEntries(): void
    {
        // No need to load child entries if they are already populated
        if ($this->entry->isRelationPopulated('children')) {
            return;
        }

        Yii::debug('Loading child entries ...');

        $entries = $this->getEntryQuery()
            ->andWhere(['parent_id' => $this->entry->id])
            ->orderBy('position')
            ->all();

        $this->entry->setChildren($entries);

        $this->entries = [
            ...$this->entries,
            ...$entries
        ];
    }

    protected function populateSectionEntryRelations(): void
    {
        foreach ($this->entry->sections as $section) {
            if ($section->type == Section::TYPE_ENTRIES) {
                $this->populateChildEntryRelations($section);
            }
        }

        parent::populateSectionEntryRelations();
    }

    protected function populateChildEntryRelations(Section $section): void
    {
        $section->populateRelation('entries', $this->entry->children);
    }
}