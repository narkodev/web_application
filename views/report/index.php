<?php

use app\models\ReportSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Повiдомлення';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="display:flex; justify-content: space-between; align-items: center">
    <div><h1><?= Html::encode($this->title) ?></h1></div>
</div>
<hr>
<br>
<div class="report-index">
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => null,

		'columns' => [
			'id',
			'subject',
			'phone',
			[
				'attribute' => 'created_at',
				'value' => function($model) {
					return date('d.m.Y - (H:i:s)', $model->created_at);
				}
			],
			['class' => 'yii\grid\ActionColumn',
			 'header' => 'Дії',
			 'template' => '{update} {delete}',
			 'buttons' => [
				 'update' => function ($url, $model, $key) {
					 return Html::a('Редагувати', ['report/update', 'id' => $model->id], ['class' => 'btn btn-success']);
				 },
				 'delete' => function ($url, $model, $key) {
					 return Html::a('Видалити', ['report/delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Ви впевнені що хочете видалити повiдомлення?")']);
				 },
			 ],
			],
		],

	]); ?>
</div>
