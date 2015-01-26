<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use common\components\Utility;
?>
<link href="<?= Yii::$app->request->baseUrl; ?>/css/salon.css" rel="stylesheet" type="text/css">

<div id="wrapper">

	<div id="left">

		<div class="title">
			<span class="icon-setting"></span><h2>営業日/時間設定</h2>
		</div><!-- /.title -->

		<?= Html::beginForm(['salon-open', 'id' => null], 'post', ['enctype' => 'multipart/form-data']) ?>
		<!-- ============================== 設定状況[start] ============================== -->
		<table>
			<thead>
				<tr>
					<th class="header edit" colspan="2">営業日/時間設定</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?= date('Y年m月d日', strtotime($salonDateMax)); ?>まで　設定済み<a href="salon_open_calendar.html" title="カレンダー" class="cal"><span class="icon-calendar"></span></a></td>
				</tr>
			</tbody>
		</table>
		<!-- ============================== 設定状況[end] ============================== -->




		<!-- ============================== 自動生成条件設定[start] ============================== -->
		<table>

			<thead>
				<tr>
					<th class="header edit" colspan="2"><h2>自動生成条件設定</h2></th>
			</tr>
			</thead>
			<tbody>
			<th>項目</th>
			<td class="gray">内容</td>
			<tr>
				<th>標準営業時間</th>
				<td>
					>
					<ul class="open">
						<li>
							<?= Html::dropDownList('hour_open', null, Utility::$arrayHour) ?>
						</li>
						<li>
							<?= Html::dropDownList('minute_open', null, Utility::$arrayMinute) ?>
						</li>
					</ul><p>〜&nbsp;</p>
					<ul class="close">
						<li>
							<?= Html::dropDownList('hour_close', null, Utility::$arrayHour) ?>
						</li>
						<li>
							<?php
							?>
							<?= Html::dropDownList('minute_close', null, Utility::$arrayMinute) ?>
						</li>
					</ul>
					<p>[営業時間説明]</p>
				</td>
			</tr>

			<tr>
				<th>定休日</th>
				<td>
					<p>[定休日説明]</p>
					<h3>1)繰り返し設定</h3>
					<label><input class="repeat_type" type="radio" name="a_repeat" value="day_of_week" checked> 曜日指定</label>
					<label><input class="repeat_type" type="radio" name="a_repeat" value="day_specified"> 日にち指定</label>

					<table class="inner" id="repeat_day_of_week">
						<tr>
							<th>1つ目</th>
							<td>
								<?php
								?>
								<?= Html::dropDownList('dayOfWeek[1][month]', null, Utility::$arrayMonth) ?>
							</td>
							<td>
								<?= Html::dropDownList('dayOfWeek[1][week]', null, Utility::$arrayWeekNo) ?>
							</td>
							<td>
								<?= Html::dropDownList('dayOfWeek[1][day]', null, Utility::$arrayWeek) ?>
							</td>
						</tr>
						<tr>
							<th>2つ目</th>
							<td>
								<?= Html::dropDownList('dayOfWeek[2][month]', null, Utility::$arrayMonth) ?>
							</td>
							<td>
								<?= Html::dropDownList('dayOfWeek[2][week]', null, Utility::$arrayWeekNo) ?>
							</td>
							<td>
								<?= Html::dropDownList('dayOfWeek[2][day]', null, Utility::$arrayWeek) ?>
							</td>
						</tr>
						<tr>
							<th>3つ目</th>
							<td>
								<?= Html::dropDownList('dayOfWeek[3][month]', null, Utility::$arrayMonth) ?>
							</td>
							<td>
								<?= Html::dropDownList('dayOfWeek[3][week]', null, Utility::$arrayWeekNo) ?>
							</td>
							<td>
								<?= Html::dropDownList('dayOfWeek[3][day]', null, Utility::$arrayWeek) ?>
							</td>
						</tr>
					</table>


