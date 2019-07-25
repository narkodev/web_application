<?php
namespace app\controllers\rest;

use app\models\Report;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\Response;

class ReportController extends ActiveController
{
	public $modelClass = 'app\models\Report';

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
		return $actions;
	}

	public function actionIndex()
	{
		return Report::find()
		             ->select(['id', 'subject', 'phone', 'latitude', 'longitude', 'status'])
		             ->orderBy('id')
		             ->asArray()->all();
	}
}