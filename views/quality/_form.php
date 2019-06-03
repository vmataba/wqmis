<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quality */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quality-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vending_machine_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conductivity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'turbidity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'temperature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recieved_at')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
