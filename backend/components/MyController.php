<?php
namespace backend\components;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use backend\components\MyController;

class MyController extends Controller
{
    public function MyBehaviors(){}

    public function behaviors()
    {
        $defaultAccessRules = [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
                ],
            ],
        ];
        
        if(!empty($this->accessRules)) {
            $defaultAccessRules = array_merge_recursive($this->MyBehaviors(),$defaultAccessRules) ;
        }
        
        return $defaultAccessRules;
    }
}

