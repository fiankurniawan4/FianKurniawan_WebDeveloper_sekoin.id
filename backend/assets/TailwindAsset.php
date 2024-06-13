<?php

namespace backend\assets;

use Yii;
use yii\web\AssetBundle;

class TailwindAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/output.css',
    ];
}
