<?php
namespace app\models;

use \yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * Class Drug
 * @package app\models
 * @property int $id
 * @property string $name
 * @property string $name_language
 * @property string $other_name
 * @property string $search_name
 * @property string $summary
 * @property string $taking_drug
 * @property string $drug_symptoms
 * @property string $image
 * @property string $storage_small_size
 * @property string $storage_big_size
 * @property string $storage_large_size
 * @property int $drug_responsibility_id
 */

class Drug extends ActiveRecord
{

	public static function tableName()
	{
		return "drugs";
	}

	public function attributeLabels()
	{
		return [
			'name' => 'Назва наркотику',
			'name_language' => 'Мова назви наркотику',
			'other_name' => 'Інші назви наркотику',
			'search_name' => 'Ключові слова для пошуку за каталогом',
			'summary' => 'Опис наркотику',
			'taking_drug' => 'Вживання наркотику',
			'drug_symptoms' => 'Симптоми вживання наркотику',
			'image' => 'Зображення наркотика',
			'storage_small_size' => 'Невеликі розміри',
			'storage_big_size' => 'Великі розміри',
			'storage_large_size' => 'Особливо великі розміри'
		];
	}

	public function rules()
	{
		return [
			[['image'], 'required', 'message' => 'Необхідно додати «Зображення наркотику».'],
			[['image'], 'file', 'extensions' => 'jpg, jpeg, png'],
			[
				[
					'name', 'name_language', 'other_name', 'search_name', 'summary', 'taking_drug', 'drug_symptoms',
					'storage_small_size', 'storage_big_size', 'storage_large_size'
				], 'required'
			],
		];
	}


	public static function addRandomNumberToName($file)
	{
		$randomNumber = rand(0, 99999999);

		$file->name = $randomNumber . '-' . $file->name;
	}

	public function getUploadImage()
	{
		$imageFile = UploadedFile::getInstance($this, 'image');

		if($imageFile !== null) self::addRandomNumberToName($imageFile);

		return $imageFile;
	}

	public function saveUploadImage()
	{
		$uploadDir = "uploads/drugs/" . $this->id;

		try {
			FileHelper::createDirectory($uploadDir, 0755, true);
		} catch ( \yii\base\Exception $e ) {
			echo "Error in method saveImage(): " . $e;
			die();
		}

		$imagePath = $uploadDir . "/" . "{$this->image->baseName}.{$this->image->extension}";

		$this->image->saveAs($imagePath);
	}

	public function getCategories()
	{
		return $this->hasMany(Category::className(), ['id' => 'category_id'])
			->viaTable('drug_has_categories', ['drug_id' => 'id'])->select(['id', 'name']);
	}

}
