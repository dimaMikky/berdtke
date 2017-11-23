<?php include("const.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $T_OWNERNAME ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">  
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> <!-- Remove this Robots Meta Tag, to allow indexing of site -->
    
    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />  
    <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">

    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
</head>
<body id="pageBody">

<?php 
	include("title_menu.php"); 
	include("admin/connect.php");				
	$rsPer	= mysql_query("SELECT * FROM const WHERE ks='$OWNERKS' and fpname='lastcloseper'") or die('Ошибка БД');
	$rowPer = mysql_fetch_object($rsPer);
		$god = (int)substr($rowPer->value,0,4);
		$mes = (int)substr($rowPer->value,4,2);
		$closPer  = substr($rowPer->value,0,4)."-".substr($rowPer->value,4,2);
		$months = Array(1 => 'Січня', 'Лютого', 'Березня', 'Квітеня', 'Травеня', 'Червня','Липня', 'Серпня', 'Вересня', 'Жовтня', 'Листопада', 'Грудня');
		$godnext = ($mes==12) ? $god+1 : $god;
		$mesnext = ($mes==12) ? 1 : $mes+1;
		$monthsnext = Array(1 => 'Січень', 'Лютень', 'Березень', 'Квітень', 'Травень', 'Червень','Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень');		
?>					

<div id="contentOuterSeparator"></div>

<div class="container">

    <div class="divPanel page-content">
        <div class="breadcrumbs"><a href="index.php">Головна</a> &nbsp;/&nbsp; <span>Боржники</span></div>		
		<? echo "<h3>Споживачі, що заборгували за отримані послуги більше ніж 3000.00 гривень станом на ".$monthsnext[$mesnext]." ".$godnext." року : </h3>" ?>
		
		<div class="warning table-responsive">
			<table class="table table-condensed table-hover" style="background-color:#FFFACD"> 	
				<thead>
					<tr class="alert">
						<th colspan="1">&nbsp&nbsp&nbsp&nbsp&nbsp</th>
						<th colspan="1"></th>
						<th colspan="1"><span class="maincolor">n/n</span></th>						
						<th colspan="3"><span class="maincolor">Адреса</span></th>
						<th colspan="1"	style="text-align:right"><span class="maincolor">Борг</span></th>									  
						<th colspan="1"></th>
						<th colspan="1">&nbsp&nbsp&nbsp&nbsp&nbsp</th>
					</tr>
				</thead>			
				<tbody id="kvr">		
				<?php 				
				$result = mysql_query("SELECT SUBSTRING( rahshort, 1, 3) as kstr, SUBSTRING_INDEX( adr, ',', 1 ) as nstr, sum(borg) as borg, count(*) as kol FROM borg WHERE ks='$OWNERKS' and per='$closPer' GROUP BY kstr order by nstr");				
				$records = mysql_num_rows($result);
				If ($records==0) {
					// Подчитка только при смене периода
					$result = mysql_query("DELETE FROM `borg` WHERE ks='$OWNERKS'") or die(mysql_error());			
					$result = mysql_query("INSERT into `borg` (ks, per, rahshort, adr, borg)
						SELECT $OWNERKS as ks, '$closPer' as per, Y.rahshort, Y.adr, X.borg
						FROM (SELECT rah, per, sborgbeg+snar-sopl-spilg-ssubs-skor as borg FROM month WHERE ks='$OWNERKS' and per='$closPer' having borg>3000) as X 
				  INNER JOIN (SELECT concat(rahjek,rahshort) as rah, adr, rahshort  FROM rah WHERE ks='$OWNERKS') Y 
				          ON X.rah=Y.rah order by adr") or die(mysql_error());			
					$result = mysql_query("SELECT SUBSTRING( rahshort, 1, 3) as kstr, SUBSTRING_INDEX( adr, ',', 1 ) as nstr, sum(borg) as borg, count(*) as kol FROM borg WHERE ks='$OWNERKS' GROUP BY kstr order by nstr");					
				} 				
				$npp = 0;
				while ($row=mysql_fetch_object($result)) {	
					$npp = $npp+1;
					echo "<tr class='alert' data-kstr=".$row->kstr.">";									
					echo "<td colspan='1'></td>"; 
					echo "<td colspan='1'><button class='btn btn-mini btn-primary' type='button'>+</button></td>";
					echo "<td colspan='1'>".$npp."</td>"; 
					echo "<td colspan='3'>".$row->nstr."</td>";				
					echo "<td colspan='1' style='text-align:right'>".$row->borg."</td>"; 					
					echo "<td colspan='1' style='text-align:right'>".$row->kol."</td>"; 					
					echo "<td colspan='1'></td>"; 
					echo "</tr>";	
				}								
				?>
				</tbody>
			</table>
		</div>
		
        <div id="footerInnerSeparator"></div>
    </div>

</div>

<div id="footerOuterSeparator"></div>
<?php include("footer.php") ?>

<script src="scripts/jquery.min.js" type="text/javascript"></script> 
<script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/default.js" type="text/javascript"></script>

<script type="text/javascript">
jQuery(document).ready(function($) {   	
	//Раскрываем
	$('.btn-primary').on("click",function(){ 							
			$('.myadd').remove();			
			$curtr=$(this).parent().parent();
			$curbtn=$(this);
			pm = $curbtn.text();
			$('.btn-primary').text('+');
			if (pm=='+') {				
				$.ajax({
					type: "POST",
					url: "getborgkvr.php",
					data: "pkstr="+$(this).parent().parent().data("kstr") ,
					success: function(retdata){
					$curtr.after(retdata);
					$curbtn.text('-');			
					}					
				});				
			}						
		});		
});	   
</script>


</body>
</html>