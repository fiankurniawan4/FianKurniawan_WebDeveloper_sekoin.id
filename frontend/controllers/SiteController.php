<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Produk;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
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

}
