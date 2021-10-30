<style>
form {
  text-align: left;
}
body {
  background: #90EE90;
}
h3 {
  display: inline-block;
  margin-right: 150px;
}
progress {
  width: 1000px;
  height: 40px;
  display: block;
}
input {
  display: inline-block;
  width: 20px;
  height: 20px;
  margin: 20px;
}
.goal {
  margin-bottom: 50px;
  margin-top: 70px;
  text-align: left;
}
.period {
  margin-bottom: 50px;
  text-align: left;
}
.day {
  margin-left: 50px;
}
.completion {
  background: #0099FF;
  color: white;
  font-weight: bold;
  width: 100px;
  height: 40px;
  float: left;
  margin-top: 30px;
  margin-left: 20px;
}
.completion:hover {
  background-color: blue;
}
.lookback {
  text-align: left;
 }
 .checkbox_list {
   display: block;
 }
</style>

<body>
<?=$this->Form->create(null,["type"=>"post","url"=>["controller"=>"home","action"=>"create"]]) ?>
<?php $day=""; $f=1; $target=-1;?>
<?php $comp=0;?>

<?php foreach($list as $item) { ?>
<div class="a">
  <?php 
  if($item->period2!=$day){
      $day=$item->period2;
      $f=1;
  } ?>
<?php if($f==1){?>
<?php 
$nowday=date("Y-m-d");
$pday=date("Y-m-d",strtotime($item->period_start));
$pdayend=date("Y-m-d",strtotime($item->period_end));

$sabun1=strtotime($nowday);
$sabun2=strtotime($pday);
$sabunend=strtotime($pdayend);
$goukei=($sabunend-$sabun2)/(60*60*24);
$sabun=($sabunend-$sabun1)/(60*60*24);
if($sabun<0){
    if($sabun<-10)
        $sabun="やり忘れです！";
    else
    $sabun="期限切れです！";
    $ritu=100;
}else{
    $ritu=(int)((($goukei-$sabun)*100)/$goukei);
    //if($ritu==0)$ritu=100;
    $sabun=$sabun."日";
}?>
<?php if($target!=$item->target_id) {?>
<h2 class="goal">目標：<?=$item->goal ?></h2>
  <h2 class="period">期間：<?=$item->period_start ?>〜<?=$item->period_end ?></h2>
</div>
<div class="b">
  <h3 class="progress">進捗率：<?= $ritu?>%</h3>
  <h3 class="day">残り日数：<?= $sabun?></h3>
  <progress value="<?= $ritu?>" max="100">0%</progress>
</div>
<?php $target=$item->target_id; }?>
<div class="lookback">
  <h2 class="lookback">やることリスト</h2>
  <?php $f=0;}?>
  <label class="checkbox_list">
  <input type="checkbox" name="check[]" value="<?=$item->id ?>"><?=$item->list ?>
  </label>
</div>
<?php }?>
<div>
  <button class="completion">完了</button>
</div>
</form>
</body>