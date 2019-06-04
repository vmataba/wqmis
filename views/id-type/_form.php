<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IdType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="id-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?= $form->field($model, 'id_type_code')->textInput(['maxlength' => true,'disabled' => !$model->isNewRecord]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?= $form->field($model, 'id_type_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
