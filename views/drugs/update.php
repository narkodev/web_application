<?php

/**
 * @var $this yii\web\View
 */

$__params = require __DIR__ .'/__params.php';

$this->title = $__params['update'];

?>
<?= $this->render('_form', compact('drugModel', 'drugCategoryModel', 'drugCategories')) ?>
<br>
<br>