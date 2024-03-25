<?php
/**
 * @see Section::TYPE_COLUMN
 * @see Section::TYPE_COLUMN_SMALL
 * @see Section::TYPE_COLUMN_MEDIUM
 * @see Section::TYPE_FULL_WIDTH
 *
 * @var View $this
 * @var Section[] $sections
 */

use app\models\Section;
use app\widgets\Crossfade;
use davidhirtz\yii2\cms\widgets\AdminLink;
use davidhirtz\yii2\skeleton\web\View;

?>
<div class="sections wrap flex flex-wrap">
    <?php foreach ($sections as $section) {
        ?>
        <section class="<?= $section->getCssClass(); ?> animate observe" id="<?= $section->getHtmlId(); ?>" data-animation="fade-in">
            <?php if ($assets = $section->getVisibleAssets()) {
                echo Crossfade::widget(['assets' => $assets]);
            } ?>
            <?php if ($content = $section->getVisibleAttribute('content')) {
                ?>
                <div class="prose">
                    <?= $content; ?>
                </div>
                <?php
            } ?>
            <?= AdminLink::tag($section); ?>
        </section>
        <?php
    } ?>
</div>