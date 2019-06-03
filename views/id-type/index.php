<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IdTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Id Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="id-type-index">

    <p>
        <?= Html::a('Create Id Type', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_type_id',
            'id_type_name',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{delete}'],
        ],
    ]);
    ?>


</div>
