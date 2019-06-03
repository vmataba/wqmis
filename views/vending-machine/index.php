<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VendingMachineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vending Machines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vending-machine-index">
    <p>
        <?= Html::a('Create Vending Machine', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'vending_machine_id',
            'gsm_number',
            [
                'attribute' => 'is_assigned',
                'value' => function($model) {
                    return $model->is_assigned == 1 ? 'Yes' : 'No';
                },
                'filter' => [
                    0 => 'No',
                    1 => 'Yes'
                ]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]);
    ?>


</div>
