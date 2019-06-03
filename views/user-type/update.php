<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserType */

$this->title = 'Update User Type: ' . $model->user_type_description;
$this->params['breadcrumbs'][] = ['label' => 'User Types', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->user_type_id, 'url' => ['view', 'id' => $model->user_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-type-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
