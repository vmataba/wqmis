<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VendingMachine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vending-machine-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'vending_machine_id')->textInput(['maxlength' => true,'type' => 'number','min' => 1, 'disabled' => !$model->isNewRecord]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'gsm_number')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
