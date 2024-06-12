<?php

namespace backend\controllers;

use backend\models\Produk;
use backend\models\SignupForm;
use common\models\LoginForm;
use Yii;

class DashboardController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        if (Yii::$app->user->identity->role == 'user') {
            Yii::$app->user->logout();
            return $this->redirect(['site/login']);
        }
        $produk = Produk::find()->all();
        $pagination = new \yii\data\Pagination([
            'totalCount' => count($produk),
            'pageSize' => 5
        ]);
        $produk = array_slice($produk, $pagination->offset, $pagination->limit);
        return $this->render('index', [
            'produk' => $produk,
            'pagination' => $pagination
        ]);
    }

    public function actionCreate()
    {
        if(\Yii::$app->user->isGuest) {
            return $this->redirect(['users/login']);
        }
        $model = new Produk();
        $model->scenario = 'create';
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(['dashboard/index']);
        }
        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role == 'admin') {
            return $this->redirect(['index']);
        }
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('site/register', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        if(\Yii::$app->user->isGuest) {
            return $this->redirect(['users/login']);
        }
        $model = Produk::findOne($id);
        $model->scenario = 'update';
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(['dashboard/index']);
        }
        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        if(\Yii::$app->user->isGuest) {
            return $this->redirect(['users/login']);
        }
        $model = Produk::findOne($id);
        $model->deleteOldImage();
        $model->deleteFrontendImage();
        $model->delete();
        return $this->redirect(['dashboard/index']);
    }
}
