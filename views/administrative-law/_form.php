<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdministrativeLaw */
/* @var $form yii\widgets\ActiveForm */
?>

<?php include_once ('status.php') ?>

<div class="administrative-law-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary')->textarea(['rows' => 6]) ?>

    <div class="form-group">
	    <?= Html::submitButton('Зберегти зміни', ['class' => 'custom-button btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
