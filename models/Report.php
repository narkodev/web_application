<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property string $subject
 * @property string $phone
 * @property string $latitude
 * @property string $longitude
 * @property string $photo
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Report extends \yii\db\ActiveRecord
{
	const STATUS_NEW = 10;
	const STATUS_IN_PROGRESS = 5;
	const STATUS_DONE = 2;
	const STATUS_DISABLED = 0;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => TimestampBehavior::className(),
			],
		];
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        	['status', 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['subject', 'phone', 'latitude', 'longitude', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Тема',
            'phone' => 'Телефон',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'photo' => 'Фото',
            'status' => 'Статус',
	        'created_at' => 'Повiдомлення створено'
        ];
    }


    public static function getStatusList()
    {
    	return [
		    self::STATUS_NEW => 'Новий',
		    self::STATUS_IN_PROGRESS => 'В обробцi',
		    self::STATUS_DONE => 'Виконаний',
		    self::STATUS_DISABLED => 'Деактивований',
	    ];
    }

}
