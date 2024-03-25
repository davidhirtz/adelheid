<?php
/**
 * @see Section::TYPE_GALLERY
 *
 * @var View $this
 * @var Section[] $sections
 */

use app\models\Section;
use app\widgets\Gallery;
use davidhirtz\yii2\cms\widgets\AdminLink;
use davidhirtz\yii2\skeleton\web\View;

?>
<div class="sections">
    <?php foreach ($sections as $section) {
        if ($assets = $section->getVisibleAssets()) {
            ?>
            <section class="gallery box grid-sm animate observe"
                     data-animation="fade-in"
                     id="<?= $section->getHtmlId(); ?>">
                <?= Gallery::widget(['assets' => $assets]); ?>
                <?= AdminLink::tag($section); ?>
            </section>
            <?php
        }
    } ?>
</div>