<?php

namespace app\modules\salon\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
//include '../php-calendar/classes/calendar.php';
/*
 * SalonController
 * @description: SalonController
 * @since : 21/01/2015
 * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
 */

class SalonController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'salon-open'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

    /*
     * @description: SalonOpen
     * @since : 21/01/2015
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function actionSalonOpen() {
        var_dump(\Yii::$app->user);
        return $this->render('salon_open');
    }
    /*
     * @description: SalonOpen
     * @since : 21/01/2015
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function actionSalonOpenCal() {
        return $this->render('salon_open_cal');
    }

}
