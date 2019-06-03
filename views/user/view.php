<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\UserType;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->getFullName() . ' Profile';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->userid], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->userid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
            'style' => 'display: none'
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'userid',
            [
                'label' => 'Profile Image',
                'value' => $this->render('_profile_image', [
                    'model' => $model,
                    'profile' => $profile
                ]),
                'format' => 'raw'
            ],
            [
                'label' => 'First Name',
                'value' => $profile->first_name
            ],
            [
                'label' => 'Middle Name',
                'value' => $profile->middle_name
            ],
            [
                'label' => 'Last Name',
                'value' => $profile->last_name
            ],
            'username',
            //'password',
            //'access_token',
            //'auth_key',
            [
                'attribute' => 'last_login',
                'value' => isset($model->last_login) ? $model->last_login : 'Never'
            ],
            'created_at',
            //'updated_at',
            [
                'attribute' => 'created_by',
                'value' => User::findOne($model->created_by)->getFullName()
            ],
            //'updated_by',
            [
                'attribute' => 'user_type',
                'value' => UserType::findOne($model->user_type)->user_type_description
            ]
        ],
    ])
    ?>

</div>
