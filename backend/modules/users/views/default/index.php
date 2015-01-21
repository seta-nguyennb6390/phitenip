<link href="<?= Yii::$app->request->baseUrl; ?>/css/user.css" rel="stylesheet" type="text/css">

<!-- ============================== パンくずリスト[start] ============================== -->
<div id="topicpath">
	<p><span class="icon-topicpath"></span><a href="<?= Yii::$app->homeUrl ?>" title="IPコーナー　岸和田店">IPコーナー　岸和田店</a><span class="icon-topicpath"></span> 会員管理</p>
</div><!-- /#topicpath -->
<!-- ============================== パンくずリスト[end] ============================== -->

<script type="text/javascript">
	$('body').attr('id', 'user_index');
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
				<form action="" method="get" accept-charset="utf-8">
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
			<tr>
				<th>グループ</th>
				<th>会員番号&nbsp;<a href="#">▲</a><a href="#">▼</a>/ID</th>
				<th>お名前&nbsp;<a href="#">▲</a><a href="#">▼</a></th>
				<th>会員種別</th>
				<th>ステータス</th>
				<th>電話番号&nbsp;<a href="#">▲</a><a href="#">▼</a></th>
				<th>住所</th>
			</tr>
		</thead>
		<tbody id="wrap">
            <?php if(isset($listAll) && $listAll != NULL){ ?>
			<?php $stt=0; foreach($listAll as $user){ ?>
			<tr class="item <?php if($stt % 2 == 0){ echo 'even'; }else{ echo 'odd';} ?>" data-href="user_detail.html">
				<td class="group"><span class="icon-group"></span></td>
				<td class="id"><?php echo $user->pos_member_cd; ?><br>ID:<?php echo $user->member_id; ?></td>
				<td class="name"><span class="icon-<?php if($user->gender == 1){ echo 'male'; }else{ echo 'fmale';} ?>"></span>知多 好子<br><span class="kana">チタ　ヨシコ</span></td>
				<td class="category">月4回(平日)<br>標準:120分</td>
				<td clasa="status">1.本会員</td>
				<td class="tel"><?php echo $user->user_tel; ?></td>
				<td class="address"><?php echo $user->addr_1; ?></td>
			</tr>
			<?php $stt++; } } ?>
			<tr class="item odd" data-href="user_detail.html">
				<td class="group"><span class="icon-group"></span></td>
				<td class="id">0 062709 17212 9<br>ID:2897</td>
				<td class="name"><span class="icon-female"></span>知多 好子<br><span class="kana">チタ　ヨシコ</span></td>
				<td class="category">月4回(平日)<br>標準:120分</td>
				<td clasa="status">1.本会員</td>
				<td class="tel">0724999999</td>
				<td class="address">大阪府岸和田市土生町4165-2</td>
			</tr>
			<tr class="item odd" data-href="user_detail.html">
				<td class="group"><span class="icon-group"></span></td>
				<td class="id">0 062709 17212 9<br>ID:1469</td>
				<td class="name"><span class="icon-male"></span>知多 安広<br><span class="kana">チタ　ヤスヒロ</span></td>
				<td class="category">月3回(平日)<br>標準:120分</td>
				<td clasa="status">1.本会員</td>
				<td class="tel">0724998888</td>
				<td class="address">大阪府岸和田市土生町20-3-1</td>
			</tr>
			<tr class="item even" data-href="user_detail.html">
				<td class="group"></td>
				<td class="id">ID:3491</td>
				<td class="name"><span class="icon-male"></span>知多 朔太郎<br><span class="kana">チタ　サクタロウ</span></td>
				<td class="category">【ビジター】</td>
				<td clasa="status">0.仮会員</td>
				<td class="tel">0724998888</td>
				<td class="address">大阪府岸和田市土生町4165-220</td>
			</tr>
			<tr class="item odd" data-href="user_detail.html">
				<td class="group"></td>
				<td class="id">ID:1469</td>
				<td class="name"><span class="icon-female"></span>知多 明美<br><span class="kana">チタ　アケミ</span></td>
				<td class="category">【ビジター】</td>
				<td clasa="status">0.仮会員</td>
				<td class="tel">0724998888</td>
				<td class="address">大阪府岸和田市土生町20</td>
			</tr>
			<tr class="item odd" data-href="user_detail.html">
				<td class="group"></td>
				<td class="id">ID:1469</td>
				<td class="name"><span class="icon-female"></span>知多 明美<br><span class="kana">チタ　アケミ</span></td>
				<td class="category">【ビジター】</td>
				<td clasa="status">0.仮会員</td>
				<td class="tel">0724998888</td>
				<td class="address">大阪府岸和田市土生町20</td>
			</tr>
			<tr class="item even" data-href="user_detail.html">
				<td class="group"><span class="icon-group"></span></td>
				<td class="id">0 062709 17212 9<br>ID:1469</td>
				<td class="name"><span class="icon-male"></span>知多 安広<br><span class="kana">チタ　ヤスヒロ</span></td>
				<td class="category">月3回(平日)<br>標準:120分</td>
				<td clasa="status">1.本会員</td>
				<td class="tel">0724998888</td>
				<td class="address">大阪府岸和田市土生町20-3-1</td>
			</tr>
			<tr class="item even" data-href="user_detail.html">
				<td class="group"><span class="icon-group"></span></td>
				<td class="id">0 062709 17212 9<br>ID:2897</td>
				<td class="name"><span class="icon-female"></span>知多 好子<br><span class="kana">チタ　ヨシコ</span></td>
				<td class="category">月4回(平日)<br>標準:120分</td>
				<td clasa="status">1.本会員</td>
				<td class="tel">0724999999</td>
				<td class="address">大阪府岸和田市土生町4165-2</td>
			</tr>

		</tbody>
	</table>
	<!-- ============================== ユーザー一覧[start] ============================== -->

	<p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->