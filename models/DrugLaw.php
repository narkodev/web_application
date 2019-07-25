<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drug_law".
 *
 * @property int $id
 * @property string $name
 * @property string $full_name
 * @property string $summary
 */
class DrugLaw extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'drug_law';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'name' => 'Назва',
            'full_name' => 'Повна назва',
            'summary' => 'Опис',
        ];
    }
}
