<?php

namespace app\models;

use Yii;
use app\components\TrimBehavior;

/**
 * This is the model class for table "city_organization".
 *
 * @property int $id
 * @property int $city_id
 * @property string $name
 * @property string $phone
 *
 * @property City $city
 */
class CityOrganization extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'city_organization';
	}

	public function behaviors() {
		return [
			'trim' => [
				'class' => TrimBehavior::className(),
			],
		];
    }

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['city_id', 'name', 'phone'], 'required'],
			[['city_id'], 'integer'],
			[['name', 'phone'], 'string', 'max' => 255],
			[['phone'], 'trim'],
			[['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
		];
	}

	public function afterFind()
	{
		$this->phone = str_replace(' ', '', $this->phone);
		return parent::afterFind();
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'city_id' => 'City ID',
			'name' => 'Назва органiзації',
			'phone' => 'Телефон',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCity()
	{
		return $this->hasOne(City::className(), ['id' => 'city_id']);
	}
}
