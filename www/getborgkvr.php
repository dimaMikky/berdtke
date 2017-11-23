<?php
include("admin/connect.php");
include("const.php");	
$kstr = (isset($_POST['pkstr'])) ? intval($_POST['pkstr']) : 0 ;
$kstr = ($kstr<10) ? '00'.$kstr : (($kstr<100) ? '0'.$kstr : $kstr);
$text = "";
$result = mysql_query("SELECT SUBSTRING( rahshort, 1, 3) as kstr, adr, borg FROM borg WHERE ks='$OWNERKS' and SUBSTRING( rahshort, 1, 3)='$kstr' order by adr");					
while ($row=mysql_fetch_object($result)) {	
		$text .= "<tr class='myadd alert'>";											
		$text .= "<td colspan='1'></td>"; 
		$text .= "<td colspan='1'></td>";
		$text .= "<td colspan='2'></td>"; 
		$text .= "<td colspan='2'>         ".$row->adr."</td>";				
		$text .= "<td colspan='1' style='text-align:right'>".$row->borg."</td>"; 					
		$text .= "<td colspan='1'></td>"; 					
		$text .= "<td colspan='1'></td>"; 
		$text .= "</tr>";	
}
header("Content-type: text/html; charset=utf-8");	
echo $text;
?>