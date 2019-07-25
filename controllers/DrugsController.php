<?php
namespace app\controllers;

use app\models\Category;
use app\models\Drug;
use app\models\DrugCategory;
use app\models\User;
use Yii;
use yii\db\Exception;
use yii\db\StaleObjectException;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\UploadedFile;

class DrugsController extends Controller
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
		$ua = Drug::find()->where(['name_language' => 'ua'])->orderBy('name')->all();

		$en = Drug::find()->where(['name_language' => 'en'])->orderBy('name')->all();

		$model = array_merge($ua, $en);

		return $this->render('index', [
			'model' => $model
		]);

	}

	public function actionCreate()
	{
		$drugModel = new Drug();

		$drugCategoryModel = new DrugCategory();

		$drugCategories = Category::getCategories();

		if($drugModel->load(Yii::$app->request->post()) && $drugCategoryModel->load(Yii::$app->request->post())) {

			$drugModel->image = $drugModel->getUploadImage();

			if($drugModel->validate() && $drugCategoryModel->validate()) {

				if($drugModel->save(false)) {

					$drugModel->saveUploadImage();

					$drugCategoryModel->saveSelectedCategory($drugModel->id);

					Yii::$app->session->setFlash('success', 'Наркотик успішно додано до каталогу.');

					return $this->redirect(['drugs/update', 'id' => $drugModel->id]);

				} else {

					Yii::$app->session->setFlash('success', 'Виникла помилка.');

				}

			}

		}

		return $this->render('create', compact('drugModel', 'drugCategoryModel', 'drugCategories'));
	}

	public function actionUpdate($id)
	{

		$drugModel = Drug::findOne($id);

		$drugCategoryModel = new DrugCategory();

		$drugCategoryModel->setSelectedCategoryForView($id);

		$drugCategories = Category::getCategories();

		if($drugModel->load(Yii::$app->request->post()) && $drugCategoryModel->load(Yii::$app->request->post())) {

			if(!is_string($drugModel->image) || strlen($drugModel->image) === 0) {
				$drugModel->image = $drugModel->getUploadImage();
			}

			if($drugModel->validate() && $drugCategoryModel->validate()) {

				if($drugModel->save(false)) {

					if(!is_string($drugModel->image) || strlen($drugModel->image) === 0) {
						$drugModel->saveUploadImage();
					}

					DrugCategory::updateSelectedCategory($id, $drugCategoryModel->category_id);

					Yii::$app->session->setFlash('success', 'Зміни інформації збереженно.');

				} else {

					Yii::$app->session->setFlash('error', 'Виникла помилка.');

				}

				return $this->refresh();

			}

		}

		return $this->render('update', compact('drugModel', 'drugCategoryModel', 'drugCategories'));
	}

	public function actionDelete($id)
	{
		self::removeImageFromFolder($id, true);

		Drug::deleteAll('id = :id', [':id' => $id]);

		return $this->redirect(['/']);
	}

	public function actionDeleteImage()
	{

		if(Yii::$app->request->isAjax) {

			$drugId = Yii::$app->request->post('drug_id');

			self::removeImageFromFolder($drugId);

			try {

				Yii::$app->db->createCommand( 'UPDATE drugs SET drugs.image = NULL WHERE drugs.id = ' . $drugId )->execute();

				echo 'image-was-deleted';

			} catch (Exception $e) {

				echo "Error in method actionDeleteImage(): " . $e;

				die();

			}

		}

	}

	public static function removeImageFromFolder($drugId, $removeImageFolder = false)
	{

		$drug = Drug::findOne(['id' => $drugId]);

		$pathToImage = 'uploads/drugs/' . $drugId;

		if(!$removeImageFolder) {

			$pathToImage .= '/' . $drug->image;

			unlink($pathToImage);

		} else {

			FileHelper::removeDirectory($pathToImage);

		}

	}

}