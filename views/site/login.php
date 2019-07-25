<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Форма входа';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>


	<?php $form = ActiveForm::begin([
		'id' => 'login-form',
		'layout' => 'horizontal',
		'fieldConfig' => [
			'template' => "{label}\n<div class=\"col-md-12\">{input}</div>\n<div class=\"col-md-12\">{error}</div>",
			'labelOptions' => ['class' => 'col-md-12 control-label'],
		],
	]); ?>

	<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

	<?= $form->field($model, 'password')->passwordInput() ?>

	<?= $form->field($model, 'rememberMe')->checkbox([
		'template' => "<div class=\"col-md-12\" style='display:flex;'>{input} <div style='margin-left:6px'>{label}</div></div>\n<div class=\"col-md-12\">{error}</div>",
	]) ?>

	<div class="form-group">
		<div class="col-md-12">
			<?= Html::submitButton('Войти', ['class' => 'btn btn-primary full-width-btn', 'name' => 'login-button']) ?>
		</div>
	</div>

	<?php ActiveForm::end(); ?>

</div>
