<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 *
 * @property CityOrganization[] $cityOrganizations
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
        ];
    }

	public function behaviors() {
		return [
			'slug' => [
				'class'=> SluggableBehavior::className(),
				'attribute' => 'name',
				'immutable' => true,
			]
		];
	}

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва мicта',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityOrganizations()
    {
        return $this->hasMany(CityOrganization::className(), ['city_id' => 'id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
    public static function getDataByAttribute($attribute)
    {
    	return City::find()->select($attribute)->all();
    }

    public static function getCityID($slug)
    {
    	$model = City::find()->select(['id'])->where(['slug' => $slug])->asArray()->one();

	    return $model['id'];
    }

}

