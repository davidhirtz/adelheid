<?php
/**
 * @see Section::TYPE_ENTRIES
 *
 * @var View $this
 * @var Section[] $sections
 */

use app\helpers\Html;
use app\models\Section;
use app\widgets\Preview;
use davidhirtz\yii2\cms\widgets\AdminLink;
use davidhirtz\yii2\skeleton\web\View;
use yii\helpers\Url;

?>
<div class="sections wrap">
    <?php foreach ($sections as $section) {
        ?>
        <section class="box flex-sm" id="<?= $section->getHtmlId(); ?>">
            <?php foreach ($section->entries as $i => $entry) {
                ?>
                <div class="entry relative w-4-sm w-3-md animate observe" style="--i:<?= $i; ?>" data-animation="fade-in">
                    <?php if ($route = $entry->getRoute()) {
                        ?>
                        <a href="<?= $url = Url::toRoute($route) ?>"
                           aria-label="<?= Html::encode($entry->name); ?>">
                            <?= Preview::widget([
                                'entry' => $entry,
                                'lazyLoading' => $i > 3,
                            ]); ?>
                        </a>
                        <div class="entry-overlay entry-hover overlay hidden block-sm"></div>
                        <div class="entry-content entry-hover text-center">
                            <div class="prose">
                                <h2><?= Html::encode($entry->name) ?></h2>
                                <p class="strong uppercase"><?= Html::nl2br(Html::encode($entry->content)); ?></p>
                                <p><a href="<?= $url ?>" class="btn hidden-sm">Interview lesen</a></p>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo Preview::widget([
                            'entry' => $entry,
                            'lazyLoading' => $i > 3,
                        ]);
                    }
                    ?>
                </div>
                <?php
            } ?>
            <?= AdminLink::tag($section); ?>
        </section>
        <?php
    } ?>
</div>