<?php

use app\models\Quality;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Tabs;

$vendingMachineId = $qualityMeasures['vendingMachineId'];
$this->title = "Quality Measures for a Vending Machine with ID: {$vendingMachineId}";
?>

<div class="row">
    <div class="col-sm-3">
        <?= Html::label('Vending Machine ID') ?>
        <?=
        Html::dropDownList('vendingMachinesIds', $vendingMachineId, Quality::getVendingMachineIds(), [
            'class' => 'form-control',
            'prompt' => 'Select Vending Machine ID...',
            'id' => 'vendingMachineId'
        ])
        ?>
    </div>

    <div class="col-sm-3">
        <?php
//        Html::button('Vendor Details', ['class' => 'btn btn-info',
//            'style' => 'margin-top: 23px',
//            'id' => 'btnOpenModal',
//            'data-toggle' => 'modal',
//            'data-target' => '#vendingMachineDetailsModal',
//        ])
        ?>
    </div>

    <div class="col-sm-3" style="margin-top: 23px">
        <label>Status</label>
        <span class="badge badge-pill badge-success"><?= $qualityMeasures['status'] ?></span>
    </div>
</div>
<br>
<?=
Tabs::widget([
    'items' => [
        [
            'label' => 'Analysis',
            'content' => $this->render('_analysis', [
                'qualityMeasures' => $qualityMeasures
            ]),
            'active' => true
        ],
        [
            'label' => 'Vendor Details',
            'content' => $this->render('_vendor', [
                'qualityMeasures' => $qualityMeasures
            ])
        ]
    ]
]);
?>















<script>
    //Vending Machine Id
    document.getElementById('vendingMachineId').onchange = function () {
        let url = "<?= Url::to(['/site/index']) ?>&vendingMachineId=" + this.value;
        window.location.href = url;
    };
</script>
