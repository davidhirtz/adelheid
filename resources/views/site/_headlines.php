<?php
/**
 * @see Section::TYPE_DEFAULT
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
        <section class="text-center text-left-sm animate observe" id="<?= $section->getHtmlId(); ?>" data-animation="fade-in">
            <div class="wrap">
                <?php if ($name = $section->getVisibleAttribute('name')) {
                    ?>
                    <h2 class="box pb-0"><?= $name; ?></h2>
                    <?php
                } ?>
                <div class="line"></div>
            </div>
            <?= AdminLink::tag($section); ?>
        </section>
        <?php
    } ?>
</div>