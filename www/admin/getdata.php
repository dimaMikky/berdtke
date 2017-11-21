<?php
  include("connect.php");
  include("../const.php");

	$name = (isset($_POST['name'])) ? $_POST['name'] : "" ;
	$id = (isset($_POST['id'])) ? $_POST['id'] : 0 ;
  $file = (isset($_POST['file'])) ? $_POST['file'] :"" ;

  // Подчитка для редактирования
  if ($name=='NewsForId') {
    $result = mysql_query("SELECT * FROM news WHERE ks='$OWNERKS' and id='$id'") or die(mysql_error());
    echo json_encode(mysql_fetch_object($result));
  }

  // Проверка на наличие имени готового файла перед сохранением (синхронній запрос)
  if ($name=='ExistFile') {
    $result = mysql_query("SELECT * FROM news WHERE file='$file'") or die(mysql_error());
    $num_rows = mysql_num_rows($result);
    echo ($num_rows==0) ? 0 : 1;
  }

?>
