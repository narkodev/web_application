<?php
use yii\helpers\Html;
?>
<br>
<?= Html::a('<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Повернутися', ['/criminal-law'], [ 'class' => 'btn btn-primary']); ?>
<hr>
<h1><?= $this->title ?></h1>
<br>
<?php if(Yii::$app->session->hasFlash('success')) : ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo Yii::$app->session->getFlash('success'); ?>
	</div>
<?php endif; ?>
<?php if(Yii::$app->session->hasFlash('error')) : ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Увага!</strong> <?php echo Yii::$app->session->getFlash('error'); ?>
	</div>
<?php endif; ?>
