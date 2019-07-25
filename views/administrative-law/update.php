<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdministrativeLaw */

$this->title = 'Редагувати статтю: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Адмiнiстративний кодекс', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="administrative-law-update">

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
