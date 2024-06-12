<?php

use common\assets\UploadAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'MyProduct | Dashboard';
?>
<div class="flex flex-col justify-center items-center ">
    <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
    <p>Welcome, <?= Yii::$app->user->identity->nama ?></p>
    <div class="flex flex-col mt-4">
        <div class="flex flex-row justify-center items-center">
            <?= Html::a('Tambah Produk', ['dashboard/create'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Produk
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Stok
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($produk as $product) : ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php
                                        $imageUrl = Url::to('@web/uploads/' . $product->gambar);
                                        ?>
                                        <img src="<?= $imageUrl ?>" alt="<?= $product->nama ?>" class="w-10 h-10 object-cover rounded-full">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?= $product->nama ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?= $product->deskripsi ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Rp <?= number_format($product->harga, 0, ',', '.') ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?= $product->stok ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?= Html::a('Edit', ['dashboard/update', 'id' => $product->id], ['class' => 'text-blue-600 hover:text-blue-900']) ?>
                                        <?= Html::a('Delete', ['dashboard/delete', 'id' => $product->id], ['class' => 'text-red-600 hover:text-red-900']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                    echo \yii\widgets\LinkPager::widget([
                        'pagination' => $pagination,
                        'options' => ['class' => 'flex flex-row justify-center items-center mt-2 mb-4'],
                        'linkOptions' => ['class' => 'join-item btn btn-outline'],
                        'disabledListItemSubTagOptions' => ['class' => 'join-item btn btn-outline disabled'],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>