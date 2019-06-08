<?php
use yii\bootstrap\Modal;
use app\models\Region;
use app\models\District;
?>

<br>

<div>

    <table class="table table-striped table-bordered table-responsive">
        <tr>
            <th>First Name</th>
            <td><?= $qualityMeasures['vendor']->first_name ?></td>
        </tr>
        <tr>
            <th>Middle Name</th>
            <td><?= $qualityMeasures['vendor']->middle_name ?></td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td><?= $qualityMeasures['vendor']->last_name ?></td>
        </tr>
        <tr>
            <th>Phone number</th>
            <td><?= $qualityMeasures['vendor']->phone_number ?></td>
        </tr>
        <tr>
            <th>Street</th>
            <td><?= $qualityMeasures['vendor']->street ?></td>
        </tr>
        <tr>
            <th>District</th>
            <td><?= District::findOne($qualityMeasures['vendor']->district_id)->districtName ?></td>
        </tr>
        <tr>
            <th>Region</th>
            <td><?= Region::findOne(District::findOne($qualityMeasures['vendor']->district_id)->region_id)->regionName ?></td>
        </tr>
    </table>

</div>
