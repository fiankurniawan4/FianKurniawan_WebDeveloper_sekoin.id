<?php

namespace common\assets;

use yii\web\AssetBundle;
use yii\helpers\Url;

class TailwindAsset extends AssetBundle
{
    public $sourcePath = '@common/web/css';
    public $css = [
        'output.css',
    ];

    
    public function init()
    {
        parent::init();
        $this->css = array_map(function ($cssFile) {
            return Url::to($cssFile);
            
        }, $this->css);
        
    }
}
