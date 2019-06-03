<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Region;

/* @var $this yii\web\View */
/* @var $model app\models\District */

$this->title = $model->districtName;
$this->params['breadcrumbs'][] = ['label' => 'Districts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="district-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->district_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->district_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'district_id',
            'districtName',
            [
                'attribute' => 'region_id',
                'value' => function($model) {
                    return Region::findOne($model->region_id)->regionName;
                }
            ]
        ],
    ])
    ?>

</div>
