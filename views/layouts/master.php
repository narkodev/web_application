<?php

/**
 * @var string $content
 */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

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

<div class="wrap">
	<?php
	NavBar::begin([
		'brandLabel' => Yii::$app->name,
		'brandUrl' => Yii::$app->homeUrl,
		'options' => [
			'class' => 'navbar-inverse navbar-fixed-top',
		],
	]);
	echo Nav::widget([
		'options' => ['class' => 'navbar-nav navbar-right'],
		'items' => [
			['label' => 'Наркотики',
			 'items' => [
				 ['label' => 'Каталог наркотикiв', 'url' => ['/drugs']],
				 ['label' => 'Категорії наркотикiв', 'url' => ['/category']],
				 ['label' => 'Вiдповiдальнiсть за наркотики', 'url' => ['/drug-law']],
			 ],
			],
			['label' => 'Кодекси України',
			 'items' => [
				 ['label' => 'Кодекс України про адміністративні правопорушення', 'url' => ['/administrative-law']],
				 ['label' => 'Кодекс України про кримiнальнi правопорушення', 'url' => ['/criminal-law']],
			 ]
			],
			['label' => 'Службовий довiдник', 'url' => ['/city']],
			['label' => 'Повiдомлення', 'url' => ['/report']],
		],
	]);
	NavBar::end();
	?>
    <div class="container">
		<?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-center">Narko Info &copy;  <?php echo date('Y') ?></p>

    </div>
</footer>

<?php $this->EndBody(); ?>
</body>
</html>
<?php $this->EndPage(); ?>
