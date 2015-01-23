<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Salon;
use common\models\SalonOpen;
use common\models\SalonFacility;
use common\models\SalonMembertype;
use yii\db\Expression;

/**
 * UserController implements the CRUD actions for User model.
 */
class SalonController extends Controller
{
	public function actionSetting()
    {
		$request = Yii::$app->request;
		$userAuth = \Yii::$app->user->getIdentity()->getAttributes();
        $salonId = $userAuth['salon_id'];
		$model = Salon::findOne($salonId);
		//get salon open
		$openDate = SalonOpen::find()
			->where(['salon_id' => $salonId, 'status' => 1])
			->orderBy(['salon_date' => SORT_DESC])
			->one();
		
		$data['salon_open'] = '';
		if($openDate) {
			$data['salon_open'] = date('Y年m月d日', strtotime($openDate->salon_date)) . 'まで　設定済み';
		}
		
		//get salon facility	
		$salonFac = (new \yii\db\Query())
			->select('COUNT(*) AS cnt, facility_id, salon_facility_name')
			->from('salon_facility')
			->where(['salon_id' => $salonId, 'status' => 1])
			->groupBy('facility_id')
			->all();
		
		$salonFacStr = '';
		foreach ($salonFac as $value) {
			$salonFacStr .= $value['salon_facility_name'] . '(' . $value['cnt'] . ')/';
		}
		
		$data['salon_facility'] = substr($salonFacStr, 0, -1);
		
		//get salon membertype
		$salonMebertype = SalonMembertype::find()
			->where(['salon_id' => $salonId, 'status' => 1])
			->all();
		
		$salonMebertypeStr = '';
		foreach ($salonMebertype as $key => $value) {
			$salonMebertypeStr .= $value->membertype_name . '/';
		}
		
		$data['salon_membertype'] = substr($salonMebertypeStr, 0, -1);
		
		if($request->isPost) {
			$post = $request->post();
			$model->load($post);
			$model->open_time = $post['Salon']['open_date_hour'] . ':' . $post['Salon']['open_date_min'] . ':00';
			$model->close_time = $post['Salon']['close_date_hour'] . ':' . $post['Salon']['close_date_min'] . ':00';
			$model->upd_datetime = new \yii\db\Expression('NOW()');
			$model->save();
		}
		
		$model->open_date_hour = substr($model->open_time, 0, 2);
		$model->open_date_min = substr($model->open_time, 3, 2);
		$model->close_date_hour = substr($model->close_time, 0, 2);
		$model->close_date_min = substr($model->close_time, 3, 2);
		
		return $this->render('setting', [
            'model' => $model,
			'data' => $data,
        ]);
	}
	
}

