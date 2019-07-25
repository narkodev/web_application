<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdministrativeLawSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кодекс України про адміністративні правопорушенн';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="display:flex; justify-content: space-between; align-items: center">
    <div><h1><?= Html::encode($this->title) ?></h1></div>
    <div class="text-right" style="padding-top: 17px">
		<?php echo Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Додати статтю', ['create'], ['class' => 'btn btn-primary']); ?>
    </div>
</div>
<hr>
<div class="administrative-law-index">

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			'name',
			'full_name',
			['class' => 'yii\grid\ActionColumn',
			 'header' => 'Дії',
			 'template' => '{update} {delete}',
			 'buttons' => [
				 'update' => function ($url, $model, $key) {
					 return Html::a('Редагувати', ['administrative-law/update', 'id' => $model->id], ['class' => 'btn btn-success']);
				 },
				 'delete' => function ($url, $model, $key) {
					 return Html::a('Видалити', ['administrative-law/delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Ви впевнені що хочете видалити статтю?")']);
				 },
			 ],
			],
		],
	]); ?>
</div>
