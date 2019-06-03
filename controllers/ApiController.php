<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Quality;
use yii\helpers\Json;

/**
 * Description of Api
 *
 *
 */
class ApiController extends Controller {

    public function actionAddQuality($vendingMachineId, $conductivity, $ph, $turbidity, $temperature) {

        $quality = new Quality();
        $quality->vending_machine_id = $vendingMachineId;
        $quality->conductivity = $conductivity;
        $quality->pH = $ph;
        $quality->turbidity = $turbidity;
        $quality->temperature = $temperature;
        $quality->status = $quality->computeStatus();

        if ($quality->save()) {
            return Json::encode(['success' => 'Record has been saved!']);
        }
        return Json::encode(['error' => 'Failed to save']);
    }

}
