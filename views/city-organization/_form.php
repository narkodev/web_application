<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CityOrganization */
/* @var $form yii\widgets\ActiveForm */
/* @var integer $cityID */
/* @var string $citySlug */
?>

<?= $this->render('status', ['citySlug' => $citySlug]) ?>

<div class="city-organization-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'city_id')->textInput([
		'type' => 'hidden',
		'value' => $cityID,
	])->label(false) ?>

	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
	    <?= Html::submitButton('Зберегти зміни', ['class' => 'custom-button btn btn-success']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>
