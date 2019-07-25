<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<br>
<?php echo Html::a('<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Повернутися до категорій наркотиків', ['/category'], ['class' => 'btn btn-primary']); ?>
<hr>
<h1>Редагування категорії</h1>
<br>
<?php if(Yii::$app->session->hasFlash('success')) : ?>

	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Увага!</strong> <?php echo Yii::$app->session->getFlash('success'); ?>
	</div>

<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('error')) : ?>

	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Увага!</strong>  <?php echo Yii::$app->session->getFlash('error'); ?>
	</div>

<?php endif; ?>

<?php

$form = ActiveForm::begin();

echo $form->field($categoryModel, 'name');

echo "<br>";
echo Html::submitButton('Зберегти зміни в категорії', ['class' => 'btn btn-success']);

ActiveForm::end();

?>
<br>
<br>