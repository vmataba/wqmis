<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\IdType;
use app\models\Region;
use app\models\District;
use yii\helpers\Url;
use app\models\VendingMachine;

/* @var $this yii\web\View */
/* @var $model app\models\Vendor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendor-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'disabled' => !$model->isNewRecord]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true, 'disabled' => !$model->isNewRecord]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'disabled' => !$model->isNewRecord]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'vendor_id_type')->dropDownList(IdType::getIdTypes(), ['prompt' => 'Select...', 'disabled' => !$model->isNewRecord, 'id' => 'vendorIdType']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'vendor_id')->textInput(['disabled' => !$model->isNewRecord, 'id' => 'vendorId']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'region_id')->dropDownList(Region::getRegions(), ['prompt' => 'Select...', 'id' => 'regionsDropDown']) ?>
        </div>
        <div class="col-sm-4">
            <?php if ($model->isNewRecord): ?>
                <?= $form->field($model, 'district_id')->dropDownList([], ['id' => 'districtsDropDown', 'disabled' => $model->isNewRecord]) ?>
            <?php endif; ?>

            <?php if (!$model->isNewRecord): ?>
                <?= $form->field($model, 'district_id')->dropDownList(District::getDistricts($model->region_id), ['id' => 'districtsDropDown', 'disabled' => $model->isNewRecord]) ?>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <div class="row">

        <?php if (!$model->isNewRecord): ?>
            <div class="col-sm-4">
                <?= $form->field($model, 'vending_machine_id')->dropDownList(VendingMachine::getNonFreeVendingMachines(), ['prompt' => 'Select...', 'disabled' => true]) ?>
            </div>  
        <?php endif; ?>
        <?php if ($model->isNewRecord): ?>
            <div class="col-sm-4">
                <?= $form->field($model, 'vending_machine_id')->dropDownList(VendingMachine::getFreeVendingMachines(), ['prompt' => 'Select...']) ?>
            </div> 
        <?php endif; ?>
    </div>


    <?php //$form->field($model, 'created_at')->textInput()   ?>

    <?php //$form->field($model, 'updated_at')->textInput()   ?>

    <?php //$form->field($model, 'updated_by')->textInput()   ?>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>

    $('#regionsDropDown').change(() => {
        const regionId = $('#regionsDropDown').val();

        const url = "<?= Url::to(['district/get-districts']) ?>&regionId=" + regionId;

        $.ajax({
            url,
            success: (response) => {
                $('#districtsDropDown').attr('disabled', false);
                $('#districtsDropDown').html(response);
            },
            error: () => {
                //No Implementation
            }
        });
    });

    //Vendor Id 
    $('#vendorIdType').change(() => {

        const vendorIdDom = $('#vendorId');

        const typeNationalId = 1;
        const typeDrivingLicense = 2;
        const typeVotersId = 3;



        vendorIdDom.keyup(() => {
            const index = $('#vendorIdType').val();
            const currentValue = vendorIdDom.val();

            switch (parseInt(index)) {
                case typeNationalId:
                    let pattern1 = /(\d{8})/;
                    let pattern2 = /(\d{8})-(\d{5})/;
                    let pattern3 = /(\d{8})-(\d{5})-(\d{5})/;
                    //First 8 digits
                    if (currentValue.length <= 8) {
                        let newValue1 = currentValue.replace(pattern1, currentValue + '-');
                        vendorIdDom.val(newValue1);
                    } else if (currentValue.length >= 9 && currentValue.length <= 14) {
                        //Second 5 digits
                        let newValue2 = currentValue.replace(pattern2, currentValue + '-');
                        vendorIdDom.val(newValue2);

                    } else if (currentValue.length >= 15 && currentValue.length <= 20) {
                        let newValue3 = currentValue.replace(pattern3, currentValue + '-');
                        vendorIdDom.val(newValue3);
                    } else if (currentValue.length >= parseInt("<?= IdType::TYPE_NATIONAL_ID_SIZE ?>")) {
                        vendorIdDom.val(currentValue.substring(0, parseInt("<?= IdType::TYPE_NATIONAL_ID_SIZE ?>")));
                    }
                    break;

                case typeDrivingLicense:
                    vendorIdDom.val(currentValue.substring(0, parseInt("<?= IdType::TYPE_DRIVING_LICENSEL_ID_SIZE ?>")));
                    break;


                case typeVotersId:
                    let pattern11 = /T/;
                    let pattern21 = /T-(\d{4})/;
                    let pattern31 = /T-(\d{4})-(\d{4})/;
                    let pattern41 = /T-(\d{4})-(\d{4})-(\d{3})/;

                    if (currentValue === 'T') {
                        let newValue11 = currentValue.replace(pattern11, currentValue + '-');
                        vendorIdDom.val(newValue11);
                    } else if (currentValue.length >= 2 && currentValue.length <= 6) {
                        let newValue21 = currentValue.replace(pattern21, currentValue + '-');
                        vendorIdDom.val(newValue21);

                    } else if (currentValue.length >= 7 && currentValue.length <= 11) {
                        let newValue31 = currentValue.replace(pattern31, currentValue + '-');
                        vendorIdDom.val(newValue31);
                    } else if (currentValue.length >= 12 && currentValue.length <= 15) {
                        let newValue41 = currentValue.replace(pattern41, currentValue + '-');
                        vendorIdDom.val(newValue41);
                    } else if (currentValue.length >= parseInt("<?= IdType::TYPE_VOTERS_ID_SIZE ?>")) {
                        vendorIdDom.val(currentValue.substring(0, parseInt("<?= IdType::TYPE_VOTERS_ID_SIZE ?>")));
                    }
                    break;


            }

        }
        );

    });



</script>
