<?php

namespace app\modules\salon\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

use common\models\Salon;
use common\models\SalonOpen;
use common\models\SalonFacility;
use common\models\SalonMembertype;
use backend\components\MyController;
use vendor\calendar\classes\Calendar;
use yii\db\Expression;

/*
 * SalonController
 * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
 */

class SalonController extends MyController {

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
						'actions' => ['logout', 'index', 'salon-open', 'salon-open-cal', 'setting'],
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

	/*
	 * Action SalonOpen
	 * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
	 */
	public function actionSalonOpen() {
		$userAuth = \Yii::$app->user->getIdentity()->getAttributes();
		$salonId = $userAuth['salon_id'];
		$salonModel = new Salon();

		//get info salon
		$condition = array('salon_id' => $salonId);
		$salonOb = $salonModel->findOne($condition);

		//get salon open max by salon_id
		$salonOpenMax = SalonOpen::getMaxDatetime($salonId);
		$salonDateMax = date('Y-m-d');

		if ($salonOpenMax) {
			$salonDateMax = $salonOpenMax->salon_date;
		}

		//submit form
		if (Yii::$app->request->isPost) {
			$dataPost = Yii::$app->request->Post();
			//validate ====================================================
			//validate here
			//validate ====================================================
			//get list date insert into salon_open: 
			$datetimePeriodBegin = date('Y-m-d', strtotime(str_replace('-', '/', $salonDateMax) . "+1 days"));
			$datetimePeriodEnd = date('Y-m-d', strtotime(
							$dataPost['yearPeriodMax'] . '-'
							. $dataPost['monthPeriodMax'] . '-'
							. $dataPost['dayPeriodMax']
			));

			$listDateInsert = SalonOpen::createDateRangeArray($datetimePeriodBegin, $datetimePeriodEnd);

			//check date off by week
			$listOffDayOfWeek = array();
			$listOffSpecialHoliday = array();
			foreach ($listDateInsert as $key => $value) {
				if (SalonOpen::checkRepeatOff($value, $dataPost)) {
					$listOffDayOfWeek[] = $value;
				}
				if (SalonOpen::checkSpecialHoliday($value, $dataPost)) {
					$listOffSpecialHoliday[] = $value;
				}
			}

			//insert date
			foreach ($listDateInsert as $key => $value) {
				$salonOpenOb = new SalonOpen();

				$salonOpenOb->setAttribute('salon_id', $salonId);
				$salonOpenOb->setAttribute('salon_date', $value);
				$dateType = 1;

				if (in_array($value, $listOffDayOfWeek) || in_array($value, $listOffSpecialHoliday)) {
					$dateType = 9;
				}
				$salonOpenOb->setAttribute('date_type', $dateType);
				$salonOpenOb->setAttribute('open_datetime', $value . ' ' . $dataPost['hour_open'] . '-' . $dataPost['minute_open']);
				$salonOpenOb->setAttribute('close_datetime', $value . ' ' . $dataPost['hour_open'] . '-' . $dataPost['minute_open']);
				$salonOpenOb->setAttribute('status', 1);
				$salonOpenOb->setAttribute('reg_datetime', date('Y-m-d H:i:s'));

				$salonOpenOb->save();
			}

			return $this->redirect(['salon-open-cal']);
		}

		return $this->render('salon_open', [
					'salonOb' => $salonOb,
					'salonDateMax' => $salonDateMax
		]);
	}


	/*
	 * @description: SalonOpen
	 * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
	 */
	public function actionSalonOpenCal() {
		$month = isset($_GET['m']) ? $_GET['m'] : NULL;
		$year = isset($_GET['y']) ? $_GET['y'] : NULL;

		$calOb = new Calendar($month, $year);
		$calendar = $calOb;

		$event1 = $calendar->event()
				->condition('timestamp', strtotime(date('F') . ' 21, ' . date('Y')))
				->title('Hello All')
				->output('<a href="http://google.com">Going to Google</a>');

		$event2 = $calendar->event()
				->condition('timestamp', strtotime(date('F') . ' 21, ' . date('Y')))
				->title('Something Awesome')
				->output('<a href="http://coreyworrell.com">My Portfolio</a><br />It\'s pretty cool in there.');

		$calendar->standard('today')
				->standard('prev-next')
				->standard('holidays')
				->attach($event1)
				->attach($event2);
		return $this->render('salon_open_cal', [
					'calendar' => $calendar,
		]);
	}

	/*
	* Salon Setting
	* 
	* @since : 21/01/2015
	* @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
	*/

    public function actionSetting() {
        $request = Yii::$app->request;
        $userAuth = \Yii::$app->user->getIdentity()->getAttributes();
        $salonId = $userAuth['salon_id'];
        $model = Salon::findOne($salonId);
        //get salon open
		$salonOpen = new \common\models\SalonOpen();
        $openDate = $salonOpen->getFirstSalonOpenBySalonId($salonId);

        $data['salon_open'] = '';
        if ($openDate) {
            $data['salon_open'] = date('Y年m月d日', strtotime($openDate->salon_date)) . 'まで　設定済み';
        }

        //get salon facility	
		$salonFacility = new \common\models\SalonFacility();
        $salonFac = $salonFacility->getSummarySalonFacilityBySalonId($salonId);

        $salonFacStr = '';
        foreach ($salonFac as $value) {
            $salonFacStr .= $value['salon_facility_name'] . '(' . $value['cnt'] . ')/';
        }

        $data['salon_facility'] = substr($salonFacStr, 0, -1);

        //get salon membertype
		$salonMembertype = new \common\models\SalonMembertype();
        $salonMebertype = $salonMembertype->getAllSalonMembertypeBySalonId($salonId);

        $salonMebertypeStr = '';
        foreach ($salonMebertype as $key => $value) {
            $salonMebertypeStr .= $value->membertype_name . '/';
        }

        $data['salon_membertype'] = substr($salonMebertypeStr, 0, -1);

        if ($request->isPost) {
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
