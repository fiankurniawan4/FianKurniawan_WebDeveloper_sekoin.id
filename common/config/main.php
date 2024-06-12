<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tailwind' => dirname(dirname(__DIR__)),
        '@uploads' => dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'uploads',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],
];


