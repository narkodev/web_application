<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AdministrativeLaw */

$this->title = 'Додати статтю';
$this->params['breadcrumbs'][] = ['label' => 'Адмiнiстративний кодекс', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="administrative-law-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
