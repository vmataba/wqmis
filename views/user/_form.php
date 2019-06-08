<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UserType;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($profile, 'first_name')->textInput(['maxlength' => true,'placeholder' => 'Enter first name']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($profile, 'middle_name')->textInput(['maxlength' => true,'placeholder' => 'Enter middle name (Optional)']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($profile, 'last_name')->textInput(['maxlength' => true,'placeholder' => 'Enter last name']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($profile, 'phone_number')->textInput(['maxlength' => true,'placeholder' => 'Enter phone number']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($profile, 'email')->textInput(['maxlength' => true,'placeholder' => 'Enter email address']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'user_type')->dropDownList(UserType::getUserTypes(), ['prompt' => 'Select...']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true,'placeholder' => 'Enter username']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'placeholder' => 'Enter a password or leave blank for default']) ?>
        </div>
    </div>


    <?php //$form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'access_token')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'last_login')->textInput() ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php //$form->field($model, 'updated_at')->textInput() ?>

    <?php //$form->field($model, 'created_by')->textInput() ?>

    <?php //$form->field($model, 'updated_by')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
