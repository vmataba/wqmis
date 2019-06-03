<?php

use miloschuman\highcharts\Highcharts;
?>
<div class="row">

    <div class="col-sm-6 shadow">
<?=
Highcharts::widget([
    'options' => [
        'title' => ['text' => "PH Measure"],
        'chart' => [
            'type' => 'column',
        ],
        'xAxis' => [
            'categories' => $qualityMeasures['time']
        ],
        'yAxis' => [
            'title' => 'pH'
        ],
        'series' => [
            [
                'name' => 'pH', 'data' => $qualityMeasures['ph']
            ]
        ]
    ]
])
?>
    </div>

    <div class="col-sm-6">
<?=
Highcharts::widget([
    'options' => [
        'title' => ['text' => "Conductivity Measure"],
        'chart' => [
            'type' => 'column',
        ],
        'xAxis' => [
            'categories' => $qualityMeasures['time']
        ],
        'yAxis' => [
            'title' => 'Conductivity'
        ],
        'series' => [
            [
                'name' => 'Conductivity', 'data' => $qualityMeasures['conductivity']
            ]
        ]
    ]
])
?>
    </div>
</div>


<div class="row">

    <div class="col-sm-6">
<?=
Highcharts::widget([
    'options' => [
        'title' => ['text' => "Turbidity Measure"],
        'chart' => [
            'type' => 'column',
        ],
        'xAxis' => [
            'categories' => $qualityMeasures['time']
        ],
        'yAxis' => [
            'title' => 'Turbidity'
        ],
        'series' => [
            [
                'name' => 'Turbidity', 'data' => $qualityMeasures['turbidity']
            ]
        ]
    ]
])
?>
    </div>

    <div class="col-sm-6">
<?=
Highcharts::widget([
    'options' => [
        'title' => ['text' => "Temperature Measure"],
        'chart' => [
            'type' => 'column',
        ],
        'xAxis' => [
            'categories' => $qualityMeasures['time']
        ],
        'yAxis' => [
            'title' => 'Temperature'
        ],
        'series' => [
            [
                'name' => 'Temperature', 'data' => $qualityMeasures['temperature']
            ]
        ]
    ]
])
?>
    </div>
</div>