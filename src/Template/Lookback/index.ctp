<style>
body {
  background: #90EE90;
}
.hurikaeri {
 display: block;
 margin: 0 auto;
 float: left;
}
.point {
  text-align: left;
  display: block;
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
</style>

<body>
 <?=$this->Form->create(null,["type"=>"post","url"=>["controller"=>"lookback","action"=>"create"]]) ?>
 <h1 class="hurikaeri">振り返り</h1><br>
 <h2 class="point">日付：</h2>
 <div class="date1">
   <input name="date" type="date" style="width:300px;">
   <span>〜</span>
   <input name="date2" type="date" style="width:300px;">
 </div>
 <h2 class="point">やったこと：</h2>
   <textarea name="challenge" rows="15" cols="150"></textarea>
 <h2 class="point">学んだこと：</h2>
   <textarea name="study" rows="15" cols="150"></textarea>
 <h2 class="point">反省点：</h2>
   <textarea name="ref" rows="15" cols="150"></textarea>
 <h2 class="point">改善点：</h2>
   <textarea name="imp" rows="15" cols="150"></textarea>
 <button>登録する</button>
 </form>
</body>