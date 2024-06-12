<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\assets\TailwindAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;

TailwindAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>" class="h-100">
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head()?>
</head>
<body id="body-pd">
<?php $this->beginBody()?>
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="flex-none lg:hidden">
                <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </label>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost text-xl">MyProduct</a>
        </div>
        <div class="navbar-end">
            
        </div>
    </div>
    <?=$content?>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage();
