<style>
body {
  background: #90EE90;
}
label {
  font-weight:bold; 
}
.plan_create {
  text-align: center;
  margin: 0 auto;
}
.mokuhyou {
  text-align: center;
  margin-bottom: 30px;
}
.time {
  text-align: center;
  margin-bottom: 20px;
}
.list {
  text-align: center;
}
.list input {
  margin-bottom: 30px;
}
.btn1 {
  text-align: center;
  margin-top: 50px;
}
.delete {
  background: #0099FF;
  color: white;
  font-weight: bold;
}
.delete:hover {
  background: blue;
}
.entry {
  background: #0099FF;
  color: white;
  font-weight: bold;
  height: 40px;
  width: 90px;
}
.entry:hover {
  background: blue;
}
hr {
  border-top: dashed 5px #00CCFF;
}
</style>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<body>
<h1 class="plan_create">予定登録</h1>
<?=$this->Form->create(null,["type"=>"post","url"=>["controller"=>"plan","action"=>"create"]]) ?>
<div class="mokuhyou"><div>
  <label>目標設定：</label>
  <input name="mokuhyou[]" type="text" style="width:800px">
  <input type="button" class="btn1 m" value="目標を追加"><br>
  <div class="time">
    <label>期間設定：</label>
    <span>開始日</span><input name="time[]" type="date" class="datepicker" style="width:300px;">〜<span>終了日</span><input name="time2[]" type="date" class="datepicker" style="width:300px;"><br>
  </div>
  <label>やることリスト：</label><br>
  <div class="list">
    <div class="target">
      <span>開始日</span><input name="liststart[]" type="date" class="datepicker">〜<span>終了日</span><input name="listtime[]" type="date" class="datepicker">
      <input name="list[]" type="text" class="listtext" style="width:800px">
      <input name="num[]" type="hidden" value="1" class="num">
      <!-- <button class="delete">削除</button> -->
      <input type="button" class="btn2 n" value="入力欄追加"><br>
      <div></div>
    </div>
  </div>
</div>
</div> 
  <div class="btn1">
  <button class="entry">登録する</button>
</div>
  </form>
</body>

<link rel="stylesheet" href="css/jquery-ui.min.css">
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.ui.datepicker-ja.min.js"></script>
<script>
/*
$(function() {
	if($(".datepicker").length) {
		$(".datepicker").datepicker();
	}
	if($('.entry').length) {
		var error_html = '<span class="error_txt">※必須項目となります。日付を選択してください。</span>';
		var error_html_time = '<span class="error_txt">※終了日は開始日よりも後に設定してください。</span>';
		
		$('.entry').on('click',function() {
			var form_sec = $(this).closest('.mokuhyou');
			var start_date = $(form_sec).find('[name="time[]"]').val();
			var end_date = $(form_sec).find('[name="time2[]"]').val();

			//エラーリセット
			$(form_sec).find('[name="time[]"]').closest('div').find('error_txt').remove();
			$(form_sec).find('[name="time2[]"]').closest('div').find('error_txt').remove();
			//必須入力チェック
			if(start_date === '') {
				$(form_sec).find('[name="time[]"]').closest('div')append(error_html);
     		}
     		if(end_date === '') {
     			$(form_sec).find('[name="time2[]"]').closest('div')append(error_html);
         	}
         	if($(form_sec).find('.error_txt').length) {
				return false;
             }
            //時間計算
            var start = new Date(start_date);
            var end = new Date(end_date);
            var diff = end.getTime() - start.getTime();
            var diff_hour = Math.ceil(diff / (1000 * 60 * 60));
            //開始日と終了日の整合性チェック
            if(diff_hour < 1) {
				$(form_sec).find('[name="time2[]"]').closest('div').append(error_html_time);
				return false;
	        }
	        return false;
		});	
	}
});
*/
function delet(t){
	$(t).parent().remove();
};
              
function btn1on(this1){
  $(this1).parent().parent().append(`
		  <hr width="100%">	  
		  <div>
		  <label>目標設定：</label>
		  <input name="mokuhyou[]" type="text" style="width:800px">
		  <input type="button" class="btn1 m" value="目標を追加"><br>
		  <div class="time">
		    <label>期間設定：</label>
		    <span>開始日</span><input name="time[]" type="date" class="datepicker" style="width:300px;">〜<span>終了日</span><input name="time2[]" type="date" class="datepicker" style="width:300px;"><br>
		  </div>
		  <label>やることリスト：</label><br>
		  <div class="list">
		    <div class="target">
		      <span>開始日</span><input name="liststart[]" type="date" class="datepicker">〜<span>終了日</span><input name="listtime[]" type="date" class="datepicker">
		      <input name="list[]" type="text" class="listtext" style="width:800px">
		      <input name="num[]" type="hidden" value="" class="num">
		      <!-- <button class="delete">削除</button> -->
		      <input type="button" class="btn2 n" value="入力欄追加"><br>
		      <div></div>
		    </div>
		  </div>
		</div>
  `);
  
  $(".m").on("click", function () {
    $(".m").off();
    btn1on(this);
    for(var i=0; i<$(".num").length; i++) {
        if($(".num").eq(i).val()=="")$(".num").eq(i).val($(".m").length);
      }   
    console.log($(".m").length);
});
  $(".n").off();
  $(".n").click(function () {
    var html =
      '<div><span>開始日</span><input name="liststart[]" type="date">〜<span>終了日</span><input name="listtime[]" type="date"><input name="list[]" type="text" style="width:800px"><input name="num[]" type="hidden" value="" class="num"><input type="button" class="delete" value="削除" onclick="delet(this);"></div><br>';
    $(this).next().next().append(html);
    $(this).next().next().find(".num").val($(this).prev().val());
  });
};
$(".m").on("click", function () {
    $(".m").off();
    btn1on(this);
    for(var i=0; i<$(".num").length; i++) {
      if($(".num").eq(i).val()=="")$(".num").eq(i).val($(".m").length);
    }   
    console.log($(".m").length);
});
$(".n").click(function () {
  var html =
    '<div><span>開始日</span><input name="liststart[]" type="date">〜<span>終了日</span><input name="listtime[]" type="date"><input name="list[]" type="text" style="width:800px"><input name="num[]" type="hidden" value="" class="num"><input type="button" class="delete" value="削除" onclick="delet(this);"></div><br>';
  $(this).next().next().append(html);
  $(this).next().next().find(".num").val($(this).prev().val());
  $(".n").off();
  $(".n").click(function () {
    var html =
      '<div><span>開始日</span><input name="liststart[]" type="date">〜<span>終了日</span><input name="listtime[]" type="date"><input name="list[]" type="text" style="width:800px"><input name="num[]" type="hidden" value="" class="num"><input type="button" class="delete" value="削除" onclick="delet(this);"></div><br>';
    $(this).next().next().append(html);
    $(this).next().next().find(".num").val($(this).prev().val());
  });
});

</script>