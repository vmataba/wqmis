<?php

namespace app\controllers;

use Yii;
use app\models\Vendor;
use app\models\VendorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\VendingMachine;
use app\models\Quality;

/**
 * VendorController implements the CRUD actions for Vendor model.
 */
class VendorController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Vendor models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new VendorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vendor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Vendor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Vendor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $vendingMachine = VendingMachine::findOne($model->vending_machine_id);
            $vendingMachine->is_assigned = 1;
            $vendingMachine->save();

            \Yii::$app->session->setFlash('success', 'Vendor details have been successfully saved');
            return $this->redirect(['view', 'id' => $model->vendor_id]);
        }

        //return \yii\helpers\Json::encode($model->errors);

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vendor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        $model->updated_at = date('Y-m-d H:m:s');
        $model->updated_by = \Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'Vendor details have been successfully updated');
            return $this->redirect(['view', 'id' => $model->vendor_id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vendor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $vendingMachine = VendingMachine::findOne($model->vending_machine_id);
        $quality = Quality::findOne(['vending_machine_id' => $model->vending_machine_id]);
        if (isset($quality)) {
            $quality->delete();
        }
        $model->delete();

        $vendingMachine->is_assigned = 0;

        if ($vendingMachine->save()) {
            \Yii::$app->session->setFlash('success', "Vending Machine with ID: {$vendingMachine->vending_machine_id} has been released!");
        }



        return $this->redirect(['index']);
    }

    /**
     * Finds the Vendor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vendor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Vendor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
