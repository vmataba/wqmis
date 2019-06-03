<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\District */

$this->title = 'Update District: ' . $model->districtName;
$this->params['breadcrumbs'][] = ['label' => 'Districts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->districtName, 'url' => ['view', 'id' => $model->district_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="district-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
