<link href="<?= Yii::$app->request->baseUrl; ?>/css/salon.css" rel="stylesheet" type="text/css">

<div id="wrapper">

<div id="left">

<div class="title">
<span class="icon-setting"></span><h2>営業日/時間設定</h2>
</div><!-- /.title -->

<form action="salon_open_calendar.html" method="get" accept-charset="utf-8"> 

<!-- ============================== 設定状況[start] ============================== -->
<table>
<thead>
<tr>
<th class="header edit" colspan="2">営業日/時間設定</th>
</tr>
</thead>
<tbody>
<tr>
<td>2015年3月31日まで　設定済み<a href="salon_open_calendar.html" title="カレンダー" class="cal"><span class="icon-calendar"></span></a></td>
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
    <ul class="open">
        <li>
            <select id="open_h" class="pulldown" name="open_h">
            <option value="" selected>10時</option>
            <option value="">11時</option>
            <option value="">12時</option>
            <option value="">13時</option>
            <option value="">14時</option>
            <option value="">15時</option>
            <option value="">16時</option>
            <option value="">17時</option>
            <option value="">18時</option>
            <option value="">19時</option>
            <option value="">20時</option>
            <option value="">21時</option>
            <option value="">22時</option>
            </select>
        </li>
        <li>
            <select id="open_m" class="pulldown" name="open_m">
            <option value="" selected>00分</option>
            <option value="">05分</option>
            <option value="">10分</option>
            <option value="">15分</option>
            <option value="">20分</option>
            <option value="">25分</option>
            <option value="">30分</option>
            <option value="">35分</option>
            <option value="">40分</option>
            <option value="">45分</option>
            <option value="">50分</option>
            <option value="">55分</option>
            </select>
        </li>
    </ul><p>〜&nbsp;</p>
    <ul class="close">
        <li>
            <select id="close_h" class="pulldown" name="close_h">
            <option value="">10時</option>
            <option value="">11時</option>
            <option value="">12時</option>
            <option value="">13時</option>
            <option value="">14時</option>
            <option value="">15時</option>
            <option value="">16時</option>
            <option value="">17時</option>
            <option value="">18時</option>
            <option value="">19時</option>
            <option value="" selected>20時</option>
            <option value="">21時</option>
            <option value="">22時</option>
            </select>
        </li>
        <li>
            <select id="close_m" class="pulldown" name="close_m">
            <option value="">00分</option>
            <option value="">05分</option>
            <option value="">10分</option>
            <option value="">15分</option>
            <option value="">20分</option>
            <option value="">25分</option>
            <option value="" selected>30分</option>
            <option value="">35分</option>
            <option value="">40分</option>
            <option value="">45分</option>
            <option value="">50分</option>
            <option value="">55分</option>
            </select>
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
<label><input type="radio" name="a_repeat" value="" checked> 曜日指定</label>
<label><input type="radio" name="a_repeat" value=""> 日にち指定</label>

    <table class="inner">
        <tr>
            <th>1つ目</th>
            <td>
                <select id="a01_01_month" class="pulldown" name="a01_01_month">
                <option value="" selected>毎月</option>
                <option value="">1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
            </td>
            <td>
                <select id="a01_01_week" class="pulldown" name="a01_01_week">
                <option value="" selected>毎週</option>
                <option value="">第1</option>
                <option value="">第2</option>
                <option value="">第3</option>
                <option value="">第4</option>
                </select>
            </td>
            <td>
                <select id="a01_01_day" class="pulldown" name="a01_01_day">
                <option value="" selected>月</option>
                <option value="">火</option>
                <option value="">水</option>
                <option value="">木</option>
                <option value="">金</option>
                <option value="">土</option>
                <option value="">日</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>2つ目</th>
            <td>
                <select id="a01_02_month" class="pulldown" name="a01_02_month">
                <option value="" selected>毎月</option>
                <option value="">1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
            </td>
            <td>
                <select id="a01_02_week" class="pulldown" name="a01_02_week">
                <option value="" selected>毎週</option>
                <option value="">第1</option>
                <option value="">第2</option>
                <option value="">第3</option>
                <option value="">第4</option>
                </select>
            </td>
            <td>
                <select id="a01_02_day" class="pulldown" name="a01_02_day">
                <option value="" selected>月</option>
                <option value="">火</option>
                <option value="">水</option>
                <option value="">木</option>
                <option value="">金</option>
                <option value="">土</option>
                <option value="">日</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>3つ目</th>
            <td>
                <select id="a01_03_month" class="pulldown" name="a01_03_month">
                <option value="" selected>毎月</option>
                <option value="">1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
            </td>
            <td>
                <select id="a01_03_week" class="pulldown" name="a01_03_week">
                <option value="" selected>毎週</option>
                <option value="">第1</option>
                <option value="">第2</option>
                <option value="">第3</option>
                <option value="">第4</option>
                </select>
            </td>
            <td>
                <select id="a01_03_day" class="pulldown" name="a01_03_day">
                <option value="" selected>月</option>
                <option value="">火</option>
                <option value="">水</option>
                <option value="">木</option>
                <option value="">金</option>
                <option value="">土</option>
                <option value="">日</option>
                </select>
            </td>
        </tr>
    </table>


