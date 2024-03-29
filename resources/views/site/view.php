<?php
/**
 * @see SiteController::actionView()
 *
 * @var View $this
 * @var Entry $entry
 */

use app\controllers\SiteController;
use davidhirtz\yii2\cms\models\Entry;
use davidhirtz\yii2\cms\widgets\MetaTags;
use davidhirtz\yii2\cms\widgets\Sections;
use davidhirtz\yii2\skeleton\web\View;

$cssClass = $entry->getCssClass();
$this->registerJs($cssClass ? "document.body.className='$cssClass';" : "document.body.removeAttribute('class');", $this::POS_END);

MetaTags::widget([
    'model' => $entry,
    'transformationName' => 'md',
]);

echo Sections::widget(['entry' => $entry]);

if ($entry->parent_id) {
    ?>
    <a href="/<?= $entry->parent_slug ?>" class="header-btn header-back back fixed hidden block-popup" aria-label="Zurück"></a>
    <?php
}
