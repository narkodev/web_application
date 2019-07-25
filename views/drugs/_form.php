<?php

/**
 * @var $drugModel app\models\Drug
 * @var $drugCategoryModel app\models\DrugCategory
 * @var $drugCategories app\models\Category
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2mod\selectize\Selectize;

?>

<?php include_once ('status.php') ?>

<?php
$form = ActiveForm::begin();

echo "<div class='row'>";

if($drugModel->image && $drugModel->image !== '') {

	echo "<div class='col-md-12'><label class='control-label'>Зображення наркотика</label></div>";
	echo "<div class='col-md-12'>";
	echo "<div class='padding-with-bottom-border'>";
	echo "<div class='image-box'>";
	echo "<button type='button' id='remove-drug-image-btn' data-drug-id='$drugModel->id' class='btn btn-primary close-btn' title='Натисніть для видалення картинки'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>";
	echo "<img src='/uploads/drugs/$drugModel->id/$drugModel->image' class='img-thumbnail'>";
	echo "</div>";
	echo "</div>";
	echo "</div>";

} else {

	echo "<div class='col-md-12'>";
	echo $form->field($drugModel, 'image', [
		'options' => [
			'class' => 'padding-with-bottom-border'
		],
		'template' => "<label>{label}</label>
                                    <div class='hidden'>{input}</div>
                                    <div><button class='btn btn-default' type='button' id='attach-image-button'>Виберіть зображення</button></div>
                                    <div>{error}</div>"
	])->fileInput(['id'=> 'drug-image-file-input']);
	echo "</div>";

}

echo "</div>";

echo "<div class='row'>";
echo "<div class='col-md-3'>";
echo $form->field($drugModel, 'name');
echo "</div>";
echo "<div class='col-md-3'>";
echo $form->field($drugModel, 'name_language')->dropDownList([
	'ua' => 'Українська',
	'en' => 'Англійська',
],
	[
		'prompt' => 'Виберіть мову'
	]
);
echo "</div>";
echo "<div class='col-md-6'>";
echo $form->field($drugModel, 'other_name');
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo "<div class='col-md-12'>";
echo $form->field($drugModel, "search_name")->widget(Selectize::className(), [
	'pluginOptions' => [
		'persist' => false,
		'createOnBlur' => true,
		'create' => true
	]
])->hint('Примітка: вкажіть всі ключові слова на всіх мовах, що вас цікавлять.');
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo "<div class='col-md-12'>";
echo $form->field($drugModel, 'summary')->textarea(['rows' => 12]);
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo "<div class='col-md-12'>";
echo $form->field($drugModel, 'taking_drug')->textarea(['rows' => 12]);
echo "</div>";
echo "</div>";


echo "<div class='row'>";
echo "<div class='col-md-12'>";
echo $form->field($drugModel, 'drug_symptoms')->textarea(['rows' => 12]);
echo "</div>";
echo "</div>";


echo "<div class='row'>";
echo "<div class='col-md-12'>";
echo $form->field($drugCategoryModel, 'category_id')->checkboxList($drugCategories);
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo "<div class='col-md-12'><b>Відповідальність</b></div>";
echo "<br>";
echo "<div class='col-md-12'><hr></div>";
echo "<div class='col-md-4'>";
echo $form->field($drugModel, 'storage_small_size');
echo "</div>";
echo "<div class='col-md-4'>";
echo $form->field($drugModel, 'storage_big_size');
echo "</div>";
echo "<div class='col-md-4'>";
echo $form->field($drugModel, 'storage_large_size');
echo "</div>";
echo "</div>";

echo "<br>";
echo Html::submitButton('Зберегти зміни', ['class' => 'custom-button btn btn-success']);

ActiveForm::end();

?>