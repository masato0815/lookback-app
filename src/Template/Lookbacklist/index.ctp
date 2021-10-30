<style>
body {
  background: #90EE90;
}
table {
  background: white;
  width: 100%;
}
th {
  background: skyblue;
}
.number li{
  display: inline;
  padding: 15px;
}
.number li:hover {
  background: skyblue;
  border: 1px solid black;
  border-radius: 10%;
}
.editbtn {
  display: inline-block;
  padding: 0.4em 1em;
  color: #FFF;
  font-size: 0.85em;
  text-decoration: none;
  background: #1aa1ff;
  border-radius: 3px;
  transition: 0.3s;
}
.editbtn:hover {
  background: #064fda;
}

</style>
<link rel="stylesheet" href="https://school.oohara.jp/ikeno/datatables.css?20190225011">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://school.oohara.jp/imapeppu/datatables.js"></script>
<script src="https://cdn.jsdelivr.net/gh/DeuxHuitHuit/quicksearch/dist/jquery.quicksearch.min.js"></script>
<body>
<table border id="date">
  <thead>
    <th width="10%">日付</th>
    <th width="10%">やったこと</th>
    <th width="20%">学んだこと・頑張ったこと</th>
    <th width="25%">反省点</th>
    <th width="25%">改善点</th>
    <th width="10%"></th>
  </thead>
  <?php foreach($lookback as $list) {?>
  <tr>
    <td><?= $list->lb_date?>〜<?= $list->lb_date2?></td>
    <td><?= $list->challenge?></td>
    <td><?= $list->study?></td>
    <td><?= $list->ref?></td>
    <td><?= $list->imp?></td>
    <td>
    <a class="editbtn" href="<?php echo $this->Url->build(['controller'=>'Lookbacklist', 'action'=>'edit', 'id' => $list->id]); ?>">編集</a>
    <a class="editbtn" href="<?php echo $this->Url->build(['controller'=>'Lookbacklist', 'action'=>'delete', 'id' => $list->id]); ?>">削除</a>
    </td>
  </tr>
  <?php }?>  
</table>
</body>
<script>
$(document).ready(function () {
	  $("#date").dataTable({});
	});
	$('#keyword').quicksearch('tr td');
</script>