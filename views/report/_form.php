<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="report-form">

    <?php $form = ActiveForm::begin() ?>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <?= $form->field($model, 'start_date')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <?= $form->field($model, 'end_date')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <?=
            Html::submitButton('Generate Report', [
                'class' => 'btn btn-info btn-block',
                'style' => 'margin-top: 23px'
            ])
            ?>
        </div>
    </div>
<?php ActiveForm::end() ?>

</div>

