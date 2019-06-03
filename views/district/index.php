<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Region;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DistrictSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Districts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-index">
    <p>
        <?= Html::a('Create District', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'district_id',
            'districtName',
            [
                'attribute' => 'region_id',
                'value' => function ($model){
                    return Region::findOne($model->region_id)->regionName;
                },
                'format' => 'raw',
                'filter' => [
                    1 => 'Dar es salaam',
                    2 => 'Pwani'
                ],
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]);
    ?>


</div>
