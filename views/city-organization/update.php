<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CityOrganization */
/* @var integer $cityID */
/* @var string $citySlug */

$this->title = 'Редагування організації: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'City Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="city-organization-update">

    <?= $this->render('_form', [
        'model' => $model,
        'cityID' => $cityID,
        'citySlug' => $citySlug,
    ]) ?>

</div>
