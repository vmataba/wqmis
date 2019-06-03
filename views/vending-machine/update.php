<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VendingMachine */

$this->title = 'Update Vending Machine with Id:  ' . $model->vending_machine_id;
$this->params['breadcrumbs'][] = ['label' => 'Vending Machines', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->vending_machine_id, 'url' => ['view', 'id' => $model->vending_machine_id]];


$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vending-machine-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
