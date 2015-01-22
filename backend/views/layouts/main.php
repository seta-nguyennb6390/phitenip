<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="<?= Yii::$app->charset ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>

		<!-- stylesheet -->
		<link href="<?= Yii::$app->request->baseUrl; ?>/css/normalize.css" rel="stylesheet" type="text/css">
		<link href="<?= Yii::$app->request->baseUrl; ?>/css/common.css" rel="stylesheet" type="text/css">
		<link href="<?= Yii::$app->request->baseUrl; ?>/css/svg.css" rel="stylesheet" type="text/css">
		<link href="<?= Yii::$app->request->baseUrl; ?>/css/jquery.sidr.dark.css" rel="stylesheet" type="text/css">

		<!-- jQuery -->
		<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/jquery.sidr.min.js"></script>
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/common.js"></script>
		<script type="text/javascript">
         // ドロワーメニュー
        $(document).ready(function() {
          $('.left-menu').sidr({
             name: 'sidr-left',
            side: 'left' // By default
           });
        });
        </script>
		<!--[if lt IE 9]>
           <script src="<?= Yii::$app->request->baseUrl; ?>js/html5shiv.js"></script>
        <![endif]-->
	</head>
	<body>
		<?php echo $this->render('//partials/header'); ?>
		
		<?= $content ?>
		
		<?php echo $this->render('//partials/footer'); ?>
	</body>
</html>
<?php $this->endPage() ?>