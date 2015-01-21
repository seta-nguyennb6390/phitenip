<?php

namespace backend\modules\users\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Member;
use backend\components\MyController;

class DefaultController extends Controller
{
    public function actionIndex()
    {
		Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜会員管理';
		$model = new \common\models\Member();
		
		$data['listAll'] = $model->listMembers(10);
        $data['model'] = $model;
        return $this->render('index', $data);
    }
}
