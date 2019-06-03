<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of BaseController
 *
 * 
 */
use yii\web\Controller;

class BaseController extends Controller {

    public function beforeAction($action): bool {
        if (parent::beforeAction($action)){
            
            return true;
        }
        return false;
    }

}
