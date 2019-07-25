<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * Class DrugCategory
 * @package app\models
 * @property int $id
 * @property string $name
 */

class DrugCategory extends ActiveRecord
{

	public static function tableName()
	{
		return "drug_has_categories";
	}

	public function attributeLabels()
	{
		return [
			'category_id' => 'Категорії наркотика'
		];
	}

	public function rules()
	{
		return [
			[['category_id'], 'required']
		];
	}

	public function saveSelectedCategory($drugId)
	{

		$selectedCategories = $this->category_id;

		$drugIdAndSelectedCategoriesArray = [];

		for($i = 0; $i < count($selectedCategories); $i++) {
			$drugIdAndSelectedCategoriesArray[] = [$drugId, $selectedCategories[$i]];
		}

		try {
			Yii::$app->db->createCommand()->batchInsert('drug_has_categories', [
				'drug_id',
				'category_id'
			], $drugIdAndSelectedCategoriesArray)->execute();
		} catch (Exception $e) {
			echo "Error in method saveSelectedCategory(): " . $e;
			die();
		}

	}

	public static function getSelectedCategory($drugId) {

		$drugCategoryModel = DrugCategory::find()->select('category_id')->where(['drug_id' => $drugId])->all();

		$selectedCategories = [];

		for($i = 0; $i < count($drugCategoryModel); $i++) {
			$selectedCategories[] = $drugCategoryModel[$i]->category_id;
		}

		return $selectedCategories;
	}


	public function setSelectedCategoryForView($drugId) {
		$this->category_id = DrugCategory::getSelectedCategory($drugId);
	}

	public static function updateSelectedCategory($drugId, $selectedCategory) {

		DrugCategory::deleteAll(['drug_id' => $drugId]);

		$drugIdAndSelectedCategoryArray = [];

		for($i = 0; $i < count($selectedCategory); $i++) {
			array_push($drugIdAndSelectedCategoryArray, [$drugId, $selectedCategory[$i]]);
		}

		try {
			Yii::$app->db->createCommand()->batchInsert('drug_has_categories', [
				'drug_id',
				'category_id'
			], $drugIdAndSelectedCategoryArray)->execute();
		} catch (Exception $e) {
			echo "Error in method updateSelectedCategory(): " . $e->getMessage();
			die();
		}

	}

}