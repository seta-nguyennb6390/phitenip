<?php

namespace app\modules\account\controllers;

use Yii;
use yii\filters\AccessControl;
//use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\components\MyController;

class DefaultController extends MyController {

	/**
	 * @inheritdoc
	 */
	public function MyBehaviors() {
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}

	public function actions() {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	/**
	 * Get login
	 * 
	 * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
	 * @return object render view
	 */
	public function actionLogin() {
		$this->layout = false;

		if (!\Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		} else {
			return $this->render('login', [
						'model' => $model,
			]);
		}
	}

	/**
	 * Get logout
	 * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
	 * @return redirect
	 */
	public function actionLogout() {
		Yii::$app->user->logout();

		return $this->goHome();
	}

}
