<?php

use miloschuman\highcharts\Highcharts;
?>
<br>
<div class="row ">

    <div class="col-sm-6">
        <div class="card">
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
    </div>

    <div class="col-sm-6">
        <div class="card">
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
</div>
<br>

<div class="row">

    <div class="col-sm-6">

        <div class="card">
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
    </div>

    <div class="col-sm-6">

        <div class="card">
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
</div>