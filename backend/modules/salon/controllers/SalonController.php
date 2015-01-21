<?php

namespace app\modules\salon\controllers;

use yii\web\Controller;

class SalonController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