<!--                        <label><input type="radio" name="b_repeat" value=""> 曜日指定</label>
                        <label><input type="radio" name="b_repeat" value="" checked> 日にち指定</label>-->

					<table class="inner" id="repeat_day_specified" style="display: none">
						<tr>
							<th>1つ目</th>
							<td>
								<?= Html::dropDownList('specifiedDate[1][month]', null, Utility::$arrayMonth) ?>
							</td>
							<td>
								<?= Html::dropDownList('specifiedDate[1][date]', null, Utility::$arrayDay) ?>
							</td>
							<td></td>
						</tr>
						<tr>
							<th>2つ目</th>
							<td>
								<?= Html::dropDownList('specifiedDate[2][month]', null, Utility::$arrayMonth) ?>
							</td>
							<td>
								<?= Html::dropDownList('specifiedDate[2][date]', null, Utility::$arrayDay) ?>
							</td>
							<td></td>
						</tr>
						<tr>
							<th>3つ目</th>
							<td>
								<?= Html::dropDownList('specifiedDate[3][month]', null, Utility::$arrayMonth) ?>
							</td>
							<td>
								<?= Html::dropDownList('specifiedDate[3][date]', null, Utility::$arrayDay) ?>
							</td>
							<td></td>
						</tr>
					</table>

					<h3 style="float:left;margin-right:10px">2)特別休日設定</h3>　<span>※年末年始･盆休み等</span>

					<table class="inner02">
						<tr>
							<th>1つ目</th>
							<td>
								<?= Html::dropDownList('specialHoliday[1][year][begin]', null, Utility::getArrYear()) ?>
								<br>
								<?= Html::dropDownList('specialHoliday[1][year][end]', null, Utility::getArrYear()) ?>
							</td>
							<td>
								<?php
								$monthArr = Utility::$arrayMonth;
								unset($monthArr['every_month']);
								?>
								<?= Html::dropDownList('specialHoliday[1][month][begin]', null, $monthArr) ?>
								<br>
								<?= Html::dropDownList('specialHoliday[1][month][end]', null, $monthArr) ?>
							</td>
							<td>
								<?= Html::dropDownList('specialHoliday[1][day][begin]', null, Utility::$arrayDay) ?>
								<br>
								<?= Html::dropDownList('specialHoliday[1][day][end]', null, Utility::$arrayDay) ?>
							</td>
							<td>から<br>まで</td>
						</tr>

						<tr>
							<th>2つ目</th>
							<td>
								<?= Html::dropDownList('specialHoliday[2][year][begin]', null, Utility::getArrYear()) ?>
								<br>
								<?= Html::dropDownList('specialHoliday[2][year][end]', null, Utility::getArrYear()) ?>
							</td>
							<td>
								<?= Html::dropDownList('specialHoliday[2][month][begin]', null, $monthArr) ?>
								<br>
								<?= Html::dropDownList('specialHoliday[2][month][end]', null, $monthArr) ?>
							</td>
							<td>
								<?= Html::dropDownList('specialHoliday[2][day][begin]', null, Utility::$arrayDay) ?>
								<br>
								<?= Html::dropDownList('specialHoliday[2][day][end]', null, Utility::$arrayDay) ?>
							</td>
							<td>から<br>まで</td>
						</tr>

						<tr>
							<th>3つ目</th>
							<td>
								<?= Html::dropDownList('specialHoliday[3][year][begin]', null, Utility::getArrYear()) ?>
								<br>
								<?= Html::dropDownList('specialHoliday[3][year][end]', null, Utility::getArrYear()) ?>
							</td>
							<td>
								<?= Html::dropDownList('specialHoliday[3][month][begin]', null, $monthArr) ?>
								<br>
								<?= Html::dropDownList('specialHoliday[3][month][end]', null, $monthArr) ?>
							</td>
							<td>
								<?= Html::dropDownList('specialHoliday[3][day][begin]', null, Utility::$arrayDay) ?>
								<br>
								<?= Html::dropDownList('specialHoliday[3][day][end]', null, Utility::$arrayDay) ?>
							</td>
							<td>から<br>まで</td>
						</tr>
					</table>

				</td>
			</tr>
			<tr>
				<th>自動生成期間</th>
				<td>
					<p><?= date('Y年m月d日', strtotime(str_replace('-', '/', $salonDateMax) . "+1 days")); ?>から</p>
					<table class="inner">
						<tr>
							<td>
								<?= Html::dropDownList('yearPeriodMax', null, Utility::getArrYear(date('Y') + 1)) ?>
							</td>
							<td>
								<?= Html::dropDownList('monthPeriodMax', date('m', strtotime($salonDateMax)), $monthArr) ?>
							</td>
							<td>
								<?= Html::dropDownList('dayPeriodMax', date('d', strtotime($salonDateMax)), Utility::$arrayDay) ?>
							</td>
							<td>まで</td>
						</tr>
					</table>
				</td>
			</tr>


			</tbody>
		</table>

		<!-- ============================== 自動生成条件設定[end] ============================== -->


		<!-- 設定ボタン -->
		<p class="submit_large"><input type="submit" name="submit" value="自動生成" class="button_large blue"></p>

		<?= Html::endForm() ?>

    </div><!-- /#left -->

    <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->

<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/salon.js"></script>
