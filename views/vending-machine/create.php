<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VendingMachine */

$this->title = 'Create Vending Machine';
$this->params['breadcrumbs'][] = ['label' => 'Vending Machines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vending-machine-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
