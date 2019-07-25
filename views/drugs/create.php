<?php

/* @var $this yii\web\View */
/* @var $model app\models\Drug */

$__params = require __DIR__ .'/__params.php';

$this->title = $__params['create'];

?>
<?= $this->render('_form', compact('drugModel', 'drugCategoryModel', 'drugCategories')) ?>
<br>
<br>