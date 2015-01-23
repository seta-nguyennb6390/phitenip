<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'),
        require(__DIR__ . '/../../common/config/params-local.php'),
        require(__DIR__ . '/params.php'),
        require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'account' => [
            'class' => 'app\modules\account\Account',
        ],
        'salon' => [
            'class' => 'app\modules\salon\Salon',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\AdminUser',
            'loginUrl' => ['/account/default/login'],
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
    'aliases' => [
        '$calendar' => '@vendor/php_calendar/classes',
    ],
];
