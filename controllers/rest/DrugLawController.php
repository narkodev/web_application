<?php
namespace app\controllers\rest;

use app\models\DrugLaw;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\Response;

class DrugLawController extends ActiveController
{
	public $modelClass = 'app\models\DrugLaw';

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
		return DrugLaw::find()
		              ->orderBy('id')
		              ->asArray()->all();
	}

}