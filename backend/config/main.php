<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'),
        require(__DIR__ . '/../../common/config/params-local.php'),
        require(__DIR__ . '/params.php'),
        require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
	'language' => 'jp',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'account' => [
            'class' => 'app\modules\account\Account',
        ],
		'users' => [
            'class' => 'backend\modules\users\User',
        ],
        'salon' => [
            'class' => 'app\modules\salon\Salon',
        ],
		'gii' => 'yii\gii\Module',
    ],
    'components' => [
		'urlManager' => [
            'baseUrl' => '/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => []
        ],
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
		'i18n' => [
			'translations' => [
				'*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@app/messages',
					'sourceLanguage' => 'jp',
					'fileMap' => [
						'app' => 'app.php',
						'app/error' => 'error.php',
					],
				],
			],
		],
    ],
    'params' => $params,
    'aliases' => [
        '$calendar' => '@vendor/php_calendar/classes',
    ],
];
