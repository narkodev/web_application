<?php

/**
 * @var $model app\models\Drug
 */

use yii\helpers\Html;

$__params = require __DIR__ .'/__params.php';

$this->title = $__params['index'];

?>
<div style="display:flex; justify-content: space-between; align-items: center">
    <div><h1 style="d"><?= $this->title ?></h1></div>
    <div class="text-right" style="padding-top: 17px">
		<?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Додати наркотик', ['drugs/create'], ['class' => 'btn btn-primary']); ?>
    </div>
</div>
<hr>
<br>
<table class="custom-table table table-striped table-bordered table-hover">
    <tr>
        <th>Назва наркотику</th>
        <th>Дії</th>
    </tr>
	<?php
	foreach ($model as $singleDrug) {
		echo "<tr>";
		echo "<td>$singleDrug->name</td>";
		echo "<td>";
		echo Html::a('Редагувати', ['drugs/update', 'id' => $singleDrug->id], ['class' => 'btn btn-success']);
		echo " ";
		echo Html::a('Видалити', ['drugs/delete', 'id' => $singleDrug->id], ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Ви впевнені що хочете видалити наркотик?")']);
		echo "</td>";
		echo "</tr>";
	}
	?>
</table>