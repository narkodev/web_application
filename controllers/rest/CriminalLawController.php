<?php
namespace app\controllers\rest;

use app\models\CriminalLaw;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\Response;

class CriminalLawController extends ActiveController
{
	public $modelClass = 'app\models\CriminalLawController';

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
		return CriminalLaw::find()
		                        ->orderBy('id')
		                        ->asArray()->all();
	}

}