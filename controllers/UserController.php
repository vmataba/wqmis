<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserProfile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'profile' => UserProfile::findOne(['userid' => $id])
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new User();

        $model->access_token = \Yii::$app->getSecurity()->generateRandomString();
        $model->auth_key = \Yii::$app->getSecurity()->generateRandomString();
        $model->created_at = date('Y-m-d H:i:s');
        $model->created_by = \Yii::$app->user->id;
        $default_password = \Yii::$app->getSecurity()->generatePasswordHash(User::DEFAULT_PASSWORD);

        $profile = new UserProfile();

        $dataToLoad = Yii::$app->request->post();

        if ($model->load($dataToLoad) && $profile->load($dataToLoad)) {

            if (empty($model->password)) {
                $model->password = $default_password;
            } else {
                $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            }

            if ($model->save()) {
                $profile->userid = $model->userid;

                if ($profile->save()) {
                    \Yii::$app->session->setFlash('success', 'New user has been successfully created');
                    return $this->redirect(['view', 'id' => $model->userid]);
                }
                $model->delete();
                $model->password = '';
                return $this->render('create', [
                            'model' => $model,
                            'profile' => $profile
                ]);
            }
        }
        $model->password = '';
        return $this->render('create', [
                    'model' => $model,
                    'profile' => $profile
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $profile = UserProfile::findOne(['userid' => $model->userid]);

        $saved_password = $model->password;

        $model->password = '';

        $dataToLoad = Yii::$app->request->post();

        if ($model->load($dataToLoad) && $profile->load($dataToLoad)) {

            if (empty($model->password)) {
                $model->password = $saved_password;
            } else {
                $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            }

            if ($model->save() && $profile->save()) {
                \Yii::$app->session->setFlash('success', "{$model->getFullName()} details have been successfully updated");
                return $this->redirect(['view', 'id' => $model->userid]);
            }
            return $this->render('update', [
                        'model' => $model,
                        'profile' => $profile
            ]);
        }
        return $this->render('update', [
                    'model' => $model,
                    'profile' => $profile
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        $profile = UserProfile::findOne(['userid' => $id]);
        $profile->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionResetPassword($id) {
        $model = $this->findModel($id);
        $model->password = \Yii::$app->getSecurity()->generatePasswordHash(User::DEFAULT_PASSWORD);
        if ($model->save()) {
            \Yii::$app->session->setFlash('success', 'Password has been successfully reset');
            return $this->redirect(['index']);
        }
    }

    public function actionUpdateProfileImage($id) {
        $model = $this->findModel($id);

        $directoryPath = 'uploads/user-profile/pictures/';
        $imagePath = $directoryPath . basename($directoryPath . $_FILES['profileImage']['name']);
        $imageExtension = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));


        \Yii::$app->session->setFlash('success', 'Profile Image has been successfully updated');

        return $this->redirect(['view', 'id' => $model->userid]);
    }

}
