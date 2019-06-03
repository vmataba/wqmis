<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QualitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quality-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'vending_machine_id') ?>

    <?= $form->field($model, 'conductivity') ?>

    <?= $form->field($model, 'pH') ?>

    <?= $form->field($model, 'turbidity') ?>

    <?php // echo $form->field($model, 'temperature') ?>

    <?php // echo $form->field($model, 'recieved_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
