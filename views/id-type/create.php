<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IdType */

$this->title = 'Create Id Type';
$this->params['breadcrumbs'][] = ['label' => 'Id Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="id-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