<label><input type="radio" name="b_repeat" value=""> 曜日指定</label>
<label><input type="radio" name="b_repeat" value="" checked> 日にち指定</label>

    <table class="inner">
        <tr>
            <th>1つ目</th>
            <td>
                <select id="a02_01_month" class="pulldown" name="a02_01_month">
                <option value="" selected>毎月</option>
                <option value="">1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
            </td>
            <td>
                <select id="a02_01_day" class="pulldown" name="a02_01_day">
                <option value="" selected>1日</option>
                <option value="">2日</option>
                <option value="">3日</option>
                <option value="">4日</option>
                <option value="">5日</option>
                <option value="">6日</option>
                <option value="">7日</option>
                <option value="">8日</option>
                <option value="">9日</option>
                <option value="">10日</option>
                <option value="">11日</option>
                <option value="">12日</option>
                <option value="">13日</option>
                <option value="">14日</option>
                <option value="">15日</option>
                <option value="">16日</option>
                <option value="">17日</option>
                <option value="">18日</option>
                <option value="">19日</option>
                <option value="">20日</option>
                <option value="">21日</option>
                <option value="">22日</option>
                <option value="">23日</option>
                <option value="">24日</option>
                <option value="">25日</option>
                <option value="">26日</option>
                <option value="">27日</option>
                <option value="">28日</option>
                <option value="">29日</option>
                <option value="">30日</option>
                <option value="">31日</option>
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <th>2つ目</th>
            <td>
                <select id="a02_02_month" class="pulldown" name="a02_02_month">
                <option value="" selected>毎月</option>
                <option value="">1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
            </td>
            <td>
                <select id="a02_02_day" class="pulldown" name="a02_02_day">
                <option value="" selected>1日</option>
                <option value="">2日</option>
                <option value="">3日</option>
                <option value="">4日</option>
                <option value="">5日</option>
                <option value="">6日</option>
                <option value="">7日</option>
                <option value="">8日</option>
                <option value="">9日</option>
                <option value="">10日</option>
                <option value="">11日</option>
                <option value="">12日</option>
                <option value="">13日</option>
                <option value="">14日</option>
                <option value="">15日</option>
                <option value="">16日</option>
                <option value="">17日</option>
                <option value="">18日</option>
                <option value="">19日</option>
                <option value="">20日</option>
                <option value="">21日</option>
                <option value="">22日</option>
                <option value="">23日</option>
                <option value="">24日</option>
                <option value="">25日</option>
                <option value="">26日</option>
                <option value="">27日</option>
                <option value="">28日</option>
                <option value="">29日</option>
                <option value="">30日</option>
                <option value="">31日</option>
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <th>3つ目</th>
            <td>
                <select id="a02_03_month" class="pulldown" name="a02_03_month">
                <option value="" selected>毎月</option>
                <option value="">1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
            </td>
            <td>
                <select id="a02_03_day" class="pulldown" name="a02_03_day">
                <option value="" selected>1日</option>
                <option value="">2日</option>
                <option value="">3日</option>
                <option value="">4日</option>
                <option value="">5日</option>
                <option value="">6日</option>
                <option value="">7日</option>
                <option value="">8日</option>
                <option value="">9日</option>
                <option value="">10日</option>
                <option value="">11日</option>
                <option value="">12日</option>
                <option value="">13日</option>
                <option value="">14日</option>
                <option value="">15日</option>
                <option value="">16日</option>
                <option value="">17日</option>
                <option value="">18日</option>
                <option value="">19日</option>
                <option value="">20日</option>
                <option value="">21日</option>
                <option value="">22日</option>
                <option value="">23日</option>
                <option value="">24日</option>
                <option value="">25日</option>
                <option value="">26日</option>
                <option value="">27日</option>
                <option value="">28日</option>
                <option value="">29日</option>
                <option value="">30日</option>
                <option value="">31日</option>
                </select>
            </td>
            <td></td>
        </tr>
    </table>

    <h3 style="float:left;margin-right:10px">2)特別休日設定</h3>　<span>※年末年始･盆休み等</span>

    <table class="inner02">
        <tr>
            <th>1つ目</th>
            <td>
                <select id="b01_year_open" class="pulldown" name="b01_year_open">
                <option value="" selected>2014年</option>
                <option value="">2015年</option>
                </select>
                <br>
                <select id="b01_year_close" class="pulldown" name="b01_year_close">
                <option value="" selected>2014年</option>
                <option value="">2015年</option>
                </select>
            </td>
            <td>
                <select id="b01_month_open" class="pulldown" name="b01_month_open">
                <option value="" selected>1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
                <br>
                <select id="b01_month_close" class="pulldown" name="b01_month_close">
                <option value="" selected>1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
            </td>
            <td>
                <select id="b01_day_open" class="pulldown" name="b01_day_open">
                <option value="" selected>1日</option>
                <option value="">2日</option>
                <option value="">3日</option>
                <option value="">4日</option>
                <option value="">5日</option>
                <option value="">6日</option>
                <option value="">7日</option>
                <option value="">8日</option>
                <option value="">9日</option>
                <option value="">10日</option>
                <option value="">11日</option>
                <option value="">12日</option>
                <option value="">13日</option>
                <option value="">14日</option>
                <option value="">15日</option>
                <option value="">16日</option>
                <option value="">17日</option>
                <option value="">18日</option>
                <option value="">19日</option>
                <option value="">20日</option>
                <option value="">21日</option>
                <option value="">22日</option>
                <option value="">23日</option>
                <option value="">24日</option>
                <option value="">25日</option>
                <option value="">26日</option>
                <option value="">27日</option>
                <option value="">28日</option>
                <option value="">29日</option>
                <option value="">30日</option>
                <option value="">31日</option>
                </select>
                <br>
                <select id="b01_day_close" class="pulldown" name="b01_day_close">
                <option value="" selected>1日</option>
                <option value="">2日</option>
                <option value="">3日</option>
                <option value="">4日</option>
                <option value="">5日</option>
                <option value="">6日</option>
                <option value="">7日</option>
                <option value="">8日</option>
                <option value="">9日</option>
                <option value="">10日</option>
                <option value="">11日</option>
                <option value="">12日</option>
                <option value="">13日</option>
                <option value="">14日</option>
                <option value="">15日</option>
                <option value="">16日</option>
                <option value="">17日</option>
                <option value="">18日</option>
                <option value="">19日</option>
                <option value="">20日</option>
                <option value="">21日</option>
                <option value="">22日</option>
                <option value="">23日</option>
                <option value="">24日</option>
                <option value="">25日</option>
                <option value="">26日</option>
                <option value="">27日</option>
                <option value="">28日</option>
                <option value="">29日</option>
                <option value="">30日</option>
                <option value="">31日</option>
                </select>
            </td>
            <td>から<br>まで</td>
        </tr>

        <tr>
            <th>2つ目</th>
            <td>
                <select id="b02_year_open" class="pulldown" name="b02_year_open">
                <option value="" selected>2014年</option>
                <option value="">2015年</option>
                </select>
                <br>
                <select id="b02_year_close" class="pulldown" name="b02_year_close">
                <option value="" selected>2014年</option>
                <option value="">2015年</option>
                </select>
            </td>
            <td>
                <select id="b02_month_open" class="pulldown" name="b02_month_open">
                <option value="" selected>1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
                <br>
                <select id="b02_month_close" class="pulldown" name="b02_month_close">
                <option value="" selected>1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
            </td>
            <td>
                <select id="b02_day_open" class="pulldown" name="b02_day_open">
                <option value="" selected>1日</option>
                <option value="">2日</option>
                <option value="">3日</option>
                <option value="">4日</option>
                <option value="">5日</option>
                <option value="">6日</option>
                <option value="">7日</option>
                <option value="">8日</option>
                <option value="">9日</option>
                <option value="">10日</option>
                <option value="">11日</option>
                <option value="">12日</option>
                <option value="">13日</option>
                <option value="">14日</option>
                <option value="">15日</option>
                <option value="">16日</option>
                <option value="">17日</option>
                <option value="">18日</option>
                <option value="">19日</option>
                <option value="">20日</option>
                <option value="">21日</option>
                <option value="">22日</option>
                <option value="">23日</option>
                <option value="">24日</option>
                <option value="">25日</option>
                <option value="">26日</option>
                <option value="">27日</option>
                <option value="">28日</option>
                <option value="">29日</option>
                <option value="">30日</option>
                <option value="">31日</option>
                </select>
                <br>
                <select id="b02_day_close" class="pulldown" name="b02_day_close">
                <option value="" selected>1日</option>
                <option value="">2日</option>
                <option value="">3日</option>
                <option value="">4日</option>
                <option value="">5日</option>
                <option value="">6日</option>
                <option value="">7日</option>
                <option value="">8日</option>
                <option value="">9日</option>
                <option value="">10日</option>
                <option value="">11日</option>
                <option value="">12日</option>
                <option value="">13日</option>
                <option value="">14日</option>
                <option value="">15日</option>
                <option value="">16日</option>
                <option value="">17日</option>
                <option value="">18日</option>
                <option value="">19日</option>
                <option value="">20日</option>
                <option value="">21日</option>
                <option value="">22日</option>
                <option value="">23日</option>
                <option value="">24日</option>
                <option value="">25日</option>
                <option value="">26日</option>
                <option value="">27日</option>
                <option value="">28日</option>
                <option value="">29日</option>
                <option value="">30日</option>
                <option value="">31日</option>
                </select>
            </td>
            <td>から<br>まで</td>
        </tr>

        <tr>
            <th>3つ目</th>
            <td>
                <select id="b03_year_open" class="pulldown" name="b03_year_open">
                <option value="" selected>2014年</option>
                <option value="">2015年</option>
                </select>
                <br>
                <select id="b03_year_close" class="pulldown" name="b03_year_close">
                <option value="" selected>2014年</option>
                <option value="">2015年</option>
                </select>
            </td>
            <td>
                <select id="b03_month_open" class="pulldown" name="b03_month_open">
                <option value="" selected>1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
                <br>
                <select id="b03_month_close" class="pulldown" name="b03_month_close">
                <option value="" selected>1月</option>
                <option value="">2月</option>
                <option value="">3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
            </td>
            <td>
                <select id="b03_day_open" class="pulldown" name="b03_day_open">
                <option value="" selected>1日</option>
                <option value="">2日</option>
                <option value="">3日</option>
                <option value="">4日</option>
                <option value="">5日</option>
                <option value="">6日</option>
                <option value="">7日</option>
                <option value="">8日</option>
                <option value="">9日</option>
                <option value="">10日</option>
                <option value="">11日</option>
                <option value="">12日</option>
                <option value="">13日</option>
                <option value="">14日</option>
                <option value="">15日</option>
                <option value="">16日</option>
                <option value="">17日</option>
                <option value="">18日</option>
                <option value="">19日</option>
                <option value="">20日</option>
                <option value="">21日</option>
                <option value="">22日</option>
                <option value="">23日</option>
                <option value="">24日</option>
                <option value="">25日</option>
                <option value="">26日</option>
                <option value="">27日</option>
                <option value="">28日</option>
                <option value="">29日</option>
                <option value="">30日</option>
                <option value="">31日</option>
                </select>
                <br>
                <select id="b03_day_close" class="pulldown" name="b03_day_close">
                <option value="" selected>1日</option>
                <option value="">2日</option>
                <option value="">3日</option>
                <option value="">4日</option>
                <option value="">5日</option>
                <option value="">6日</option>
                <option value="">7日</option>
                <option value="">8日</option>
                <option value="">9日</option>
                <option value="">10日</option>
                <option value="">11日</option>
                <option value="">12日</option>
                <option value="">13日</option>
                <option value="">14日</option>
                <option value="">15日</option>
                <option value="">16日</option>
                <option value="">17日</option>
                <option value="">18日</option>
                <option value="">19日</option>
                <option value="">20日</option>
                <option value="">21日</option>
                <option value="">22日</option>
                <option value="">23日</option>
                <option value="">24日</option>
                <option value="">25日</option>
                <option value="">26日</option>
                <option value="">27日</option>
                <option value="">28日</option>
                <option value="">29日</option>
                <option value="">30日</option>
                <option value="">31日</option>
                </select>
            </td>
            <td>から<br>まで</td>
        </tr>
    </table>

