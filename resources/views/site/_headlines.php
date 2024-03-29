<?php
/**
 * @see Section::TYPE_HEADLINE
 * @see Section::TYPE_HEADLINE_CENTERED
 *
 * @var View $this
 * @var Section[] $sections
 */

use app\models\Section;
use davidhirtz\yii2\cms\widgets\AdminLink;
use davidhirtz\yii2\cms\widgets\Gallery;
use davidhirtz\yii2\skeleton\web\View;

?>
<div class="sections">
    <?php foreach ($sections as $section) {
        ?>
        <section class="<?= $section->getCssClass(); ;?> animate observe" id="<?= $section->getHtmlId(); ?>" data-animation="fade-in">
            <div class="wrap">
                    <h1 class="box pb-0"><?= $section->name ?: $section->entry->name; ?></h1>
                <div class="line"></div>
            </div>
            <?= AdminLink::tag($section); ?>
        </section>
        <?php
    } ?>
</div>