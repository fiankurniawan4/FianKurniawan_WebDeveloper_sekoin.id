<?php

namespace common\models;

use yii\db\ActiveRecord;

class Produk extends ActiveRecord
{

    public static function tableName()
    {
        return 'produk';
    }

    public function rules()
    {
        
    }
}