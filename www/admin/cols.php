<?php
include('chlog.php');
include("connect.php");
include("../const.php");

$curmenu = 2;
$addeditdel = (isset($_POST['addeditdel'])) ? $_POST['addeditdel'] : 0 ;
$currid = (isset($_POST['currid'])) ? $_POST['currid'] : 0 ;
$inpDescr = (isset($_POST['inpDescr'])) ? $_POST['inpDescr'] : "" ;

switch  ($addeditdel) {
  case (1) : // add
    if (!empty($inpDescr)) {
        $resinp = mysql_query("INSERT INTO cols (descr, ks) VALUES ('$inpDescr',  '$OWNERKS')") or die(mysql_error());
        header("Location: cols.php");
		} else { echo $currid.' '.$inpDescr."<br>";}
		break;
	case (2) : // edit
		if (!empty($inpDescr)) {
      $resedit = mysql_query("UPDATE  cols SET descr='$inpDescr' WHERE id='$currid'") or die(mysql_error());
      header("Location: cols.php");
		}
		break;
	case (3) : // del
    $resdel = mysql_query("DELETE FROM cols  WHERE id='$currid'") or die(mysql_error());
    break ;
}
$addeditdel = 0;
include ('beg_a.php');
$result = mysql_query("SELECT cols.*, IFNULL(news.id,0) as newsid FROM cols left join news on cols.id=news.lenta where cols.ks='$OWNERKS' group by cols.id order by cols.descr") or die(mysql_error());
//SELECT cols.id, cols.descr, IFNULL(news.id,0) FROM cols left join news on cols.id=news.lenta group by 1

$num_rows = mysql_num_rows($result);
?>

<!--Накатка-->
<div>
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist" id='myTab'>
    <li><a href="#tlist" aria-controls="tlist" role="tab">Список</a></li>
    <li><a id="add">Додати</a></li>
    <li <? if ($num_rows==0) echo 'class="disabled"' ?>><a id="edit">Редагувати</a></li>
    <li <? if ($num_rows==0) echo 'class="disabled"' ?> id="lidel"><a id="del">Видалити</a></li>
  </ul>
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane" id="tlist"><? include('cols_list.php') ?></div>
    <div role="tabpanel" class="tab-pane" id="tadd">...</div>
    <div role="tabpanel" class="tab-pane" id="tedit">...</div>
    <div role="tabpanel" class="tab-pane" id="tdel">...</div>
  </div>
</div>

<!--Форма-->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" id="crossclose" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Стрічка новин</h3>
	</div>
	<div class="modal-body">
    <form name="form" action="" method="post">
      <input type="hidden" name="currid" id="currid" value="0">
	    <input type="hidden" name="addeditdel" id="addeditdel" value="0">
      <div class="form-group">
        <label for="inpDescr">Найменування</label>
        <input type="text" class="form-control" name="inpDescr" id="inpDescr">
      </div>
    </form>
  </div>
	<div class="modal-footer">
    <button id="btnsave" class="btn btn-primary">Прийняти</button>
    <button id="btnclose" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Відмова</button>
	</div>
</div>
</div>
</div>

<!--Конец-->
<? include ('end.php'); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
  //Показываем первую вкладку, Инициализируем, Позиционируем на первую строчку
  $('[href="#tlist"]').tab('show');
  var table = $('#example').DataTable({
          "paging":   true,
          "ordering": true,
          "info":     true,
          "order": [[ 1, "desc" ]],
          select: 'single',
  });
  table.row(':eq(0)', { page: 'current' }).select(); // Позиционируемся на первую строчку

  //Отработка списка
  $('#example tbody').on('click', 'tr', function () {
    var data = table.row( this ).data();
    //alert( 'You clicked on '+data[0]+'\'s row' );
    var tr = table.row( this ).nodes()[0]; // <tr>
    var newsid =  $(tr).attr("newsid");
    //alert(newsid+'   '+$('#lidel').hasClass('disabled'));
    if ( (newsid == 0) && ($('#lidel').hasClass('disabled')) ) {
      $('#lidel').toggleClass('disabled');
    } else if ( (newsid > 0) && (!$('#lidel').hasClass('disabled')) ) {
      //alert('111');
      $('#lidel').toggleClass('disabled');
    }
  });
  //Add
  $('#add').on("click",function(){
    $('#addeditdel').val(1);
    $('#currid').val(0);
    $('#inpDescr').val("");
		$('#myModal').modal("show");
  });
  //Activate form
  $('#myModal').on('shown.bs.modal', function () {
    $('#inpDescr').focus()
  })
  //Edit
  $('#edit').on("click",function(){
    var row = table.rows( { selected: true } );
    if (row.count() == 1) {
      $('#addeditdel').val(2);
      $('#currid').val(row.data()[0][0]);
      $('#inpDescr').val(row.data()[0][1]);
      $('#myModal').modal("show");
    }
  });
  //Del
  $('#del').on("click",function(){
    var row = table.rows( { selected: true } );
    var tr = row.nodes()[0]; // <tr>
    var newsid =  $(tr).attr("newsid");
    if ( (row.count() == 1) && (newsid == 0) && (confirm("Видалити "+row.data()[0][1]+" ?")) ) {
      $('#addeditdel').val(3);
      $('#currid').val(row.data()[0][0]);
      document.form.submit();
    }
	});
  //Save
	$('#btnsave').on("click",function(){
    if (document.form.inpDescr.value == "") {document.form.inpDescr.focus(); return false; }
    document.form.submit();
  });

}); // jQuery
</script>
