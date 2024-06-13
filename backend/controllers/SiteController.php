<?php

namespace backend\controllers;

use backend\models\Produk;
use backend\models\SignupForm;
use common\models\LoginForm;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(['dashboard/index']);
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

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', [
                'name' => $exception->getMessage(),
                'message' => $exception->getMessage(),
                'exception' => $exception
            ]);
        }
    }
}
