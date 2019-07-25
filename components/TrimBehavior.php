<?php
namespace app\components;

use yii\db\ActiveRecord;

class TrimBehavior extends \yii\base\Behavior
{
	public function events()
	{
		return [
			ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
		];
	}

	public function beforeValidate($event)
	{
		$this->owner->phone = str_replace(' ', '', $this->owner->attributes['phone']);
	}
}