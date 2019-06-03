<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UserType;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'userid',
            [
                'label' => 'First Name',
                'value' => function ($model) {
                    return $model->getProfile()->first_name;
                }
            ],
//            [
//                'label' => 'Middle Name',
//                'value' => function ($model) {
//                    return $model->getProfile()->middle_name;
//                }
//            ],
            [
                'label' => 'Last Name',
                'value' => function ($model) {
                    return $model->getProfile()->last_name;
                }
            ],
            [
                'attribute' => 'user_type',
                'value' => function ($model) {
                    return UserType::findOne($model->user_type)->user_type_description;
                },
                'filter' => UserType::getUserTypes()
            ],
            'username',
            // 'password',
            // 'access_token',
            // 'auth_key',
            [
                'attribute' => 'last_login',
                'value' => function ($model) {
                    return isset($model->last_login) ? $model->last_login : 'Never';
                }
            ],
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'user_type',
            [
                'label' => '',
                'value' => function ($model) {
                    return Html::a('<i class="glyphicon glyphicon-lock" title="Reset Password"></i>', ['reset-password', 'id' => $model->userid]);
                },
                'format' => 'raw'
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{view}'],
        ],
    ]);
    ?>


</div>
