<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
	'name' => 'Narko Info',
	'language' => 'uk-UA',
	'layout' => 'master',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'defaultRoute' => 'site/login',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'on beforeRequest' => function() {
	    $pathInfo = Yii::$app->request->pathInfo;
	    $query = Yii::$app->request->queryString;

	    if (!empty($pathInfo)) {

		    $isStringHasUpperCase = preg_match('/[A-Z]/', $pathInfo);
		    $isStringHasSlash = substr($pathInfo, -1) === '/';

		    if($isStringHasSlash || $isStringHasUpperCase) {

			    if($isStringHasUpperCase) {
				    $pathInfo = strtolower($pathInfo);
			    }

			    $url = $isStringHasSlash ? '/' . substr($pathInfo, 0, -1) : '/' . $pathInfo;

			    if ($query) {
				    $url .= '?' . $query;
			    }

			    Yii::$app->response->redirect($url, 301);
			    Yii::$app->end();
		    }

	    }
    },
    'components' => [
        'request' => [
            'cookieValidationKey' => 'FY1TA1vBRRG5PWmyDARubV29u7eFeE4w',
	        'baseUrl' => '',
            'parsers' => [
	            'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
	        'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
	                'logFile' => '@app/runtime/logs/api.log',
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => require (__DIR__ . '/route.php'),
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
