<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta  charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue-light sidebar-mini">
        <?php $this->beginBody() ?>
        <?php
        Yii::$app->name = 'Water Quality Management Information System (WQMIS)';
        ?>
        <div class="wrapper">

            <header class="main-header">
                <?= $this->render('_navbar', ['showLogo' => false]) ?>
            </header>
            <aside class="main-sidebar">

            </aside>
            
            <div class="content-wrapper" style="background-color: #FFF; margin-top: 7px">
                <section style="margin-left: 10px; margin-right:10px">
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                    <?= Alert::widget() ?>
                    <h3><?= $this->title ?></h3>
                    <hr>
                    <?= $content ?>
                </section>
            </div>
            <footer class="main-footer">
                <?= $this->render('_footer') ?>
            </footer>

        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php
$this->endPage()?>