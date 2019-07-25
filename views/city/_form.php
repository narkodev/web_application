<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<?php include_once ('status.php') ?>

<div class="city-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
		<?= Html::submitButton('Зберегти зміни', ['class' => 'custom-button btn btn-success']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>
