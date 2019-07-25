<?php

return [
	[
		'class' => 'yii\rest\UrlRule',
		'pluralize' => false,
		'prefix' => 'api',
		'controller' => ['marker' => 'rest/marker'],
		'except' => ['create', 'update', 'delete', 'view'],
	],
	[
		'class' => 'yii\rest\UrlRule',
		'pluralize' => false,
		'prefix' => 'api',
		'controller' => ['drugs' => 'rest/drugs'],
		'except' => ['create', 'update', 'delete']
	],
	[
		'class' => 'yii\rest\UrlRule',
		'pluralize' => false,
		'prefix' => 'api',
		'controller' => ['city' => 'rest/city'],
		'except' => ['create', 'update', 'delete']
	],
	[
		'class' => 'yii\rest\UrlRule',
		'pluralize' => false,
		'prefix' => 'api',
		'controller' => ['drug-law' => 'rest/drug-law'],
		'except' => ['create', 'update', 'delete']
	],
	[
		'class' => 'yii\rest\UrlRule',
		'pluralize' => false,
		'prefix' => 'api',
		'controller' => ['administrative-law' => 'rest/administrative-law'],
		'except' => ['create', 'update', 'delete']
	],
	[
		'class' => 'yii\rest\UrlRule',
		'pluralize' => false,
		'prefix' => 'api',
		'controller' => ['criminal-law' => 'rest/criminal-law'],
		'except' => ['create', 'update', 'delete']
	],
	[
		'class' => 'yii\rest\UrlRule',
		'pluralize' => false,
		'prefix' => 'api',
		'controller' => ['report' => 'rest/report'],
		'except' => ['update', 'delete']
	],

	'city-organization' => 'city/index',
	'city-organization/<slug>' => 'city-organization/show',
	'city-organization/<slug>/create' => 'city-organization/create',
	'city-organization/<slug>/update' => 'city-organization/update',
	'city-organization/<slug>/delete' => 'city-organization/delete',

	'<controller>/<action>' => '<controller>/<action>',
];
