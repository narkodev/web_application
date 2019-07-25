<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CityOrganization */
/* @var integer $cityID */
/* @var string $citySlug */

$this->title = 'Додати організацію в мicто';
$this->params['breadcrumbs'][] = ['label' => 'City Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-organization-create">

	<?= $this->render('_form', [
		'model' => $model,
		'cityID' => $cityID,
        'citySlug' => $citySlug,
	]) ?>

</div>
