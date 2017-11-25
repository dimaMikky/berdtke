<?php include("const.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $T_OWNERNAME ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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

<?php include("title_menu.php"); ?>		

<div id="contentOuterSeparator"></div>

<div class="container">
	<div class="divPanel page-content">

        <div class="breadcrumbs">
			<a href="index.php">Головна</a> &nbsp;/&nbsp; <span>Інвестпроект</span>
        </div> 

		<div class="span12" id="divMain">
			<?php  $lenta = 7; include("show_news.php"); ?>
        </div>
		
		<!---
        <div class="row-fluid">
            <div class="span12 sidebar">
				<div class="sidebox">
					<h3 class="sidebox-title">Проект інвестиційної програми на 2016 рік</h3>
					<iframe src="http://docs.google.com/viewer?url=berdtke.com.ua%2Fpdf%2F2016%2Finvest2016.pdf&embedded=true" width="100%" height="600" style="border: none;"></iframe>
				</div>			
			</div>
		</div>
		--->
		
        <div id="footerInnerSeparator"></div>
    </div>
</div>

<div id="footerOuterSeparator"></div>

<?php include("footer.php") ?>

<script src="scripts/jquery.min.js" type="text/javascript"></script> 
<script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/default.js" type="text/javascript"></script>

</body>
</html>