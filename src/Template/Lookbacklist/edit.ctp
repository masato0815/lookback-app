<style>
body {
  background: #90EE90;
}
.hurikaeri {
  margin: 0 auto;
  float: left;
}
.date1 {
  text-align: center;
}
.point {
 text-align: left;
}
button {
  font-weight: bold;
  background: #0099FF;
  color: white;
  display: block;
  width: 150px;
  height: 50px;
  margin: auto;
  }
button:hover {
  background: blue;
}
textarea {
  
}
</style>

<body>
<?=$this->Form->create(null,["type"=>"post","url"=>["controller"=>"lookbacklist","action"=>"update"]]) ?>
<h1 class="hurikaeri">振り返り一覧の編集</h1><br>
<h2 class="point">日付：</h2>
<div class="date1">
<input name="date" type="date" style="width:300px;" value="<?= $lookback->lb_date ?>">
<span>〜</span>
<input name="date2" type="date" style="width:300px;" value="<?= $lookback->lb_date2 ?>">
</div>
<h2 class="point">やったこと：</h2>
<textarea name="challenge" rows="15" cols="150" ><?= $lookback->challenge ?></textarea>
<h2 class="point">学んだこと：</h2>
<textarea name="study" rows="15" cols="150"><?= $lookback->study ?></textarea>
<h2 class="point">反省点：</h2>
<textarea name="ref" rows="15" cols="150"><?= $lookback->ref ?></textarea>
<h2 class="point">改善点：</h2>
<textarea name="imp" rows="15" cols="150"><?= $lookback->imp ?></textarea>
<input name="id" type="hidden" value="<?=$lookback->id ?>">
<button>保存する</button>
</form>
</body>