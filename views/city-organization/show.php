<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CityOrganizationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var string $slug */
/* @var $city \app\models\City */
/* @var $cityModel \app\models\City */

$this->title = 'Організації мicта: ' . $cityModel->name;

$this->params['breadcrumbs'][] = $cityModel->name;
?>

<div style="display:flex; justify-content: space-between; align-items: center">
    <div><h1><?= Html::encode($this->title) ?></h1></div>
    <div class="text-right" style="padding-top: 17px">
		<?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Додати міську організацію', ['create' , 'slug' => $slug], ['class' => 'btn btn-primary']); ?>
    </div>
</div>
<hr>
<br>

<table class="custom-table table table-striped table-bordered table-hover">
    <tr>
        <th>Назва організації</th>
        <th>Дії</th>
    </tr>
	<?php
	foreach ($model as $item) {
		echo "<tr>";
		echo "<td>$item->name</td>";
		echo "<td>";
		echo Html::a('Редагувати', ['city-organization/update', 'id' => $item->id, 'slug' => $item->city->slug], ['class' => 'btn btn-success']);
		echo " ";
		echo Html::a('Видалити', ['city-organization/delete', 'id' => $item->id, 'slug' => $item->city->slug], ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Ви впевнені що хочете видалити наркотик?")']);
		echo "</td>";
		echo "</tr>";
	}
	?>
</table>
