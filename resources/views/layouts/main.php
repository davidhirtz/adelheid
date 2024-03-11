<?php
/**
 * @var View $this
 * @var string $content
 */

use app\helpers\Html;
use davidhirtz\yii2\cms\widgets\NavItems;
use davidhirtz\yii2\skeleton\web\View;
use davidhirtz\yii2\skeleton\widgets\AdminButton;
use yii\helpers\Url;

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= $this->getHtmlLangAttribute(); ?>">
    <head>
        <meta charset="<?= Yii::$app->charset; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags(); ?>
        <title><?= Html::encode($this->getDocumentTitle()); ?></title>
        <link rel="canonical" href="<?= Url::current([], true); ?>">
        <link rel="stylesheet" href="<?= $this->getFilenameWithVersion('css/site.css'); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
        <link rel="manifest" href="/site.webmanifest">
        <meta name="msapplication-config" content="/browserconfig.xml">
        <?php $this->head(); ?>
    </head>
    <body>
    <?php $this->beginBody(); ?>
    <header class="header w-12">
        <div class="container flex-lg box justify-between items-center">
            <div class="hidden block-sm">
                <a href="tel:00498614782" class="btn btn-primary uppercase">Termin unter: 0861 4782</a>
            </div>
            <div class="absolute header-logo">
                <a href="/" class="logo canvas">
                    <img src="/images/site/logo.svg" alt="Adelheid Friseur Logo">
                </a>
            </div>
            <nav class="menu hidden block-lg">
                <ul class="menu-items flex-lg items-center uppercase ">
                    <?php foreach (NavItems::getMenuItems() as $entry) {
                        ?>
                        <li class="menu-item">
                            <?= Html::link($entry, ['class' => 'nav-link']); ?>
                        </li>
                        <?php
                    } ?>
                </ul>
                <ul class="menu-icons flex justify-center hidden-lg">
                    <li class="menu-icon">
                        <a href="https://www.facebook.com/adelheidfriseur/"
                           class="block icon icon-facebook"
                           target="_blank"
                           title="Facebook"></a>
                    </li>
                    <li class="menu-icon">
                        <a href="https://www.instagram.com/hairstyle.adelheidfrisoer/"
                           class="block icon icon-instagram"
                           target="_blank"
                           title="Instagram"></a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <button class="menu-btn menu-toggle fixed hidden-lg" aria-label="Menü anzeigen"></button>
    <main class="container hidden-menu">
        <?= $content; ?>
    </main>
    <script src="<?= $this->getFilenameWithVersion('js/site.js'); ?>"></script>
    <?php if (Yii::$app->getUser()->can('entryUpdate')) {
        echo AdminButton::widget();
    } ?>
    <?php $this->endBody(); ?>
    </body>
    </html>
<?php $this->endPage(); ?>