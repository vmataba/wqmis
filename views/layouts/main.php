<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\UserProfile;

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
        <script src="template/bower_components/jquery/dist/jquery.min.js"></script>
        <!--script src="/wqmis2/web/assets/36d5ffed/jquery.js"></script-->

        <style>
            .container{
                width: 93%;
                margin-left: 20px;
                margin-right: 20px;
            }
            .shadow {
                box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
            }
            .card{
                position: relative;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid rgba(0,0,0,.125);
                border-radius: .25rem;
            }
            .card-body{
                flex: 1 1 auto;
                padding: 1.25rem;
            }
            .shadow {
                box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;

            }
        </style>

    </head>
    <body class="hold-transition skin-blue-light fixed sidebar-mini">
        <?php $this->beginBody() ?>
        <?php
        if (Yii::$app->user->isGuest) {
            return Yii::$app->controller->redirect(['login']);
        } else {
            $user = app\models\User::findOne(Yii::$app->user->id);
            $userProfile = UserProfile::findOne(['userid' => Yii::$app->user->id]);
        }

        Yii::$app->name = 'Water Quality Management Information System (WQMIS)';
        ?>
        <div class="wrapper">

            <header class="main-header">
                <?=
                $this->render('_navbar', [
                    'showLogo' => true,
                    'userProfile' => $userProfile,
                    'user' => $user
                ])
                ?>
            </header>
            <aside class="main-sidebar">
                <?=
                $this->render('_sidebar', [
                    'userProfile' => $userProfile,
                    'user' => $user
                ])
                ?>
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