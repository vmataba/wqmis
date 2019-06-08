<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\IdType;
use app\models\Region;
use app\models\District;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Vendor */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vendor-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vendor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vendor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'vendor_id',
            [
                'attribute' => 'vendor_id_type',
                'value' => IdType::findOne($model->vendor_id_type)->id_type_name
            ],
            'vending_machine_id',
            'first_name',
            'middle_name',
            'last_name',
            [
                'attribute' => 'region_id',
                'value' => Region::findOne($model->region_id)->regionName
            ],
            [
                'attribute' => 'district_id',
                'value' => District::findOne($model->district_id)->districtName
            ],
            'street',
            'phone_number',
            //'created_at',
            //'updated_at',
//           [
//               'attribute' =>  'updated_by',
//               'value' => User::findOne($model->updated_by)->getFullName()
//           ],
        ],
    ]) ?>

</div>
