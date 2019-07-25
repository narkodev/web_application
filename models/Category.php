<?php
namespace app\models;

use \yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Class Category
 * @package app\models
 * @property int $id
 * @property string $image
 */

class Category extends  ActiveRecord
{

	public static function tableName()
	{
		return "categories";
	}

	public function attributeLabels()
	{
		return [
			'name' => 'Назва категорії'
		];
	}

	public function rules()
	{
		return [
			['name', 'required']
		];
	}


	public static function getCategories()
	{
		$categories = Category::find()->all();
		$categories = ArrayHelper::map($categories, 'id', 'name');
		return $categories;
	}

	public function getDrugsCategories()
	{
		return $this->hasMany(Drug::className(), ['id' => 'drug_id'])
			->viaTable('drug_has_categories', ['category_id' => 'id'])->select(['id', 'name']);
	}


}
