<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Users $model */
/** @var yii\widgets\ActiveForm $form */
$this->title = 'MyProduct | Tambah Produk';
?>
<div class="flex flex-col justify-center items-center">
    <div class="flex flex-col border rounded-md shadow-md px-4 py-2">
        <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>
        <div class="w-full">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'class' => 'input input-bordered w-full']) ?>
            <?= $form->field($model, 'gambar')->fileInput(['accept' => 'image/png, image/jpeg', 'class' => 'flex flex-col file-input file-input-bordered w-full']) ?>
            <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true, 'class' => 'input input-bordered w-full']) ?>
            <?= $form->field($model, 'stok')->textInput(['class' => 'input input-bordered w-full']) ?>
            <?= $form->field($model, 'harga')->textInput(['class' => 'input input-bordered w-full']) ?>
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary w-full mt-2']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>