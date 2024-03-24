<?php
/**
 * @see Section::TYPE_PRICE_GRID
 *
 * @var View $this
 * @var Section[] $sections
 */

use app\models\Section;
use app\widgets\Crossfade;
use davidhirtz\yii2\cms\widgets\AdminLink;
use davidhirtz\yii2\skeleton\web\View;

?>
<div class="sections wrap">
    <?php foreach ($sections as $section) {
        ?>
        <section class="flex-sm text-center animate observe"
                 data-animation="fade-in"
                 id="<?= $section->getHtmlId(); ?>">
            <div class="box pb-0 w-6-sm w-4-md strong text-right-sm">
                <?php if ($name = $section->getVisibleAttribute('name')) {
                    ?>
                    <h2><?= $name; ?></h2>
                    <?php
                } ?>
            </div>
            <div class="box w-6-sm w-8-md text-left-sm">
                <?php if ($content = $section->getVisibleAttribute('content')) {
                    ?>
                    <div class="prose prices">
                        <?= $content; ?>
                    </div>
                    <?php
                } ?>
            </div>
            <?= AdminLink::tag($section); ?>
        </section>
        <?php
    } ?>
</div>