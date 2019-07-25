<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Report;

/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = 'Редагування повiдомлення №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

$this->registerJsFile( 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCBwTGAPLYa9MsyoRGgyeztpd3c3dJqy3I&callback=initMap', [ 'depends' => [
	'yii\web\YiiAsset',
	'yii\bootstrap\BootstrapPluginAsset',
] ] );

?>
<div class="report-update">

	<?php include_once ('status.php') ?>

    <div class="report-form">

		<?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6"><?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-6"><?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?></div>
        </div>

        <div class="row">
            <div class="col-md-12">
			    <?= $form->field($model, 'status')->dropDownList(Report::getStatusList(), [
				    'prompt' => 'Оберiть статус',
			    ]); ?>
            </div>
        </div>

        <div class="row" style="margin: 2px 0 15px;">
            <div class="col-md-*">
                <label >Координати: (<?= $model->latitude ?>, <?= $model->longitude ?>)</label>
                <div id="map"></div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group" style="margin-top: 8px;">
					<?= Html::submitButton('Зберегти зміни', ['class' => 'custom-button btn btn-success']) ?>
                </div>
            </div>
        </div>

		<?php ActiveForm::end(); ?>

    </div>

</div>

<script>
    function initMap() {
        // The location of Uluru
        var uluru = {lat: <?= $model->latitude ?>, lng: <?= $model->longitude ?>};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 18, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>
