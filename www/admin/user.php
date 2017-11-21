<?php
include('chlog.php');
include("connect.php");
include("../const.php");

$curmenu = 3;
$arrRole = array(1 =>'Адміністратор', 2 =>'Редактор новостноі ленти');
$addeditdel = (isset($_POST['addeditdel'])) ? $_POST['addeditdel'] : 0 ;
$currid = (isset($_POST['currid'])) ? $_POST['currid'] : 0 ;
$inpUserType = (isset($_POST['inputUserType'])) ? $_POST['inputUserType'] : 0 ;
$inpUserName = (isset($_POST['inputUserName'])) ? $_POST['inputUserName'] : "" ;
$inpUserLogin = (isset($_POST['inputUserLogin'])) ? $_POST['inputUserLogin'] : "" ;
$inpUserPasw = (isset($_POST['inputUserPasw'])) ? $_POST['inputUserPasw'] : "" ;

switch  ($addeditdel) {
  case (1) : // add
    if (!empty($inpUserName) AND !empty($inpUserLogin) AND !empty($inpUserPasw)) {
		    $inpUserPasw = md5($inpUserPasw);
        $inpPrim = ($inpUserType=1) ? 'Администратор' : 'Редактор новостной ленты';
        $resinp = mysql_query("INSERT INTO regusers (UserType, UserName, UserLogin,  UserPasw, prim, ks)
                                VALUES ('$inpUserType', '$inpUserName', '$inpUserLogin',  '$inpUserPasw',  '$inpPrim',  '$OWNERKS')");
		} else { echo $inpUserName.' '.$inpUserLogin.' '.$inpUserPasw."<br>";}
		break;
	case (2) : // edit
		if (!empty($inpUserName) AND !empty($inpUserLogin)) {
			if (!empty($inpUserPasw)) {
        $inpUserPasw = md5($inpUserPasw);
        $resedit = mysql_query("UPDATE  regusers SET `UserType`='$inpUserType', `UserName`='$inpUserName', `UserLogin`='$inpUserLogin',  `UserPasw`='$inpUserPasw' WHERE `UserId`='$currid' ");
			} else {
        $resedit = mysql_query("UPDATE  regusers SET `UserType`='$inpUserType', `UserName`='$inpUserName', `UserLogin`='$inpUserLogin' WHERE `UserId`='$currid' ");
			}
		}
		break;
	case (3) : // del
    if ($currid!=1) $resdel = mysql_query("DELETE FROM regusers  WHERE `UserId`='$currid' ");
    break ;
}
$addeditdel = 0;
include ('beg_a.php');
?>

<!--Накатка-->
<?php $result = mysql_query("SELECT * FROM regusers where ks='$OWNERKS' order by userlogin ");?>
<table class="table table-hover table-striped">
  <thead>
		<tr>
		<th><button class="btn btn-info" id="add" type="button"><span class="glyphicon glyphicon-plus"></span> New</button></th>
		<th>ID</th>
		<th>Ім'я</th>
		<th>Логін</th>
		<th>Роль</th>
		</tr>
  </thead>
  <tbody>
		<?
		while ($row=mysql_fetch_object($result)) {
		?>
		<tr>
    <td>
        <button class="btn btn-mini btn-primary edit" type="button"><span class="glyphicon glyphicon-pencil"></span></button>
        <button class="btn btn-mini btn-warning dele" type="button"><span class="glyphicon glyphicon-trash"></span></button>
    </td>
		<td><? echo $row->userid; ?></td>
		<td><? echo $row->username; ?></td>
		<td><? echo $row->userlogin; ?></td>
		<? echo "<td data-value='".$row->usertype."'>".$arrRole[$row->usertype]."</td>"?>
		</tr>
		<? } ?>
	</tbody>
</table>

<!--Форма-->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" id="crossclose" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Користувач</h3>
	</div>
	<div class="modal-body">
    <form name="form" action="" method="post">
      <input type="hidden" name="currid" value="0">
	    <input type="hidden" name="addeditdel" value="0">

      <div class="form-group">
        <label for="inputUserType">Роль</label>
        <select class="form-control selectpicker" name="inputUserType" id="inputUserType">
          <?php for ($i = 1; $i <= count($arrRole); $i++) {
              echo "<option value=".$i.">".$arrRole[$i]."</option>";
          } ?>
        </select>
      </div>

      <div class="form-group">
        <label for="inputUserName">Ім'я</label>
        <input type="text" class="form-control" name="inputUserName" id="inputUserName">
      </div>

      <div class="form-group">
        <label for="inputUserLogin">Логін</label>
        <input type="text" class="form-control" name="inputUserLogin" id="inputUserLogin">
      </div>

      <div class="form-group">
        <label for="inputUserPasw">Пароль</label>
        <input type="text" class="form-control" name="inputUserPasw" id="inputUserPasw">
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
  $('[data-toggle="tooltip"]').tooltip();
  //Add
  $('#add').on("click",function(){
    document.form.currid.value = "";
    document.form.inputUserName.value ="" ;
    document.form.inputUserLogin.value = "";
    document.form.addeditdel.value = 1;
    $('#inputUserType').selectpicker('val', '');
    $('#myModal').modal("show");
  });
  //Edit
 	$('.edit').on("click",function(){
    var IdCol = $(this).parent().next();
		document.form.currid.value = IdCol.html();
		document.form.inputUserName.value = IdCol.next().html() ;
    document.form.inputUserLogin.value = IdCol.next().next().html() ;
		document.form.addeditdel.value = 2;
    $('#inputUserType').selectpicker('val', IdCol.next().next().next().attr("data-value"));
		$('#myModal').modal("show");
  });
  //Del
  $('.dele').on("click",function(){
    var IdCol = $(this).parent().next() ;
		if (confirm("Видалити "+IdCol.next().next().html()+" ?")) {
			document.form.currid.value = IdCol.html();
			document.form.addeditdel.value = 3;
			document.form.submit();
			}
		});
  //Save
	$('#btnsave').on("click",function(){
    with (document.form) {
      if (inputUserType.value == "") {inputUserType.focus(); $('#inputUserType').selectpicker('toggle'); return false; }
      if (inputUserName.value == "") {inputUserName.focus(); return false; }
      if (inputUserLogin.value == "") {inputUserLogin.focus(); return false; }
      if (currid.value == "" && inputUserPasw.value == "") {
        inputUserPasw.focus(); return false;
			}
      submit();
    }
  });
  //Activate form
  $('#myModal').on('shown.bs.modal', function () {
    $('#inputUserType').focus()
  })

}); // jQuery
</script>
