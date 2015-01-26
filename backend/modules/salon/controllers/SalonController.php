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
use yii\db\Expression;
//use yii\php_calendar\classes\Calendar;
include '/../php-calendar/classes/calendar.php';

/*
 * SalonController
 * @description: SalonController
 * @since : 21/01/2015
 * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
 */

class SalonController extends Controller {
    public static $arrayMinute = array(
        '00' => '00分',
        '05' => '05分',
        '10' => '10分',
        '15' => '15分',
        '20' => '20分',
        '25' => '25分',
        '30' => '30分',
        '35' => '35分',
        '40' => '40分',
        '45' => '45分',
        '50' => '50分',
        '55' => '55分',
    );
    public static $arrayHour = array(
        '00' => '00時',
        '01' => '01時',
        '02' => '02時',
        '03' => '03時',
        '04' => '04時',
        '05' => '05時',
        '06' => '06時',
        '07' => '07時',
        '08' => '08時',
        '09' => '09時',
        '10' => '10時',
        '11' => '11時',
        '12' => '12時',
        '13' => '13時',
        '14' => '14時',
        '15' => '15時',
        '16' => '16時',
        '17' => '17時',
        '18' => '18時',
        '19' => '19時',
        '20' => '20時',
        '21' => '21時',
        '22' => '22時',
        '23' => '23時',
    );
    public static $arrayDay = array(
        '1' => '1日',
        '2' => '2日',
        '3' => '3日',
        '4' => '4日',
        '5' => '5日',
        '6' => '6日',
        '7' => '7日',
        '8' => '8日',
        '9' => '9日',
        '10' => '10日',
        '11' => '11日',
        '12' => '12日',
        '13' => '13日',
        '14' => '14日',
        '15' => '15日',
        '16' => '16日',
        '17' => '17日',
        '18' => '18日',
        '19' => '19日',
        '20' => '20日',
        '21' => '21日',
        '22' => '22日',
        '23' => '23日',
        '24' => '24日',
        '25' => '25日',
        '26' => '26日',
        '27' => '27日',
        '28' => '28日',
        '29' => '29日',
        '30' => '30日',
        '31' => '31日',
    );
    public static $arrayMonth = array(
        'every_month' => '毎月',
        '1' => '1月',
        '2' => '2月',
        '3' => '3月',
        '4' => '4月',
        '5' => '5月',
        '6' => '6月',
        '7' => '7月',
        '8' => '8月',
        '9' => '9月',
        '10' => '10月',
        '11' => '11月',
        '12' => '12月',
    );
    public static $arrayWeek = array(
        'Monday' => '月',
        'Tuesday' => '火',
        'Wednesday' => '水',
        'Thursday' => '木',
        'Friday' => '金',
        'Saturday' => '土',
        'Sunday' => '日',
    );
    public static $arrayWeekNo = array(
        'every_week' => '毎週',
        '1' => '第1',
        '2' => '第2',
        '3' => '第3',
        '4' => '第4',
        '5' => '第5',
    );
    public static function getArrYear($year = null) {
        $currentYear = date('Y');
        
        if ($year) {
            $currentYear = $year;
        }
        $arrYear = array();
        $arrYear[$currentYear] = $currentYear . '年';
        $arrYear[$currentYear + 1] = ($currentYear + 1) . '年';
        
        return $arrYear;
    }

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

    public function actionIndex() {
        return $this->render('index');
    }

