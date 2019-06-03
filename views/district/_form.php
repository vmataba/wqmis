<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Region;

/* @var $this yii\web\View */
/* @var $model app\models\District */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="district-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'district_id')->textInput()  ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'region_id')->dropDownList(Region::getRegions(), ['prompt' => 'Select Region']) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'districtName')->textInput(['maxlength' => true]) ?>   
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
