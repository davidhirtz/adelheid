<?php
/**
 * @see Section::TYPE_VISUAL
 *
 * @var View $this
 * @var Section[] $sections
 */

use app\models\Section;
use app\widgets\Crossfade;
use davidhirtz\yii2\cms\widgets\AdminLink;
use davidhirtz\yii2\cms\widgets\Gallery;
use davidhirtz\yii2\skeleton\web\View;

?>
<div class="sections">
    <?php foreach ($sections as $section) {
        if ($assets = $section->getVisibleAssets()) {
            ?>
            <section class="box animate observe"
                     data-animation="fade-in"
                     id="<?= $section->getHtmlId(); ?>">
                <?= Crossfade::widget(['assets' => $assets]); ?>
                <?= AdminLink::tag($section); ?>
            </section>
            <?php
        }
    } ?>
</div>