    /*
     * @description: SalonOpen
     * @since : 21/01/2015
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
//            var_dump(Yii::$app->request->Post());
            $dataPost = Yii::$app->request->Post();
            //validate later====================================================
            //validate here
            //validate later====================================================
            
            //get list date insert into salon_open: 
            $datetimePeriodBegin = date('Y-m-d', strtotime(str_replace('-', '/', $salonDateMax) . "+1 days"));
            $datetimePeriodEnd = date('Y-m-d', strtotime(
                            $dataPost['yearPeriodMax'] . '-'
                            . $dataPost['monthPeriodMax'] . '-'
                            . $dataPost['dayPeriodMax']
            ));
            
            $listDateInsert = $this->_createDateRangeArray($datetimePeriodBegin, $datetimePeriodEnd);
            
            //check date off by week
            $listOffDayOfWeek = array();
            $listOffSpecialHoliday = array();
            foreach ($listDateInsert as $key => $value) {
                if ($this->_checkRepeatOff($value, $dataPost)) {
                    $listOffDayOfWeek[] = $value;
                }
                if ($this->_checkSpecialHoliday($value, $dataPost)) {
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
//                $salonOpenOb->setAttribute('upd_datetime', 1);

//                $salonOpenOb->save();
            }
            
            return $this->redirect(['salon-open-calendar']);
        }
        
        return $this->render('salon_open', [
            'salonOb' => $salonOb,
            'salonDateMax' => $salonDateMax
        ]);
    }
    
    /*
     * @description: _checkRepeatOff
     * @since : 22/01/2015
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    private function _checkRepeatOff($date, $dataPost = array()) {
        $isSalonClose = false;
        
        if (isset($dataPost['a_repeat']) && $dataPost['a_repeat'] == 'day_of_week') {
            $ruleDayOfWeek = $dataPost['dayOfWeek'];
            $year = date('Y', strtotime($date));
            foreach ($ruleDayOfWeek as $key => $value) {

                if ($value['month']== 'every_month') {
                    $strTimeMonth = date('m', strtotime($date));
                } else {
                    if (date('m', strtotime($date)) != $value['month']) {
                        continue;
                    }
                    $strTimeMonth = $value['month'];
                }

                if ($value['week']== 'every_week') {
                    //compare day of week
                    if (date('l', strtotime($date)) == $value['day']) {
                        $isSalonClose = true;
                        break;
                    }
                } else {
                    if ($date == date('Y-m-d', strtotime( $year. '-' . $strTimeMonth . ' +' . ($value['week'] - 1) . ' week ' .  $value['day']))) {
                        $isSalonClose = true;
                        break;
                    }
                }
            }
        } elseif (isset($dataPost['a_repeat']) && $dataPost['a_repeat'] == 'day_specified') {
            $ruleSpecifiedDate = $dataPost['specifiedDate'];
            $year = date('Y', strtotime($date));
            foreach ($ruleSpecifiedDate as $key => $value) {

                if ($value['month']== 'every_month') {
                    $strTimeMonth = date('m', strtotime($date));
                } else {
                    if (date('m', strtotime($date)) != $value['month']) {
                        continue;
                    }
                    $strTimeMonth = $value['month'];
                }
                if (date('Y-m-d', strtotime($date)) == date('Y-m-d', strtotime($year . '-' . $strTimeMonth . '-' . $value['date']))) {
                    $isSalonClose = true;
                    break;
                }
            }
        }
        
        return $isSalonClose;
    }
    
    /*
     * @description: _checkSpecialHoliday
     * @since : 23/01/2015
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    private function _checkSpecialHoliday($date, $dataPost = array()) {
        $isSalonClose = false;

        foreach ($dataPost['specialHoliday'] as $key => $value) {
            $beginHoliday = date('Y-m-d', strtotime($value['year']['begin'] . '-' . $value['month']['begin'] . '-' . $value['day']['begin']));
            $endHoliday = date('Y-m-d', strtotime($value['year']['end'] . '-' . $value['month']['end'] . '-' . $value['day']['end']));
            if ($date >= $beginHoliday && $date <= $endHoliday) {
                $isSalonClose = true;
                break;
            }
        }

        return $isSalonClose;
    }
    /*
     * @description: _settingSalonOpen
     * @since : 22/01/2015
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    private function _settingSalonOpen($listDateInsert) {
//        var_dump($listDateInsert);
    }
    /*
     * @description: createDateRangeArray
     * @since : 22/01/2015
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    private function _createDateRangeArray($strDateFrom, $strDateTo) {
        // takes two dates formatted as YYYY-MM-DD and creates an
        // inclusive array of the dates between the from and to dates.
        // could test validity of dates here but I'm already doing
        // that in the main script

        $aryRange = array();

        $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
        $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));

        if ($iDateTo >= $iDateFrom) {
            array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry

            while ($iDateFrom < $iDateTo) {
                $iDateFrom+=86400; // add 24 hours
                array_push($aryRange, date('Y-m-d', $iDateFrom));
            }
        }
        return $aryRange;
    }

    /*
     * @description: SalonOpen
     * @since : 21/01/2015
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function actionSalonOpenCal() {
        $month = isset($_GET['m']) ? $_GET['m'] : NULL;
        $year = isset($_GET['y']) ? $_GET['y'] : NULL;

        $calOb = new \Calendar($month, $year);
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
