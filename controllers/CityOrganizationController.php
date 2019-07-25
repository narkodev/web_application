<?php

namespace app\controllers;

use app\models\City;
use Yii;
use app\models\CityOrganization;
use app\models\CityOrganizationSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CityOrganizationController implements the CRUD actions for CityOrganization model.
 */
class CityOrganizationController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => \yii\filters\AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}

	public function actionIndex()
	{
		return $this->redirect(['city/index']);
	}

	public function actionShow($slug)
	{
		$cityModel = City::findOne(['slug' => $slug]);

		$model = CityOrganization::find()->with('city')->where(['city_id' => $cityModel->id])->all();

		return $this->render('show', [
			'cityModel' => $cityModel,
			'model' => $model,
			'slug' => $cityModel->slug,
		]);
	}

	/**
	 * Creates a new CityOrganization model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate($slug)
	{
		$model = new CityOrganization();

		if ($model->load(Yii::$app->request->post())) {

			if($model->save()) {
				return $this->redirect(Url::to(['city-organization/show', 'slug' => $slug]));
			}

		}
		return $this->render('create', [
			'model' => $model,
			'cityID' => City::getCityID($slug),
			'citySlug' => $slug,
		]);
	}

	/**
	 * Updates an existing CityOrganization model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($slug, $id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post())) {

			if($model->save()) {
				Yii::$app->session->setFlash('success', 'Зміни інформації збереженно.');
			} else {
				Yii::$app->session->setFlash('error', 'Виникла помилка.');
			}

			return $this->refresh();
		}

		return $this->render('update', [
			'model' => $model,
			'cityID' => City::getCityID($slug),
			'citySlug' => $slug,
		]);
	}

	/**
	 * Deletes an existing CityOrganization model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($slug, $id)
	{
		CityOrganization::deleteAll('id = :id', [':id' => $id]);

		return $this->redirect(Url::to(['city-organization/show', 'slug' => $slug]));
	}

	/**
	 * Finds the CityOrganization model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return CityOrganization the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = CityOrganization::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}

}
