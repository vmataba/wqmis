<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Region */

$this->title = 'Update Region: ' . $model->regionName;
$this->params['breadcrumbs'][] = ['label' => 'Regions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->regionName, 'url' => ['view', 'id' => $model->regionID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="region-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
