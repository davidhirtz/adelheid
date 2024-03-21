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
        <div class="container">
            <div class="navbar grid box items-center justify-center">
                <div class="phone hidden block-sm">
                    <a href="tel:00498614782" class="btn btn-primary uppercase">Termin unter: 0861 4782</a>
                </div>
                <a href="/" class="logo canvas mx-auto">
                    <img src="/images/site/logo.svg" alt="Adelheid Friseur Logo">
                </a>
                <nav class="menu hidden block-lg">
                    <ul class="flex-lg justify-end uppercase">
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
        </div>
    </header>
    <button class="menu-btn menu-toggle fixed hidden-lg" aria-label="Menü anzeigen"></button>
    <div class="content flex flex-col hidden-menu">
        <main class="container grow">
            <?= $content; ?>
        </main>
        <footer>
            <ul class="social-icons-footer social-icons list-inline">
                <li><a href="https://www.facebook.com/adelheidfriseur/" class="icon-facebook" target="_blank"></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/hairstyle.adelheidfrisoer/" class="icon-instagram"
                       target="_blank"></a>
                </li>
            </ul>
            <nav class="footer-nav strong">
                <ul class="flex-md uppercase">
                    <?php foreach (NavItems::getFooterItems() as $entry) {
                        ?>
                        <li class="footer-item">
                            <?= Html::link($entry); ?>
                        </li>
                        <?php
                    } ?>
                    <li class="footer-item hidden">
                        <button id="reset" class="uppercase">Cookies zurücksetzen</button>
                    </li>
                </ul>
            </nav>
            <a class="scroll-top arrow-top block-xl"></a>
            <div class="copyright small strong uppercase block-xl">Copyright Adelheid Friseur <?= date('Y'); ?></div>
        </footer>
    </div>
    <div id="cc" class="block-active">
        <div class="cc-content block-active">
            <p>
                Wir benötigen Ihre Zustimmung, um Cookies und Inhalte von Drittanbietern (ggf. auch aus dem EU-Ausland)
                einzubinden. Weitere Informationen in unserer <a href="/datenschutz">Datenschutzerklärung</a>.
            </p>
            <div class="cc-buttons flex">
                <button class="cc-button cc-secondary cc-hover toggle strong" data-target=".cc-content">
                    <?= Yii::t('app', 'Customize') ?>
                </button>
                <button class="cc-button cc-secondary cc-hover cc-confirm strong" data-consent="null">
                    <?= Yii::t('app', 'Reject all') ?>
                </button>
                <button class="cc-button cc-hover cc-confirm strong" data-consent="analytics,marketing">
                    <?= Yii::t('app', 'Allow all') ?>
                </button>
            </div>
        </div>
        <div class="cc-content block-active active">
            <div class="cc-wrap flex flex-col">
                <div class="cc-scrollable">
                    <div class="text-right">
                        <button class="strong small toggle" data-target=".cc-content">
                            <?= Yii::t('app', 'back') ?>
                        </button>
                    </div>
                    <div id="cc-default" class="cc-detail">
                        <div class="cc-summary flex items-center justify-between">
                            <button class="cc-title flex items-center strong toggle"
                                    data-target="#cc-default">
                                <?= Yii::t('app', 'Necessary cookies') ?>
                            </button>
                            <label class="cc-label">
                                <input type="checkbox" class="cc-checkbox" disabled data-consent="none" checked>
                            </label>
                        </div>
                        <div class="cc-description prose hidden">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore
                            </p>
                        </div>
                    </div>
                    <div id="cc-external" class="cc-detail">
                        <div class="cc-summary flex items-center justify-between">
                            <button class="cc-title flex items-center strong toggle"
                                    data-target="#cc-external">
                                <?= Yii::t('app', 'Third-party content') ?>
                            </button>
                            <label class="cc-label">
                                <input type="checkbox" class="cc-checkbox cc-hover" data-consent="external">
                            </label>
                        </div>
                        <div class="cc-description prose hidden">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore
                            </p>
                        </div>
                    </div>
                    <div id="cc-analytics" class="cc-detail">
                        <div class="cc-summary flex items-center justify-between">
                            <button class="cc-title flex items-center strong toggle"
                                    data-target="#cc-analytics">
                                <?= Yii::t('app', 'Analytics') ?>
                            </button>
                            <label class="cc-label">
                                <input type="checkbox" class="cc-checkbox cc-hover" data-consent="analytics">
                            </label>
                        </div>
                        <div class="cc-description prose hidden">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore
                            </p>
                        </div>
                    </div>
                    <div id="cc-marketing" class="cc-detail">
                        <div class="cc-summary flex items-center justify-between">
                            <button class="cc-title flex items-center strong toggle"
                                    data-target="#cc-marketing">
                                <?= Yii::t('app', 'Marketing') ?>
                            </button>
                            <label class="cc-label">
                                <input type="checkbox" class="cc-checkbox cc-hover" data-consent="marketing">
                            </label>
                        </div>
                        <div class="cc-description prose hidden">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore
                            </p>
                        </div>
                    </div>
                </div>
                <div class="cc-buttons flex">
                    <button class="cc-button cc-hover cc-confirm strong">
                        <?= Yii::t('app', 'Allow selected') ?>
                    </button>
                    <button class="cc-button cc-secondary cc-hover cc-confirm strong"
                            data-consent="analytics,external,marketing">
                        <?= Yii::t('app', 'Allow all') ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php if (Yii::$app->getUser()->can('entryUpdate')) {
        echo AdminButton::widget();
    } ?>
    <?php $this->endBody(); ?>
    <script src="<?= $this->getFilenameWithVersion('js/site.js'); ?>"></script>
    </body>
    </html>
<?php $this->endPage(); ?>