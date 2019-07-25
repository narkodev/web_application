<?php
/**
 * Created by PhpStorm.
 * User: ioszhuk
 * Date: 3/5/19
 * Time: 01:08
 */

namespace app\controllers\rest;


use app\models\City;
use app\models\CityOrganization;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\Response;

class CityController extends ActiveController
{
	public $modelClass = 'app\models\City';

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
		return City::find()
		           ->select(['id', 'name'])
		           ->orderBy('name')
		           ->asArray()->all();
	}

	public function actionView($id)
	{
		$city = City::findOne($id);

		if(!empty($city)) {
			return CityOrganization::find()->select(['name', 'phone'])
			                       ->where(['city_id' => $city->id])
			                       ->orderBy('name')
			                       ->asArray()
			                       ->all();
		} else {
			return [];
		}
	}

}