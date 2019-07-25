<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "administrative_law".
 *
 * @property int $id
 * @property string $name
 * @property string $full_name
 * @property string $summary
 */
class AdministrativeLaw extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'administrative_law';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'full_name', 'summary'], 'required'],
            [['summary'], 'string'],
            [['name', 'full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва статтi',
            'full_name' => 'Повна назва статтi',
            'summary' => 'Опис',
        ];
    }
}
