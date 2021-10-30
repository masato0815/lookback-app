<style>
.menubar {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #F5F5F5;
  height: 50px;
}
.bar {
  float: left;
  border-right: 1px solid #bbbbbb;
}
.bar span {
  display: block;
  text-align: center;
  padding: 14px 16px;
}
.bar span:hover {
  opacity: 0.2;
  cursor: pointer;
}
.btn {
  font-weight: bold;
  height: 50px;
  width: 150px;
  background: #0099FF;
  color: white;
  border-radius: 5px;
  float: right;
  margin-right: 50px;
  position: relative;
  top: -50px;
}
.btn:hover {
  background: blue;
}
.inbtn {
  font-weight: bold;
  height: 50px;
  width: 150px;
  background: #0099FF;
  color: white;
  border-radius: 5px;
  float: left;
  top: -50px;
  margin-left: 120px;
}
.inbtn:hover {
  background: blue;
}
.logout button {
  background: #FF8856;
  font-weight: bold;
  height: 50px;
  width: 150px;
  color: white;
  border-radius: 5px;
  float: right;
  margin-right: 30px;
  margin-top: 0px;
}
.logout button:hover {
  background: #FF0000;
}
.content {
  margin: 0 auto;
  padding: 40px;
}
.modal {
  display: none;
  height: 100vh;
  position: fixed;
  top: 0;
  width: 100%;
}
.modal__bg {
  background: rgba(0,0,0,0.5);
  height: 100vh;
  position: absolute;
  width: 100%;
}
.modal__content {
  background: #fff;
  left: 50%;
  padding: 40px;
  position: absolute;
  top: 50%;
  transform: translate(-50%,-50%);
  width: 50%;
}
h1 {
  text-align: center;
  margin-top: 150px;
  display: inline-block;
}
h2 {
  text-align: center;
}
.btn2 {
  text-align: center;
  margin: 20px;
}
form {
  text-align: center;
}
</style>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<ul class="menubar">
<?php if(empty($nomenu)){?>
  <li class="bar"><span type="button" onclick="location.href='<?=$this->Url->build(["controller"=>"home"]) ?>'">ホーム</span></li>
  <li class="bar"><span type="button" onclick="location.href='<?=$this->Url->build(["controller"=>"plan"]) ?>'">予定登録</span></li>
  <li class="bar"><span type="button" onclick="location.href='<?=$this->Url->build(["controller"=>"lookback"]) ?>'">振り返り</span></li>
  <li class="bar"><span type="button" onclick="location.href='<?=$this->Url->build(["controller"=>"lookbacklist"]) ?>'">振り返り一覧</span></li>
<?php }?>

</ul>
<?php if(empty($this->request->getCookie("userid"))){?>
<div class="signup">
  <button class="btn"><span class="js-modal-open" data-target="modal01">新規登録</span></button>
</div>
<div class="login">
  <button class="btn"><span class="js-modal-open" data-target="modal02">ログイン</span></button>
</div>
<?php }else{?>
<div class="logout">
<button class="btn" onclick="location.href='<?=$this->Url->build(["controller"=>"top","action"=>"logout"]) ?>'">ログアウト</button>
</div>
<?php }?>
<div id="modal01" class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <div class="btn2"> 
  <h2>新規登録</h2>
<?=$this->Form->create(null,["type"=>"post","url"=>["controller"=>"top","action"=>"create"]]) ?>
 <p>
  ユーザー名:<input name="user" type="text" size="40" id="newid" required>
 </p>
 <p>
  パスワード:<input name="pass" type="text"  size="40" id="newpass" required>
 </p>
 <input type="submit" class="inbtn" value="新規登録" onclick="return checkForm();">
</form>  
<div class="close01">
  <input type="submit" class="inbtn" value="閉じる">
</div>
</div>
  </div>
</div>
<div id="modal02" class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <div class="btn2">
<h2>ログイン</h2>
<?=$this->Form->create(null,["type"=>"post","url"=>["controller"=>"top","action"=>"login"]]) ?>
 <p>
  ユーザー名:<input name="luser" type="text" size="40" id="logid" required>
 <p>
 <p>
   パスワード:<input name="lpass" type="text" size="40" id="logpass" required>
 </p>
 <input type="submit" class="inbtn" value="ログイン" onclick="return checkForm();">
<div class="close02">
  <input type="submit" class="inbtn" value="閉じる">
</div>
</form>
 </div>
  </div>
</div>
<script>
$(function() {
	  $('.signup').click(function() {
	    $('#modal01').hide().fadeIn();
	  });
	  $('.login').click(function() {
	    $('#modal02').hide().fadeIn();
	  });
	});
	$('.close01').click(function() {
	  $('#modal01').fadeOut();
	});
	$('.close02').click(function() {
	  $('#modal02').fadeOut();
	});
</script>