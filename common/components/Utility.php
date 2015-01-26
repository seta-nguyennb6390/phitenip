<?php

namespace common\components;

class Utility {

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

	/**
	 * Get array year
	 * 
	 * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
	 * @param $year int
	 * @return array
	 */
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

}
