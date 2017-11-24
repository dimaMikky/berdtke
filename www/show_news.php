<?
$today = date("Y-m-d");
$typeLenta = (isset($typeLenta)) ? $typeLenta : "std" ;
$zip = (isset($zip)) ? $zip : 0 ;
$page = (isset($_GET['page'])) ? $_GET['page'] : 1 ;
$newsonpage = 3;
$startlimit = ($page-1)*$newsonpage;
include("admin/connect.php");
$result = mysql_query("SELECT COUNT(*) FROM news WHERE ks='$OWNERKS' and lenta='$lenta'");
$row = mysql_fetch_row($result);
$total = $row[0];
// Страничная навигация
$total_page = ceil( $total / $newsonpage );
if ($total_page>1) {
  echo '<div class="pagination"><ul>';
  for( $i=1;$i<$total_page+1;$i++ ) {	echo "<li ".($page==$i ? "class=\"active\"":"")."><a href=\"?page=$i\">".$i."</a></li>";}
  echo '</ul></div>';
  //echo 'Всего новостей='.$total.'  Страниц= '.ceil( $total / $newsonpage ).' Страница N'.$page ;
}
if ($zip==1) {
  $result = mysql_query("SELECT * FROM news WHERE ks='$OWNERKS' and lenta='$lenta' and if(dataend='',0,dataend<'$today') ORDER BY main DESC, data DESC Limit ".$startlimit.", ".$newsonpage) or die('Ошибка БД');
} else {
  $result = mysql_query("SELECT * FROM news WHERE ks='$OWNERKS' and lenta='$lenta' and if(dataend='',1,dataend>='$today') ORDER BY main DESC, data DESC Limit ".$startlimit.", ".$newsonpage) or die('Ошибка БД');
}
//  $result = mysql_query("SELECT * FROM news WHERE ks='$OWNERKS' and lenta='$lenta' ORDER BY main DESC, data DESC Limit ".$startlimit.", ".$newsonpage) or die('Ошибка БД');

$num_rows = mysql_num_rows($result);
If ($num_rows>0) {
  while ($row=mysql_fetch_object($result)) {
    // НОВИНА
    if ($row->main==1) {
      echo '<div class="sidebox" style="padding:0px">';
      echo '<div class="alert alert-block" style="margin-bottom: 0px">';
    } else {
      echo '<div class="sidebox">';
    }
    // Дата
    if (substr(str_pad($lentaType,4),0,4) !== 'main') {
      if ($zip==1) echo '<small>'.$row->data.' ... '.$row->dataend.'</small>'; else echo '<small>'.$row->data.'</small>';
    }
    // Заголовок
    If (substr(str_pad($lentaType,4),0,4) == 'main') {
      $textHead = ($row->head=='') ? $row->descr : $row->head;
      $posTilda = strpos($textHead, '~');
      if ($posTilda!==false) { /*Заголовок не выводим*/ } else {
        echo ($row->main==1) ? '<h3>'.$textHead.'</h3>' : '<h3 class="text-success">'.$textHead.'</h3>'; //Заголовок для главной страницы
      }
    } else {
      echo '<h4 class="text-success">'.$row->descr.'</h4>'; //Заголовок по умолчанию
    }
    // Готовый документ
    if (!empty($row->file)) {
		$info = new SplFileInfo($row->file);
		$ext = strtoupper($info->getExtension());
		if ($ext=='JPG') {
			echo '<img src=images/'.$row->file.'>';
		} else {
			echo '<iframe src="http://docs.google.com/viewer?url=berdtke.com.ua%2Fimages%2F'.$row->file.'&embedded=true" width="100%" height="600" style="border: none;"></iframe>';
		}
    }
    // Текст
    if (empty($row->file) and !empty($row->text)) {echo $row->text;}
    //if (empty($row->foto)){} else {
    //	echo '<img src=../images/'.$row->foto.' width=50 height=50 hspace=10 vspace=10 align=left>';
    //};
    if ($row->main==1) echo '</div></div>'; else echo '</div>';
  };
};
// Страничная навигация
if ($total_page>1) {
  echo '<div class="pagination"><ul>';
  $total_page = ceil( $total / $newsonpage );
  for( $i=1;$i<$total_page+1;$i++ ) {echo "<li ".($page==$i ? "class=\"active\"":"")."><a href=\"?page=$i\">".$i."</a></li>";}
  echo '</ul></div>';
}
?>
