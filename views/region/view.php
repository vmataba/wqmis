<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Region */

$this->title = $model->regionName;
$this->params['breadcrumbs'][] = ['label' => 'Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="region-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->regionID], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->regionID], [
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
            //'regionID',
            'regionName',
            'created_at',
            //'updated_at',
            [
                'attribute' => 'created_by',
                'value' => function($model) {
                    return User::findOne($model->created_by)->getFullName();
                }
            ],
        //'updated_by',
        ],
    ])
    ?>

</div>
