<?php
/**
 * @see Section::TYPE_INSTAGRAM
 *
 * @var View $this
 * @var Section[] $sections
 */

use app\helpers\Html;
use app\models\Section;
use davidhirtz\yii2\cms\widgets\AdminLink;
use davidhirtz\yii2\skeleton\web\View;

?>
<div class="sections wrap">
    <?php foreach ($sections as $section) {
        ?>
        <section class="text-center animate observe"
                 data-animation="fade-in"
                 id="<?= $section->getHtmlId(); ?>">
            <h2 class="box pb-0"><?= Html::nl2br(Html::encode($section->name)) ?></h2>
            <div class="line"></div>
            <div class="box flex feed mx-auto">
                <div class="w-12 w-md-6">
                    <div class="feed-item feed-1 animate observe"
                         data-animation="fade-in-up"></div>
                    <div class="feed-item feed-4 hidden block-md animate observe"
                         data-animation="fade-in-up"
                         data-animation-delay="300ms"></div>
                </div>
                <div class="w-12 w-md-6">
                    <div class="grid">
                        <div class="w-6 w-md-12">
                            <div class="feed-item feed-2 animate observe"
                                 data-animation="fade-in-up"
                                 data-animation-delay="200ms"></div>
                        </div>
                        <div class="w-6">
                            <div class="feed-item feed-3 animate observe"
                                 data-animation="fade-in-up"
                                 data-animation-delay="600ms"></div>
                        </div>
                        <div class="w-12 w-md-6">
                            <div class="feed-item feed-5 animate observe"
                                 data-animation="fade-in-up"
                                 data-animation-delay="800ms"></div>
                        </div>
                        <div class="w-6 hidden block-md">
                            <div class="feed-item feed-6 animate observe"
                                 data-animation="fade-in-up"
                                 data-animation-delay="1s"></div>
                        </div>
                    </div>
                </div>
                <?= AdminLink::tag($section); ?>
        </section>
        <?php
    } ?>
</div>