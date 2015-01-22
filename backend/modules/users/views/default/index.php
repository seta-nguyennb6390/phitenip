<link href="<?= Yii::$app->request->baseUrl; ?>/css/user.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/jquery.clickableTr.js"></script>

<!-- ============================== パンくずリスト[start] ============================== -->
<div id="topicpath">
	<p><span class="icon-topicpath"></span><a href="<?= Yii::$app->homeUrl ?>" title="IPコーナー　岸和田店">IPコーナー　岸和田店</a><span class="icon-topicpath"></span> 会員管理</p>
</div><!-- /#topicpath -->
<!-- ============================== パンくずリスト[end] ============================== -->

<script type="text/javascript">
	$('body').attr('id', 'user_index');
	var url = '<?= Yii::$app->request->url ?>';
</script>

<script type="text/javascript" src="<?= Yii::$app->homeUrl ?>js/users/list-user.js"></script>
<script type="text/javascript">
// 外部ページの読み込み
	$(window).on("scroll", function (e) {
		var bottomPos = 100;
		var scrollHeight = $(document).height();
		var scrollPosition = $(window).height() + $(window).scrollTop();
		if (scrollPosition > scrollHeight - bottomPos) { appendFunc();}
	});
	var start = <?= $limit ?>;
	function appendFunc() {
		if (start == 'max') { return false;}
		$.ajax({
			type: 'post', url: url, data: 'action=ajax&page='+start, async: false,
			beforeSend: function () { $("#loading").show(); },
			success: function (result) { if(result != 'max'){
				    $('#wrap').append(result);	
				}else{ start = 'max';}
				$("#loading").hide();
			}
		});
		start = start + <?= $limit ?>;
	}
</script>

<div id="wrapper">


	<!-- ============================== ユーザー新規登録[start] ============================== -->
	<table class="entry">
		<tr>
			<th>ユーザー新規登録</th>
			<td><a href="<?= Yii::$app->homeUrl ?>users/adduser" class="button" title="新規登録"><span>新規登録</span></a></td>
		</tr>
	</table>
	<!-- ============================== ユーザー新規登録[end] ============================== -->

	<!-- ============================== ユーザー検索[start] ============================== -->
	<table class="search">
		<tr>
			<th>ユーザー検索</th>
			<td>
				<form action="javascript:void(0)" method="get" accept-charset="utf-8">
					<!-- 会員種別 -->
					<p>
						<label for="category">会員種別</label>
						<select id="category" class="pulldown" name="category">
							<option value="" selected>選択して下さい</option>
							<option value="1">月1回（平日）</option>
							<option value="2">月2回（平日）</option>
							<option value="3">月3回（平日）</option>
							<option value="4">月4回（平日）</option>
							<option value="5">月5回（平日）</option>
							<option value="visitor">ビジター</option>
						</select>
					</p>
					<!-- ステータス -->
					<p>
						<label for="status">ステータス</label>
						<select id="status" class="pulldown" name="status">
							<option value="" selected>選択して下さい</option>
							<option value="1">1.本会員</option>
							<option value="0">0.仮会員</option>
						</select>
					</p>
					<!-- 検索ボタン -->
					<p class="submit">
						<input type="submit" name="submit" id="submit" class="input_button" value="検索" />
					</p>
				</form>
			</td>
		</tr>
	</table>
	<!-- ============================== ユーザー検索[end] ============================== -->

	<!-- ============================== ユーザー一覧[start] ============================== -->
	<table class="list">
		<colgroup span="1" class="group"></colgroup>
		<colgroup span="1" class="id"></colgroup>
		<colgroup span="1" class="name"></colgroup>
		<colgroup span="1" class="category"></colgroup>
		<colgroup span="1" class="status"></colgroup>
		<colgroup span="1" class="tel"></colgroup>
		<colgroup span="1" class="address"></colgroup>

		<thead>
			<tr class="hasort">
				<th>グループ</th>
				<th title="id">会員番号&nbsp;<a href="#" title="asc">▲</a><a href="#" title="desc">▼</a>/ID</th>
				<th title="name">お名前&nbsp;<a href="#" title="asc">▲</a><a href="#" title="desc">▼</a></th>
				<th>会員種別</th>
				<th>ステータス</th>
				<th title="phone">電話番号&nbsp;<a href="#" title="asc">▲</a><a href="#" title="desc">▼</a></th>
				<th>住所</th>
			</tr>
		</thead>
		<tbody id="wrap">
			<?php echo $this->render('list_order',['listAll'=>$listAll]); ?>
		</tbody>
	</table>
	<!-- ============================== ユーザー一覧[start] ============================== -->
    <div id="loadingimg" style="text-align: center;margin:10px 0 20px 0"><img id="loading" src="img/icon_loading.gif" alt="loading" style="display:none"  width="29" height="29" class="loading" /></div>
	<p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->