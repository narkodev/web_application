<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Службовий довiдник';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="display:flex; justify-content: space-between; align-items: center">
    <div><h1><?= Html::encode($this->title) ?></h1></div>
    <div class="text-right" style="padding-top: 17px">
		<?php echo Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Додати мiсто', ['create'], ['class' => 'btn btn-primary']); ?>
    </div>
</div>
<hr>
<br>
<div class="city-index">
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => null,
		'columns' => [
			[
				'attribute' => 'name',
				'label' => 'Назва мicта'
			],

			['class' => 'yii\grid\ActionColumn',
			 'header' => '	Дії',
			 'template' => '{city_organization_create} {update} {delete}',
			 'buttons' => [
				 'city_organization_create' => function ($url, $model, $key) {
					 return Html::a('Організації міста &nbsp;<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>', Url::to(['city-organization/show', 'slug' => $model->slug]), ['class' => 'btn btn-block btn-primary']);
				 },
				 'update' => function ($url, $model, $key) {
					 return Html::a('Редагувати мicто', Url::to(['city/update', 'id' => $model->id]), ['class' => 'btn btn-block btn-success']);
				 },
				 'delete' => function ($url, $model, $key) {
					 return Html::a('Видалити мicто', Url::to(['city/delete', 'id' => $model->id]), ['class' => 'btn btn-block btn-danger', 'onclick' => 'return confirm("Ви впевнені що хочете видалити мiсто?")']);
				 },
			 ]
			],
		],
	]); ?>
</div>
