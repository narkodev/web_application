<?php
namespace app\controllers;

use Yii;
use app\models\Category;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
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

		$this->view->title = 'Категорії наркотиків';

		$categories = Category::find()->all();

		return $this->render('index', compact('categories'));

	}

	public function actionAdd()
	{

		$this->view->title = 'Додавання категорії';

		$categoryModel = new Category();

		if($categoryModel->load(Yii::$app->request->post())) {

			if($categoryModel->save()) {

				Yii::$app->session->setFlash('success', 'Категорію успішно додано.');

			} else {

				Yii::$app->session->setFlash('error', 'Виникла помилка.');

			}

			return $this->refresh();

		}

		return $this->render('add', compact('categoryModel'));

	}

	public function actionEdit($id = false)
	{

		$this->view->title = 'Редагування категорії';

		$categoryModel = Category::findOne($id);

		if($categoryModel->load(Yii::$app->request->post())) {

			if($categoryModel->save()) {

				Yii::$app->session->setFlash('success', 'Категорію успішно збережено.');

			} else {

				Yii::$app->session->setFlash('error', 'Виникла помилка.');

			}

			return $this->refresh();

		}

		return $this->render('edit', compact('categoryModel'));
	}

	/**
	 * Deletes an existing Category model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id)
	{

		$this->findModel($id)->delete();

		return $this->redirect(['category/index']);
	}

	/**
	 * Finds the Koncerts model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Category the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Category::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}

}
