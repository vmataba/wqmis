<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Welcome to Water Quality Management Information System';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="row">
        <div class="col-sm-4">
            <img src="images/dawasa.png" class="img mx-auto d-block" style="width: 80%; margin: auto"/>
        </div>
        <div class="col-sm-6">
            <p>Please fill out the following fields to login:</p>

            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form'
            ]);
            ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">

                <?= Html::submitButton('Login', ['class' => 'btn btn-primary form-control', 'name' => 'login-button']) ?>

            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    

</div>
