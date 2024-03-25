<?php
/**
 * @see Section::TYPE_ROW
 *
 * @var View $this
 * @var Section[] $sections
 */

use app\helpers\Html;
use app\models\Section;
use app\widgets\Crossfade;
use davidhirtz\yii2\cms\widgets\AdminLink;
use davidhirtz\yii2\skeleton\web\View;

?>
<div class="sections wrap">
    <?php
    foreach ($sections as $i => $section) {
        ?>
        <section id="<?= $section->getHtmlId(); ?>"
                 class="flex-sm items-center-lg<?= $i % 2 ? ' flex-row-reverse' : ''; ?>">
            <div class="box <?= $i % 2 ? 'pr-0' : 'pl-0'; ?> px-0-sm w-12 w-6-sm animate observe"
                 data-animation="fade-in">
                <?= Crossfade::widget([
                    'section' => $section,
                ]); ?>
            </div>
            <div class="box pt-0-d-xs w-6-sm animate observe" data-animation="fade-in">
                <?= $section->content; ?>
            </div>
            <?= AdminLink::tag($section); ?>
        </section>
        <?php
    } ?>
</div>
