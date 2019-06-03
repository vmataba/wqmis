<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\base\Model;

/**
 * Description of Report
 * @property string $start_date Start date for report generation
 * @property string $end_date End date for report generation
 */
class Report extends Model {

    public $start_date;
    public $end_date;

    public function rules() {
        return [
            [['start_date', 'end_date'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            ['end_date', 'compare', 'compareAttribute' => 'start_date', 'operator' => '>']
        ];
    }

    public function attributeLabels() {
        return [
            'start_date' => 'Start Date',
            'end_date' => 'End Date'
        ];
    }

}
