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
<div class="drawer">
  <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col">
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="flex-none lg:hidden">
                <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </label>
            </div>
            <div class="dropdown hidden lg:block">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="<?=Yii::$app->urlManager->createUrl(['site/index'])?>">Home</a></li>
                    <?php if(Yii::$app->user->isGuest) : ?>
                    <li><a href="<?=Yii::$app->urlManager->createUrl(['site/login'])?>">Login</a></li>
                    <li><a href="<?=Yii::$app->urlManager->createUrl(['site/register'])?>">Register</a></li>
                    <?php else : ?>
                    <li><a href="<?=Yii::$app->urlManager->createUrl(['site/logout'])?>">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost text-xl">MyProduct</a>
        </div>
        <div class="navbar-end">
            
        </div>
    </div>
    <?=$content?>
  </div>
  <div class="drawer-side">
    <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu p-4 w-80 min-h-full bg-base-200 gap-4">
        <div class="flex flex-col justify-center">
            <h1 class="text-xl font-bold">MyProduct</h1>
            <p class="text-sm">Welcome, <?= Yii::$app->user->isGuest ? 'Guest' : Yii::$app->user->identity->nama ?></p>
        </div>
        <li>
            <a href="<?=Yii::$app->urlManager->createUrl(['site/index'])?>" class="menu-title btn">Home</a>
        </li>
        <?php if(Yii::$app->user->isGuest) : ?>
        <li>
            <a href="<?=Yii::$app->urlManager->createUrl(['site/login'])?>" class="menu-title btn">Login</a>
        </li>
        <li>
            <a href="<?=Yii::$app->urlManager->createUrl(['site/register'])?>" class="menu-title btn
            ">Register</a>
        </li>
        <?php else : ?>
        <li>
            <a href="<?=Yii::$app->urlManager->createUrl(['site/logout'])?>" class="menu-title btn
            ">Logout</a>
        </li>
        <?php endif; ?>
    </ul>
  </div>
</div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage();
