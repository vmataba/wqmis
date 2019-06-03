<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-index">
    <p>
        <?= Html::a('Create User Type', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'user_type_id',
            'user_type_code',
            'user_type_description',
            //'created_at',
            //'updated_at',
            [
                'attribute' => 'created_by',
                'value' => function ($model) {
                    return User::findOne($model->created_by)->getFullName();
                }
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{delete}'],
        ],
    ]);
    ?>


</div>
