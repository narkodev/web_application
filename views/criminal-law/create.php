<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CriminalLaw */

$this->title = 'Додати статтю';
$this->params['breadcrumbs'][] = ['label' => 'Кримiнальний кодекс', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="criminal-law-create">

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
