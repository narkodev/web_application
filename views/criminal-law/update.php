<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CriminalLaw */

$this->title = 'Редагувати статтю: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Кримiнальний кодекс', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="criminal-law-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
