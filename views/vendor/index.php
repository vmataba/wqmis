<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\IdType;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VendorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-index">
    <p>
        <?= Html::a('Create Vendor', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'table table-bordered table-condensed table-sm'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'vendor_id',
            [
                'attribute' => 'vendor_id_type',
                'value' => function($model) {
                    return IdType::findOne($model->vendor_id_type)->id_type_name;
                },
                'filter' => IdType::getIdTypes(),
                'filterOptions' => ['prompt' => 'Search...']
            ],
            'vending_machine_id',
            'first_name',
            'middle_name',
            'last_name',
            //'region_id',
            //'district_id',
            //'street',
            //'phone_number',
            //'created_at',
            //'updated_at',
            //'updated_by',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
