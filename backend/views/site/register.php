<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Users $model */
/** @var yii\widgets\ActiveForm $form */
$this->title = 'MyProduct | Register';
?>
    <div class="flex justify-center items-center min-h-screen">
        <div class="flex flex-col justify-center items-center border rounded-md shadow-md px-4 py-2">
            <?php $form = ActiveForm::begin();?>
            <h1 class="text-2xl font-bold mb-4">Register</h1>
            <div class="mb-4">
                <?= $form->field($model, 'nama')->textInput(['class' => 'w-full p-2 border border-gray-400 rounded-md', 'placeholder' => 'Nama'])->label(false) ?>
            </div>
            <div class="mb-4">
                <?= $form->field($model, 'email')->textInput(['class' => 'w-full p-2 border border-gray-400 rounded-md', 'placeholder' => 'Email'])->label(false) ?>
            </div>
            <div class="mb-4">
                <?= $form->field($model, 'password')->passwordInput(['class' => 'w-full p-2 border border-gray-400 rounded-md', 'placeholder' => 'Password'])->label(false) ?>
            </div>
            <div class="mb-4">
                <?= Html::submitButton('Register', ['class' => 'btn w-full btn-primary']) ?>
            </div>
            <?php ActiveForm::end();?>
        </div>
        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div id="errorPopup" class="fixed top-0 left-0 w-full h-full items-center justify-center bg-gray-800 bg-opacity-50 hidden">
                <div class="bg-white p-8 rounded shadow-lg">
                    <div class="mb-4">
                    <h2 class="text-xl font-bold mb-2">Login Failed</h2>
                    <p class="text-red-500"><?=Yii::$app->session->getFlash('error')?></p>
                </div>
                <button id="closePopup" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Close</button>
            </div>
        <?php endif;?>
        <script>
            window.onload = function () {
                <?php
                if (Yii::$app->session->hasFlash('error')) {
                    echo 'document.getElementById("errorPopup").classList.remove("hidden");';
                }
                ?>
            };
            document.getElementById('closePopup').addEventListener('click', function () {
                document.getElementById('errorPopup').classList.add('hidden');
            });
        </script>
    </div>