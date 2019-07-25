<?php

namespace app\controllers\rest;

use app\models\Category;
use app\models\Drug;
use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\filters\ContentNegotiator;
use yii\web\Response;

class DrugsController extends ActiveController
{
	public $modelClass = 'app\models\Drug';

	public static $fields = [
		'id',
		'name',
		'other_name',
		'search_name',
		'summary',
		'taking_drug',
		'drug_symptoms',
		'image',
		'storage_small_size',
		'storage_big_size',
		'storage_large_size'
	];

	public function behaviors()
	{
		$behaviors = parent::behaviors();

		$behaviors['corsFilter' ] = ['class' => Cors::className()];

		$behaviors['contentNegotiator'] = [
			'class' => ContentNegotiator::className(),
			'formats' => ['application/json' => Response::FORMAT_JSON]
		];

		return $behaviors;
	}

	public function actions() {
		$actions = parent::actions();
		unset($actions['index']);
		unset($actions['view']);
		return $actions;
	}

	public function actionIndex()
	{
		$ua = Drug::find()->select(self::$fields)->where(['name_language' => 'ua'])->with('categories')->orderBy('name')->asArray()->all();

		$en = Drug::find()->select(self::$fields)->where(['name_language' => 'en'])->with('categories')->orderBy('name')->asArray()->all();

		$result = array_merge($ua, $en);

		return $result;

	}

	public function actionView($id)
	{
		return Drug::find()->select(self::$fields)->with('categories')->where(['id' => $id])->asArray()->all();
	}

	public function actionDrugsCategories()
	{
		return Category::find()->with('drugsCategories')->asArray()->all();
	}

	public function actionDrugCategory($id)
	{
		return Category::find()->with('drugsCategories')->where(['id' => $id])->asArray()->all();
	}

}
