<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Report;
use app\models\Quality;

/**
 * Description of Report
 *
 *
 */
class ReportController extends Controller {

    public function actionIndex() {
        $model = new Report();

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->validate()) {

                $qualites = Quality::find()->where([
                            '>=', 'recieved_at', $model->start_date
                        ])->andWhere([
                            '<=', 'recieved_at', $model->end_date
                        ])->all();
                return $this->render('index', [
                            'model' => $model,
                            'qualities' => $qualites
                ]);
            }
        }
        return $this->render('index', [
                    'model' => $model
        ]);
    }

}