</td>
</tr>
<tr>
<th>自動生成期間</th>
<td>
    <p>2015年4月1日から</p>
    <table class="inner">
        <tr>
            <td>
                <select id="term_year" class="pulldown" name="term_year">
                <option value="" selected>2016年</option>
                <option value="">2017年</option>
                </select>
            </td>
            <td>
                <select id="term_month" class="pulldown" name="term_month">
                <option value="">1月</option>
                <option value="">2月</option>
                <option value="" selected>3月</option>
                <option value="">4月</option>
                <option value="">5月</option>
                <option value="">6月</option>
                <option value="">7月</option>
                <option value="">8月</option>
                <option value="">9月</option>
                <option value="">10月</option>
                <option value="">11月</option>
                <option value="">12月</option>
                </select>
            </td>
            <td>
                <select id="term_day" class="pulldown" name="term_day">
                <option value="">1日</option>
                <option value="">2日</option>
                <option value="">3日</option>
                <option value="">4日</option>
                <option value="">5日</option>
                <option value="">6日</option>
                <option value="">7日</option>
                <option value="">8日</option>
                <option value="">9日</option>
                <option value="">10日</option>
                <option value="">11日</option>
                <option value="">12日</option>
                <option value="">13日</option>
                <option value="">14日</option>
                <option value="">15日</option>
                <option value="">16日</option>
                <option value="">17日</option>
                <option value="">18日</option>
                <option value="">19日</option>
                <option value="">20日</option>
                <option value="">21日</option>
                <option value="">22日</option>
                <option value="">23日</option>
                <option value="">24日</option>
                <option value="">25日</option>
                <option value="">26日</option>
                <option value="">27日</option>
                <option value="">28日</option>
                <option value="">29日</option>
                <option value="">30日</option>
                <option value="" selected>31日</option>
                </select>
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

</form>

</div><!-- /#left -->

<p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->


