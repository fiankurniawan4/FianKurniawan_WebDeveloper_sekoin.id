<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'MyProduct | Home';
?>
<div class="flex flex-col justify-center items-center ">
    <div class="flex flex-wrap justify-center items-center gap-4">

        <?php if (!$produk) : ?>
            <h1 class="text-3xl font-bold">Produk tidak ada</h1>
        <?php endif; ?>
        <?php foreach ($produk as $product) : ?>
            <div class="flex flex-col items-center border rounded-md px-4 py-2 shadow-md">
                <img src="<?= Url::to('@web/uploads/' . $product->gambar) ?>" alt="<?= $product->nama ?>" class="w-32 h-32 rounded-full">
                <div class="flex flex-col items-center mt-4 gap-1">
                    <h1 class="text-xl font-bold"><?= $product->nama ?></h1>
                    <p class="text-sm"><?= $product->deskripsi ?></p>
                    <p class="text-sm">Rp <?= number_format($product->harga, 0, ',', '.') ?></p>
                    <p class="text-sm">Stok: <?= $product->stok ?></p>
                </div>

            </div>
        <?php endforeach; ?>

    </div>
    <?php
    echo \yii\widgets\LinkPager::widget([
        'pagination' => $pagination,
        'options' => ['class' => 'flex flex-row justify-center items-center mt-2 mb-4'],
        'linkOptions' => ['class' => 'join-item btn btn-outline'],
        'disabledListItemSubTagOptions' => ['class' => 'join-item btn btn-outline disabled'],
    ]);
    ?>
</div>