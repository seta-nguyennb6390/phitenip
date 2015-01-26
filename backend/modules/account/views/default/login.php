<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
?>
<!doctype html>
<html lang="ja">

	<head>
		<meta charset="UTF-8">
		<meta name="apple-mobile-web-app-capable" content="no" />

		<title>Phiten IP Salon 予約管理システム｜ログイン</title>

		<!-- stylesheet -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/common.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/login.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/svg.css" />
		<!-- jQuery -->
		<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/common.js"></script>

		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<![endif]-->

	</head>

	<body id="login">

		<!-- ============================== システムヘッダー[start] ============================== -->   
		<div id="sys_header">
			<p class="sys">Phiten IP Salon 予約管理システム</p>
		</div><!-- /#sys_header -->
		<!-- ============================== システムヘッダー[end] ============================== -->

		<!-- ============================== ログイン[start] ============================== -->
		<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
		<!-- エラー表示 -->
		<?php $err = $model->getErrors(); ?>
		<?php if ($err): ?>
			<div class="errorBox">
				<ul>
					<?php foreach ($err as $key => $value): ?>
						<li><?php echo $value[0] ?></li>
					<?php endforeach; ?>
				</ul>
			</div><!-- /.erroBox -->
		<?php endif; ?>

		<!-- ログイン -->
		<div id="loginBox">
			<!-- ログインID｜inputのクラス属性「focus」でエラー時のフォーカス色に -->
			<p>
				<label for="user_login">ログインID<br />
				<!--<input type="text" name="log" id="user_login" class="input_form" value="" size="20" />-->
					<?= $form->field($model, 'username')->textInput(array('label' => false, 'class' => 'input_form', 'id' => 'user_login'))->label(false)->error(false); ?>
				</label>
			</p>
			<!-- パスワード｜inputのクラス属性「focus」でエラー時のフォーカス色に -->
			<p>
				<label for="user_pass">パスワード<br />
				<!--<input type="password" name="pwd" id="user_pass" class="input_form" value="" size="20" />-->
					<?= $form->field($model, 'password')->passwordInput(array('label' => false, 'class' => 'input_form', 'id' => 'user_pass'))->label(false)->error(false); ?>
				</label>
			</p>
			<!-- ログインボタン -->
			<p class="submit">
			<!--<input type="submit" name="submit" id="submit" class="input_button" value="ログイン" />-->
				<?= Html::submitButton('ログイン', ['class' => 'input_button', 'name' => 'login-button']) ?>
			</p>
		</div><!-- /#loginBox -->

		<?php ActiveForm::end(); ?>
		<!-- ============================== ログイン[end] ============================== -->


	</body>
</html>