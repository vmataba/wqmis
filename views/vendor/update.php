<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vendor */

$this->title = 'Update Vendor with ID: ' . $model->vendor_id;
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->vendor_id, 'url' => ['view', 'id' => $model->vendor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vendor-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
