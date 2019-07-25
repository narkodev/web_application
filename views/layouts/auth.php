<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

AppAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!doctype html>
<html lang="<?php echo Yii::$app->language; ?>">
<head>
	<meta charset="<?php echo Yii::$app->charset; ?>">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo Html::encode($this->title); ?></title>
	<?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>

<div class="wrap flex">

	<div class="container">
		<?= $content ?>
	</div>

</div>

<?php $this->EndBody(); ?>
</body>
</html>
<?php $this->EndPage(); ?>
