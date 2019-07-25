<?php

use yii\helpers\Html;

?>
<div style="display:flex; justify-content: space-between; align-items: center">
    <div><h1 style="d">Категорії наркотиків</h1></div>
    <div class="text-right" style="padding-top: 17px">
		<?php echo Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Додати категорію', 'category/add', ['class' => 'btn btn-primary']); ?>
    </div>
</div>
<hr>
<br>
<table class="custom-table table table-striped table-bordered table-hover">
    <tr>
        <th>Назва категорії</th>
        <th>Дії</th>
    </tr>
    <?php

        foreach ($categories as $category) {

            echo "<tr>";
                echo "<td>$category->name</td>";
                    echo "<td>";
                        echo Html::a('Редагувати', ['category/edit', 'id' => $category->id], ['class' => 'btn btn-success']);
                        echo " ";
                        echo Html::a('Видалити', ['category/delete', 'id' => $category->id], ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Ви впевнені що хочете видалити категорію?")']);
                    echo "</td>";
            echo "</tr>";

        }

    ?>
</table>