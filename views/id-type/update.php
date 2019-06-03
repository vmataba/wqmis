<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IdType */

$this->title = 'Update Id Type: ' . $model->id_type_name;
$this->params['breadcrumbs'][] = ['label' => 'Id Types', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_type_id, 'url' => ['view', 'id' => $model->id_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="id-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
